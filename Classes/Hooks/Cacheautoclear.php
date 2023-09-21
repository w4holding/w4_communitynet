<?php

namespace W4Services\W4Communitynet\Hooks;

use TYPO3\CMS\Core\Cache\Exception\NoSuchCacheGroupException;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Object\ObjectManager;

class Cacheautoclear
{

    /**
     * @throws \TYPO3\CMS\Extbase\Configuration\Exception\InvalidConfigurationTypeException
     * @throws \TYPO3\CMS\Extbase\Object\Exception
     * @throws NoSuchCacheGroupException
     */
    public function processDatamap_afterDatabaseOperations($status, $table, $id, &$fieldArray, &$parentObject)
    {

        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $configurationManager = $objectManager->get(ConfigurationManager::class);
        $settings = $configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT
        );

        $records = $settings['plugin.']['tx_w4communitynet.']['settings.']['records.'];

        if ( (is_array($records)) && (count($records)) ) {
            foreach ($records as $record) {
                if ($record['table']==$table) {
                    $cacheManager = GeneralUtility::makeInstance(CacheManager::class);

                    if ( isset($record['wherePageUid']) && $record['wherePageUid']=='###PID###' ) {
                        try {
                            $cacheManager->flushCachesInGroupByTag('pages', 'pageId_' . $parentObject->checkValue_currentRecord['pid']);
                        } catch (NoSuchCacheGroupException $e) {
                            #do nothing
                        }
                    } else {
                        $queryBuilder = GeneralUtility::makeInstance(
                            ConnectionPool::class
                        )->getConnectionForTable('tt_content')->createQueryBuilder();

                        $queryBuilder
                            ->select('pid')
                            ->from('tt_content');

                        foreach ($record['where.'] as $where) {
                            $to = str_replace('###PID###', $parentObject->checkValue_currentRecord['pid'], $where['to']);

                            switch ($where['is']) {
                                case 'eq':
                                case 'neq':
                                case 'lt':
                                case 'lte':
                                case 'gt':
                                case 'gte':
                                case 'like':
                                case 'notLike':
                                case 'in':
                                case 'notIn':
                                case 'inSet':
                                case 'notInSet':
                                {
                                    $queryBuilder->where($queryBuilder->expr()->{$where['is']}($where['field'], $queryBuilder->createNamedParameter($to)));
                                    break;
                                }
                                case 'isNull':
                                case 'isNotNull':
                                {
                                    $queryBuilder->where($queryBuilder->expr()->{$where['is']}($where['field']));
                                    break;
                                }
                                default:
                                {
                                    throw new \Exception('Unknown operator »'.$where['is'].'«');
                                }
                            }
                        }

                        $pagesToBeCleared = $queryBuilder->executeQuery();

                        while ($page = $pagesToBeCleared->fetchAssociative()) {
                            try {
                                $cacheManager->flushCachesInGroupByTag('pages', 'pageId_' . $page['pid']);
                            } catch (NoSuchCacheGroupException $e) {
                                #do nothing
                            }
                        }
                    }
                    break;
                }
            }
        }
    }
}

<?php

namespace W4Services\W4Communitynet\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\TypoScript\ExtendedTemplateService;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\RootlineUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction;
use TYPO3\CMS\Core\Database\Query\Restriction\WorkspaceRestriction;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;

class IncludeLayoutDefinitionMiddleware implements MiddlewareInterface {

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {
        /** @var TypoScriptFrontendController */
        $controller = $request->getAttribute('frontend.controller');

        $this->includeLayoutDefintion(
            $this->determineLayout(
                (int) $controller->getRequestedId()
            )
        );

        return $handler->handle($request);
    }

    private function includeLayoutDefintion(array $layout): void {

        $extensionKey = 'w4_communitynet';

        /* Load constants and setup for the selected layout */
        ExtensionManagementUtility::addTypoScript(
            $extensionKey . '_layout',
            'constants',
            '<INCLUDE_TYPOSCRIPT: source="DIR:EXT:' . $extensionKey . '/Configuration/TypoScript/Constants/" extensions="typoscript">
<INCLUDE_TYPOSCRIPT: source="DIR:EXT:' . $layout['layout'] . '/Constants/" extensions="typoscript">
communitynet.layout = ' . $layout['layout'] . '
communitynet.color = '. $layout['color']
        );
        ExtensionManagementUtility::addTypoScript(
            $extensionKey . '_layout',
            'setup',
            '<INCLUDE_TYPOSCRIPT: source="DIR:EXT:' . $extensionKey . '/Configuration/TypoScript/Setup/" extensions="typoscript">
<INCLUDE_TYPOSCRIPT: source="DIR:EXT:' . $layout['layout'] . '/Setup/" extensions="typoscript">'
        );

        /* Load TSConfig */
        ExtensionManagementUtility::addPageTSConfig(
            '<INCLUDE_TYPOSCRIPT: source="DIR:EXT:' . $extensionKey . '/Configuration/TypoScript/TSConfig/" extensions="tsconfig">
<INCLUDE_TYPOSCRIPT: source="DIR:EXT:' . $layout['layout'] . '/TSConfig/" extensions="tsconfig">'
        );
    }

    private function determineLayout(int $pid) : array {

        $rootLineUtility = new RootlineUtility($pid);
        foreach ($rootLineUtility->get() as $page) {
            $uid = (int)$pageUid;
            if(isset($page['uid'])){
                $uid = (int)$page['uid'];
            }
            if($uid <= 0){
                continue;
            }
            /**
            *   The query used in the functions ext_getFirstTemplate & getTemplateQueryBuilder  
            *   are taken from the TYPO3\CMS\Core\TypoScript\ExtendedTemplateService (typo3 v 11.5.10)  
            */
            $tplRow = $this->ext_getFirstTemplate($uid); 
            if ( $tplRow && $tplRow['root'] ) {
                return [
                    'layout' => $tplRow['tx_w4communitynet_layout'],
                    'color' => $tplRow['tx_w4communitynet_layoutcolor'],
                ];
            }
        }

        return [
            'layout' => 'w4_communitynet/Configuration/TypoScript/Layout1',
            'color' => 'red',
        ];
    }

    /**
     * Get a single sys_template record attached to a single page.
     * If multiple template records are on this page, the first (order by sorting)
     * record will be returned, unless a specific template uid is specified via $templateUid
     *
     * @param int $pid The pid to select sys_template records from
     * @param int $templateUid Optional template uid
     * @return array|null Returns the template record or null if none was found
     */
    public function ext_getFirstTemplate($pid, $templateUid = 0)
    {
        if (empty($pid)) {
            return null;
        }

		$queryBuilder = $this->getTemplateQueryBuilder($pid)
            ->setMaxResults(1);
        if ($templateUid) {
            $queryBuilder->andWhere(
                $queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($templateUid, \PDO::PARAM_INT))
            );
        }
        $row = $queryBuilder->executeQuery()->fetchAssociative();
        BackendUtility::workspaceOL('sys_template', $row);

        return $row;
    }

    /**
     * Internal helper method to prepare the query builder for
     * getting sys_template records from a given pid
     *
     * @param int $pid The pid to select sys_template records from
     * @return QueryBuilder Returns a QueryBuilder
     */
    protected function getTemplateQueryBuilder(int $pid): QueryBuilder
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('sys_template');
        $queryBuilder->getRestrictions()
            ->removeAll()
            ->add(GeneralUtility::makeInstance(DeletedRestriction::class))
            ->add(GeneralUtility::makeInstance(WorkspaceRestriction::class, 0));

        $queryBuilder->select('*')
            ->from('sys_template')
            ->where(
                $queryBuilder->expr()->eq('pid', $queryBuilder->createNamedParameter($pid, \PDO::PARAM_INT))
            );
        if (!empty($GLOBALS['TCA']['sys_template']['ctrl']['sortby'])) {
            $queryBuilder->orderBy($GLOBALS['TCA']['sys_template']['ctrl']['sortby']);
        }

        return $queryBuilder;
    }

}

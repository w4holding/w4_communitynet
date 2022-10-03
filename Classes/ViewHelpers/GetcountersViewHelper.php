<?php

namespace W4Services\W4Communitynet\ViewHelpers;

use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
 
class GetcountersViewHelper extends AbstractViewHelper
{
    protected $escapeOutput = false;

    public function initializeArguments()
    {
        $this->registerArgument('pages', 'string', 'Pages from where to get the counters', false, '0');
    }
 
    /**
     * @return mixed
     */
    public function render()
    {
        $pages = $this->arguments['pages'];
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_w4communitynet_domain_model_counter');
        $queryBuilder->select('*');
        $queryBuilder->from('tx_w4communitynet_domain_model_counter');
        $queryBuilder->where(
            $queryBuilder->expr()->in('pid', $pages)
        );
        $queryBuilder->orderBy('sorting');
        $res = $queryBuilder->execute()->fetchAll();
        return $res;
    }
}

<?php

declare(strict_types=1);

namespace W4Services\W4Communitynet\Hooks;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class EventsHook
{
    /**
     * @param array $dataStructure
     * @param array $identifier
     * @return array
     */
    public function parseDataStructureByIdentifierPostProcess(array $dataStructure, array $identifier): array
    {
        if ($identifier['type'] === 'tca' && $identifier['tableName'] === 'tt_content' && $identifier['dataStructureKey'] === 'news_pi1,list') {
            $file = ExtensionManagementUtility::extPath('w4_communitynet') . 'Configuration/FlexForms/Events.xml';
            $content = file_get_contents($file);
            if ($content) {
                $dataStructure['sheets']['extraEntryEventList'] = GeneralUtility::xml2array($content);
            }
        }
        return $dataStructure;
    }
}

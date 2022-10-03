<?php
declare(strict_types=1);
namespace W4Services\W4Communitynet\Hooks;

/**
 * Class OverwriteFlexForm
 */
class OverwriteFlexForm
{
    /**
     * @var string
     */
    protected $path = 'FILE:EXT:w4_communitynet/Configuration/FlexForms/Address.xml';

    /**
     * @return void
     */
    public function overwrite()
    {
        $GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds']['ttaddress_listview,list']
            = $this->path;
    }
}
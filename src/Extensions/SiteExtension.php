<?php

namespace Fromholdio\ErrorPagesConfig\Extensions;

use SilverStripe\ErrorPage\ErrorPage;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\ORM\DataExtension;

class SiteExtension extends DataExtension
{
    private static $has_many = [
        'ErrorPages' => ErrorPage::class . '.Parent'
    ];

    public function updateSiteCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.ErrorPages',
            $errorsGridField = GridField::create(
                'ErrorPages',
                'Error Pages',
                $this->getOwner()->ErrorPages()
            )
        );
        $errorsGridConfig = GridFieldConfig_RecordEditor::create();
        $errorsGridField->setConfig($errorsGridConfig);
    }
}
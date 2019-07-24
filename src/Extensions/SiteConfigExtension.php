<?php

namespace Fromholdio\ErrorPagesConfig\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\ORM\DataExtension;

class SiteConfigExtension extends DataExtension
{
    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.ErrorPages',
            $errorsGridField = GridField::create(
                'ErrorPages',
                'Error Pages',
                ErrorPage::get()
            )
        );
        $errorsGridConfig = GridFieldConfig_RecordEditor::create();
        $errorsGridField->setConfig($errorsGridConfig);
    }
}
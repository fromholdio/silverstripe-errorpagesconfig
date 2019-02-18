<?php

namespace Fromholdio\ErrorPagesConfig\Extensions;

use SilverStripe\ErrorPage\ErrorPage;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\ORM\DataExtension;

class ConfigExtension extends DataExtension
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

    public function updateSiteCMSFields(FieldList $fields)
    {
        $errorPages = ErrorPage::get()
            ->filter(['SiteID' => $this->owner->ID]);

        $fields->addFieldToTab(
            'Root.ErrorPages',
            $errorsGridField = GridField::create(
                'ErrorPages',
                'Error Pages',
                $errorPages
            )
        );
        $errorsGridConfig = GridFieldConfig_RecordEditor::create();
        $errorsGridField->setConfig($errorsGridConfig);
    }
}
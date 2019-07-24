<?php

namespace Fromholdio\ErrorPagesConfig\Extensions;

use SilverStripe\ORM\DataExtension;

class ErrorPageExtension extends DataExtension
{
    public function getCodeLabel()
    {
        if (!$this->getOwner()->ErrorCode) {
            return null;
        }
        return _t('SilverStripe\\ErrorPage\\ErrorPage.CODE_' . $this->getOwner()->ErrorCode, $this->getOwner()->ErrorCode);
    }
}
<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MagePal\PreviewCheckoutSuccessPage\Model\Config\Backend;

class ValidFor extends \Magento\Framework\App\Config\Value
{
    const MAX_ACCESS_TIME = 15;
    const MIN_ACCESS_TIME = 3;


    /**
     * @return $this
     */
    public function beforeSave()
    {
        $value = (int)$this->getValue();

        if($value < self::MIN_ACCESS_TIME){
            $value = self::MIN_ACCESS_TIME;
        }
        elseif ($value > self::MAX_ACCESS_TIME){
            $value = self::MAX_ACCESS_TIME;
        }

        $this->setValue($value);

        parent::beforeSave();
        return $this;
    }
}

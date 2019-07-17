<?php

namespace hp\traits;

/**
 * Description of SortOrderTrait
 *
 * @author HAO
 */
trait SortOrderTrait {

    public function save($runValidation = true, $attributeNames = null) {
        $result = parent::save($runValidation, $attributeNames);
        if ($this->sort_order == 0) {
            $this->sort_order = $this->id;
            return $this->updateAttributes(['sort_order']);
        }
        return $result;
    }

}

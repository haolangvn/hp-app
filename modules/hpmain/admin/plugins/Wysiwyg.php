<?php

namespace hp\admin\plugins;

/**
 * Description of Wysiwyg
 *
 * @author HAO
 */
class Wysiwyg extends \luya\admin\ngrest\plugins\Wysiwyg {

    public function renderList($id, $ngModel) {
        return $this->createListTag($ngModel);
    }

    /**
     * @inheritdoc
     */
    public function renderCreate($id, $ngModel) {
        $label = $this->createTag('strong', $this->alias);
        return $label . $this->createFormTag('zaa-wysiwyg', $id, $ngModel);
    }

    /**
     * @inheritdoc
     */
    public function renderUpdate($id, $ngModel) {
        $label = $this->createTag('span', $this->alias);
        return $label . $this->createFormTag('zaa-wysiwyg', $id, $ngModel);
    }

}

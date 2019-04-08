<?php

namespace app\properties;

/**
 * Description of TestProperty
 *
 * @author HAO
 */
class TestProperty extends \luya\admin\base\Property {

    public function varName() {
        return 'foobar';
    }

    public function label() {
        return 'Foo Bar Label';
    }

    public function type() {
        return self::TYPE_TEXT;
    }

}

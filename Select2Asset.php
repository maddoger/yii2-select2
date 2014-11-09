<?php

namespace maddoger\widgets;

use yii\web\AssetBundle;

class Select2Asset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $css = [
        'select2-custom.css',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'maddoger\widgets\Select2BowerAsset',
    ];

    public function init()
    {
        $this->sourcePath = __DIR__.'/assets';
        parent::init();
    }
}
<?php

namespace maddoger\widgets;

use yii\web\AssetBundle;

class Select2BootstrapAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/select2-bootstrap-css';
    /**
     * @inheritdoc
     */
    public $css = [
        'select2-bootstrap.min.css'
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'maddoger\widgets\Select2Asset',
        'yii\bootstrap\BootstrapAsset'
    ];
}
<?php

namespace maddoger\widgets;

use yii\web\AssetBundle;

class Select2BowerAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/select2';

    /**
     * @inheritdoc
     */
    public $css = [
        'select2.css',
        //'select2-bootstrap.css',
    ];
    /**
     * @inheritdoc
     */

    public $js = [
        'select2.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
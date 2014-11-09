<?php

namespace maddoger\widgets;

use yii\web\AssetBundle;

class Select2Assets extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/ivaynberg/select2';

    /**
     * @inheritdoc
     */
    public $css = [
        'select2.css',
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
    ];
}
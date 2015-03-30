<?php

namespace maddoger\widgets;

use yii\web\AssetBundle;
use Yii;

class Select2Asset extends AssetBundle
{
    /**
     * @var string
     */
    public $language;

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
        'select2.min.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        parent::init();
        if (!$this->language) {
            $this->language = substr(Yii::$app->language, 0, 2);
        }
        if ($this->language != 'en') {
            $this->js[] = 'select2_locale_'.$this->language.'.js';
        }
    }
}
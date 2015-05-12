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
    public $sourcePath = '@bower/select2/dist';

    /**
     * @inheritdoc
     */
    public $css = [
        'css/select2.min.css',
        //'select2-bootstrap.css',
    ];
    /**
     * @inheritdoc
     */

    public $js = [
        'js/select2.min.js',
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
            $this->js[] = 'js/i18n/'.$this->language.'.js';
        }
    }
}
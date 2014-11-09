<?php

namespace maddoger\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * DateTimeEditor Widget For Yii2 class file.
 *
 * @property array $plugins
 *
 * @author Vitaliy Syrchikov <maddoger@gmail.com>
 */
class Select2 extends InputWidget
{
    /**
     * @var array
     */
    public $items;

    /**
     * @var array
     */
    public $clientOptions;

    /**
     * @var string
     */
    public $language;

    /**
     * @var bool
     */
    public $registerCustomAsset = true;

    /**
     * @inheritdoc
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();

        if (!isset($this->options['class'])) {
            $this->options['class'] = 'form-control';
        }
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerClientScript();
        if ($this->hasModel()) {
            if ($this->items) {
                return Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->options);
            } else {
                return Html::activeTextInput($this->model, $this->attribute, $this->options);
            }
        } else {
            if ($this->items) {
                return Html::dropDownList($this->name, $this->value, $this->items, $this->options);
            } else {
                return Html::textInput($this->name, $this->value, $this->options);
            }
        }
    }

    /**
     * @inheritdoc
     */
    protected  function registerClientScript()
    {
        $clientOptions = Json::encode($this->clientOptions);
        $selector = $this->options['id'];

        $view = $this->getView();
        $select2 = Select2Asset::register($view);
        if (!$this->language) {
            $this->language = substr(Yii::$app->language, 0, 2);
        }
        array_push($select2->js, "select2_locale_$this->language.js");


        if ($this->registerCustomAsset) {
            Select2Asset::register($view);
        }

        $this->getView()->registerJs("$('#{$selector}').select2($clientOptions);");
    }
}
<?php

namespace maddoger\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\InputWidget;

/**
 * Select2 Widget For Yii2
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
     * @var array plugin options
     */
    public $clientOptions = [];

    /**
     * @var bool
     */
    public $registerBootstrapAsset = true;

    /**
     * @var string[] Events
     */
    public $clientEvents;

    /**
     * @var bool
     */
    public $multiple = false;

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

        if (
            (isset($this->clientOptions['tags']) && $this->clientOptions['tags']) ||
            (isset($this->options['multiple']) && $this->options['multiple'])
        ) {
            $this->multiple = true;
        }

        if ($this->multiple) {
            $this->options['multiple'] = 'multiple';

            if ($this->hasModel()) {
                return Html::activeListBox($this->model, $this->attribute, $this->items, $this->options);
            } else {
                return Html::listBox($this->name, $this->value, $this->items, $this->options);
            }
        } else {

            if ($this->hasModel()) {
                return Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->options);
            } else {
                return Html::dropDownList($this->name, $this->value, $this->items, $this->options);
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
        if ($this->registerBootstrapAsset === true) {
            Select2BootstrapAsset::register($view);
        } else {
            Select2Asset::register($view);
        }

        $this->getView()->registerJs("$('#{$selector}').select2($clientOptions);");

        if (!empty($this->clientEvents)) {
            $js = [];
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "$('#{$selector}').on('{$event}', {$handler});";
            }
            $js = implode("\n", $js);
            $view->registerJs($js);
        }
    }
}
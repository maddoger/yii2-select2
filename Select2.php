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
class Select2Field extends InputWidget
{
    public $data;
    public $clientOptions;
    public $language;

    public function run()
    {
        $view = $this->getView();
        //CustomAssets::register($view);
        $select2 = Select2Assets::register($view);
        if (!$this->language) {
            $this->language = substr(Yii::$app->language, 0, 2);
        }
        array_push($select2->js, "select2_locale_$this->language.js");
        $this->renderWidget();
    }

    private function renderWidget()
    {
        $clientOptions = Json::encode($this->clientOptions);
        $fieldName = Html::getInputId($this->model, $this->attribute);

        $this->getView()->registerJs("$('#{$fieldName}').select2($clientOptions);");
        if (isset($this->clientOptions['ajax'])) {
            echo Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            echo Html::activeDropDownList($this->model, $this->attribute, $this->data, $this->options);
        }
    }
}
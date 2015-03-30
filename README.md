Yii2 select2 widget.
===================
Select2 widget is a wrapper of [Select2](http://ivaynberg.github.io/select2/) for Yii 2 framework.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist maddoger/yii2-select2 "*"
```

or add

```
"maddoger/yii2-select2": "*"
```

to the require section of your `composer.json` file.

Usage
-----

Once the extension is installed, simply use it in your code by:

```php
use maddoger\widgets\Select2;

echo $form->field($model, 'field')->widget(Select2::className(), [
    'options' => [
        'multiple' => true,
        'placeholder' => 'Choose item'
    ],
    'clientOptions' => [
        'width' => '100%',
    ],
    'items' => [
        'item1',
        'item2',
        ...
    ]
]);
```
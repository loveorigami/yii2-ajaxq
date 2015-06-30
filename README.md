Ajaxq Widget for Yii2
========================
A customizable lightbox jQuery plugin for Yii2 based on [Ajaxq](http://foliotek.github.io/AjaxQ/).

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "loveorigami/yii2-ajaxq" "*"
```

or add

```json
"loveorigami/yii2-ajaxq" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----
* In view:

```php
use lo\widgets\ajaxq\Ajaxq;

<?= Ajaxq::widget([
    'url' => '/site/demo'
    'name' => 'queue'
]) ?>
```

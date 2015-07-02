Ajaxq Widget for Yii2
========================
A customizable AjaxQ jQuery plugin for Yii2 based on [Ajaxq](http://foliotek.github.io/AjaxQ/).

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
use lo\widgets\Ajaxq;

<?php
 echo Ajaxq::widget([
      'url' => '/site/demo',
      // 'success' =>'$(".res").html(res["mes"])',
      // 'tpl' => 'from_to' // default view for generating ajax requests
  ]);

```

* In controller:
     
```php
    /**
     * Controller name - Site
     * Demo for ajaxq request
     * @return json
     */
    public function actionDemo()
    {
        $post = \Yii::$app->request->post('dataq'); // get associative array dataq

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        $res['id'] = $post['id'];
        $res['mes'] = $post['id'].' - It is ok!';

        echo json_encode($res);
    }
```

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

<?php
 echo Ajaxq::widget([
      'url' => '/playground/get-time',
      'success' =>'$(".res").append(res["id"])'
  ]);
  
// generate ajaxq requests
$script = <<< JS
    $(function() {

        var i;
        var data = {}; // associative array send as $_POST['qdata']

        for (i=0; i<=3; i++){
            data['id'] = i;
            setAjaxq(data);
        }

    });

JS;

$this->registerJs($script);

?>

<div class="res"></div>

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
        $request = Yii::$app->request;
        $post = $request->post('qdata'); // get associative array qdata

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        $res['id'] = $post['id'];
        $res['mes'] = 'It is ok!';

        echo json_encode($res);
    }
```

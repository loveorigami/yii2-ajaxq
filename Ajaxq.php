<?php
/**
 * @link https://github.com/loveorigami/yii2-ajaxq
 * @copyright Copyright (c) 2015 LoveOrigami
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace lo\widgets;

use yii\base\Widget;
use yii\helpers\Json;

/**
 * Widget renders an Ajaxq jQuery widget.
 *
 * For example:
 *
 * ```php
 * In View
 * ==================
 * use lo\widgets\Ajaxq;
 * 
 * echo Ajaxq::widget([
 *     'url' => '/site/demo',
 *     // 'name' => 'my_queue' // if need more butches with queries
 *     // 'tpl' => 'from_to', // default view for generating ajax requests
 *     // 'success' =>' $(".res").append(res["id"])';
 * ]);
 *
 * In controller
 * ==================
 * Controller name - Site
 * Demo for ajaxq request
 * @return json

public function actionDemo()
{
    $post = \Yii::$app->request->post('dataq'); // get associative array dataq

    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    $res['id'] = $post['id'];
    $res['mes'] = $post['id'].' - It is ok!';

    echo json_encode($res);
}
```


 *
 * @author Loveorigami
 * @see http://foliotek.github.io/AjaxQ/
 * @package lo\widgets\ajaxq
 */
class Ajaxq extends Widget
{
    /** @var $url */
    public $url = '';

    /**
     * @var $name string butch name for ajaxq queries.
     */
    public $name = 'queue';

    /**
     * @var $success answer after ajax querie.
     */
    public $success = '$(".res").html(res["mes"])';

    /**
     * @var string the tpl to use.
     */
    public $tpl = 'from_to';

    public function init()
    {
        parent::init();

        $view = $this->getView();

        if (!empty($this->url)) {

            $script = <<<JS

            function setAjaxq(dataq){
                $.ajaxq ('$this->name',{
                    url: '$this->url',
                    type: 'post',
                    dataType:'json',
                    data:{
                        dataq: dataq
                    },
                    success: function(res) {
                        $this->success;
                    }
                });
            };

JS;
            $view->registerJs($script);
        }


        AjaxqAsset::register($view);

    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo $this->render($this->tpl);
    }

}
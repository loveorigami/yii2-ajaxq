<?php
/**
 * @link https://github.com/loveorigami/yii2-ajaxq
 * @copyright Copyright (c) 2015 LoveOrigami
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace lo\widgets\ajaxq;

use yii\base\Widget;
use yii\helpers\Json;

/**
 * Widget renders an Ajaxq jQuery widget.
 *
 * For example:
 *
 * ```php
 * echo Ajaxq::widget([
 *     'url' => '/site/demo',
 *     // 'name' => 'my_queue' // if need more butches with queries
 *      'success' =>' $(".res").append(res["id"])';
 * ]);
 * ```
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
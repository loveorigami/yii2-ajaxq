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
 *      'success' =>' $(".res").append(response["id"])';
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
    public $success = '';

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
                        dataq: qdatq
                    },
                    success: function(res) {
                        $this->success;
                    }
                });
            };

JS;
            $view->registerJs($script);
        }


        $bundle = AjaxqAsset::register($view);

    }
}
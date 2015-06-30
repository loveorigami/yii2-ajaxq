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
     * @var integer|boolean $coreStyle A number from 1 to 5 connects style from the appropriate `example` folders.
     * Set it to `false`, if you don't need to connect the built-in styles.
     */
    public $coreStyle = 1;

    public function init()
    {
        parent::init();
        $view = $this->getView();

        if (!empty($this->url)) {
            $view->registerJs($script);
        }

        $bundle = AjaxqAsset::register($view);

    }
}

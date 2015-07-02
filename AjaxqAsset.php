<?php
/**
 * @link https://github.com/loveorigami/yii2-ajaxq
 * @copyright Copyright (c) 2015 LoveOrigami
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace lo\widgets;

use Yii;
use yii\web\AssetBundle;

class AjaxqAsset extends AssetBundle
{
    public $sourcePath = '@bower/ajaxq';
    public $js = [
        'ajaxq.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}

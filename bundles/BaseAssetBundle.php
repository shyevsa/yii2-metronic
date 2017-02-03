<?php
/**
 * Created by PhpStorm.
 * User: brunosalzano
 * Date: 26/07/16
 * Time: 05:49
 */
namespace dlds\metronic\bundles;

use yii\web\AssetBundle;

class BaseAssetBundle extends AssetBundle {
    /**
     * @var string source assets path
     */
    public $sourcePath = '@dlds/metronic/assets';

    public function init()
    {
        $this->sourcePath = Yii::$app->metronic->resources;
        foreach($this->css as $k=>$v) {
            if (strpos($v,'.min.css')===false) {
                $fileName = str_replace('.css','.min.css',$v);
                $newFile = \Yii::getAlias($this->sourcePath) .'/'. $fileName;
                if (!file_exists($newFile)) {
                    $fileName = $v;
                }
                $this->css[$k] = defined(YII_ENV_DEV) ? $v : $fileName;
            }
        }
        foreach($this->js as $k=>$v) {
            if (strpos($v,'.min.js')===false) {
                $fileName = str_replace('.css','.min.css',$v);
                $newFile = \Yii::getAlias($this->sourcePath) .'/'. $fileName;
                if (!file_exists($newFile)) {
                    $fileName = $v;
                }
                $this->js[$k] = defined(YII_ENV_DEV) ? $v : $fileName;
            }
        }
        parent::init(); // TODO: Change the autogenerated stub
    }
}
<?php

namespace runtime\tmpExtensions\assets\choicejs;

/**
 * egm ChoiceJS asset bundle.
 */
class ChoiceJSAsset extends \yii\web\AssetBundle{
    /**
     * {@inheritdoc}
     */
    public $sourcePath = '@runtime/choiceJSAsset';
    /**
     * {@inheritdoc}
     */
    public $publishOptions = [
        "except" => "ChoiceJS.php"
    ];
    /**
     * {@inheritdoc}
     */
    public $js = [
        'scripts/choices' . (YII_ENV_PROD ? ".min" : "") . '.js',
    ];
    /**
     * {@inheritdoc}
     */
    public $css = [
        'styles/choices' . (YII_ENV_PROD ? ".min" : "") . '.css',
    ];
    function init() {
        parent::init();
        if(!is_dir($runtime = \Yii::getAlias($this->sourcePath))){
            if(!mkdir($runtime)){
                throw new Exception("!mkdir($runtime)");
            }
        }
        foreach (['scripts/choices', 'styles/choices'] as $asset) {
            foreach (['', '.min'] as $min) {
                if(strpos($asset, "scripts") === 0){
                    $ext = "js";
                }else{
                    $ext = "css";
                }
                if(!file_exists($runtime . $tmp = "$value$min.$ext")){
                    $file_get_contents = file_get_contents("https://cdn.jsdelivr.net/npm/choices.js/public/assets/$tmp");
                    if(file_put_contents($runtime . $tmp, $file_get_contents) === false){
                        throw new Exception("!file_put_contents($runtime$tmp, file_get_contents)");
                    }
                }
            }
        }
    }
}

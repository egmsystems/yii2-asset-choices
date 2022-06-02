<?php

namespace egmyii\choicejs;

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
    public $js = [
        'scripts/choices' . (YII_ENV_PROD ? ".min" : "") . '.js',
    ];
    /**
     * {@inheritdoc}
     */
    public $css = [
        'styles/choices' . (YII_ENV_PROD ? ".min" : "") . '.css',
    ];
    static function postInstallCmd() {
        $staticThis = new static;
        if(!is_dir($staticThis->sourcePath)){
            if(!mkdir($staticThis->sourcePath)){
                throw new Exception("!mkdir(sourcePath: {$staticThis->sourcePath})");
            }
        }
        foreach (['scripts/choices', 'styles/choices'] as $asset) {
            if(!is_dir($localPath = "{$staticThis->sourcePath}/" . \yii\helpers\StringHelper::dirname($asset))){
                if(!mkdir($localPath)){
                    throw new Exception("!mkdir(localPath: $localPath)");
                }
            }
            foreach (['', '.min'] as $min) {
                if(strpos($asset, "scripts") === 0){
                    $ext = "js";
                }else{
                    $ext = "css";
                }
                if(!file_exists($localPath = $staticThis->sourcePath . DIRECTORY_SEPARATOR . $relativePath = "$asset$min.$ext")){
                    $file_get_contents = file_get_contents("https://cdn.jsdelivr.net/npm/choices.js/public/assets/$relativePath");
                    if(($file_put_contents = file_put_contents($localPath, $file_get_contents)) !== $strlen = strlen($file_get_contents)){
                        throw new Exception("$localPath.size($file_put_contents) != http.size($strlen)");
                    }
                }
            }
        }
        exit(var_dump($staticThis));
    }
}

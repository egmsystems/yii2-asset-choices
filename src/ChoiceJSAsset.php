<?php

namespace runtime\tmpExtensions\assets\choicejs;

/**
 * egm ChoiceJS asset bundle.
 */
class ChoiceJSAsset extends \yii\web\AssetBundle{
    /**
     * {@inheritdoc}
     */
    public $sourcePath = __DIR__ . '/src';
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
}

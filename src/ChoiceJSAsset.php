<?php

namespace egmyii\choicejs;

/**
 * egm ChoiceJS asset bundle.
 */
class ChoiceJSAsset extends \yii\web\AssetBundle{
    /**
     * {@inheritdoc}
     */
    public $sourcePath = 'z:/runtime/choiceJSAsset';
    /**
     * {@inheritdoc}
     */
    public $js = ['scripts/choices' . (YII_ENV_PROD ? ".min" : "") . '.js'];
    /**
     * {@inheritdoc}
     */
    public $css = ['styles/choices' . (YII_ENV_PROD ? ".min" : "") . '.css'];
}

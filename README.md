# EGM Yii Asset to Choices.js

yii2 asset to https://github.com/Choices-js/Choices

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist net.egmsystems/yii2-asset-choices "*"
```

or add

```
"net.egmsystems/yii2-asset-choices": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by add to the view file :

```php
<?= \egmyii2\assets\choicejs\ChoiceJSAsset::register($this); ?>```

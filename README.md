# yii2-chain-mailer

[![Build Status](https://travis-ci.org/alexeevdv/yii2-chain-mailer.svg?branch=master)](https://travis-ci.org/alexeevdv/yii2-chain-mailer) ![PHP 5.6](https://img.shields.io/badge/PHP-5.6-green.svg) ![PHP 7.0](https://img.shields.io/badge/PHP-7.0-green.svg) ![PHP 7.1](https://img.shields.io/badge/PHP-7.1-green.svg) ![PHP 7.2](https://img.shields.io/badge/PHP-7.2-green.svg)


Yii2 mailer implementation that allow you to use multiple submailers.

## Installation

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

Either run

```bash
$ php composer.phar require alexeevdv/yii2-chain-mailer "~1.0"
```

or add

```
"alexeevdv/yii2-chain-mailer": "~1.0"
```

to the ```require``` section of your `composer.json` file.

## Configuration

### Through application component
```php
//...
'components' => [
    //...
    'mailer' => [
        'class' => \alexeevdv\mailer\ChainMailer::class,
        'mailers' => [
            [
                'class' => \yii\swiftmailer\Mailer::class,
                'userFileTransport' => true,
            ],
            [
                'class' => \alexeevdv\mailer\SlackMailer::class,
                'webhook' => 'https://web.hook',
            ],
            // even more mailers here
        ],
    ],
    //...
],
//...
```

### Limitations 

If you use `embed` and `embedContent` methods you should know that CID will be returnted only for first configured mailer. Keep it in mind 

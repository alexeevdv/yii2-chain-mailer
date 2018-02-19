<?php

namespace tests;

use yii\mail\BaseMailer;

/**
 * Class DummyMailer
 * @package tests
 */
class DummyMailer extends BaseMailer
{
    /**
     * @inheritdoc
     */
    public $messageClass = DummyMessage::class;

    /**
     * @inheritdoc
     */
    public function sendMessage($message)
    {
        return true;
    }
}

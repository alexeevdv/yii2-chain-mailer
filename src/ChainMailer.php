<?php

namespace alexeevdv\yii;

use Yii;
use yii\helpers\ArrayHelper;
use yii\mail\BaseMailer;
use yii\mail\BaseMessage;

/**
 * Class ChainMailer
 * @package alexeevdv\yii
 */
class ChainMailer extends BaseMailer
{
    /**
     * Actual mailer configurations
     * @var array
     */
    public $mailers = [];

    /**
     * @inheritdoc
     */
    public $messageClass = ChainMailerMessage::class;

    /**
     * @inheritdoc
     */
    public $useFileTransport;

    /**
     * @inheritdoc
     */
    public $htmlLayout;

    /**
     * @inheritdoc
     */
    public $textLayout;

    /**
     * @inheritdoc
     */
    public $messageConfig;

    /**
     * @inheritdoc
     */
    public $fileTransportPath;

    /**
     * @inheritdoc
     */
    public $fileTransportCallback;

    /**
     * @inheritdoc
     */
    public $_viewPath;

    /**
     * @inheritdoc
     */
    public function compose($view = null, array $params = [])
    {
        /** @var ChainMailerMessage $message */
        $message = Yii::createObject([
            'class' => $this->messageClass,
            'mailer' => $this,
        ]);

        foreach ($this->mailers as $config) {
            /** @var BaseMailer $mailer */
            $mailer = Yii::createObject(ArrayHelper::merge(
                $config,
                array_filter([
                    'viewPath' => $this->getViewPath(),
                    'useFileTransport' => $this->useFileTransport,
                    'fileTransportPath' => $this->fileTransportPath,
                    'fileTransportCallback' => $this->fileTransportCallback,
                    'htmlLayout' => $this->htmlLayout,
                    'textLayout' => $this->textLayout,
                    'messageConfig' => $this->messageConfig,
                ])
            ));
            $message->messages[] = $mailer->compose($view, $params);
        }
        return $message;
    }

    /**
     * @inheritdoc
     */
    public function sendMessage($message)
    {
        $successfull = 0;
        if ($message instanceof ChainMailerMessage) {
            /** @var BaseMessage $msg */
            foreach ($message->messages as $msg) {
                $successfull += $msg->send();
            }
        } else {
            $successfull += $message->send();
        }
        return !!$successfull;
    }

    /**
     * @inheritdoc
     */
    public function send($message)
    {
        if (!$this->beforeSend($message)) {
            return false;
        }

        $address = $message->getTo();
        if (is_array($address)) {
            $address = implode(', ', array_keys($address));
        }
        Yii::info('Sending email "' . $message->getSubject() . '" to "' . $address . '"', __METHOD__);

        $isSuccessful = $this->sendMessage($message);
        $this->afterSend($message, $isSuccessful);

        return $isSuccessful;
    }

    /**
     * @inheritdoc
     */
    public function getViewPath()
    {
        return $this->_viewPath;
    }

    /**
     * @inheritdoc
     */
    public function setViewPath($path)
    {
        $this->_viewPath = Yii::getAlias($path);
    }
}

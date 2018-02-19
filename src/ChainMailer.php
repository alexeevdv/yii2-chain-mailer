<?php

namespace alexeevdv\mailer;

use Yii;
use yii\helpers\ArrayHelper;
use yii\mail\BaseMailer;
use yii\mail\BaseMessage;

/**
 * Class ChainMailer
 * @package alexeevdv\mailer
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
    public function compose($view = null, array $params = [])
    {
        /** @var ChainMailerMessage $message */
        $message = parent::compose($view, $params);
        foreach ($this->mailers as $config) {
            /** @var BaseMailer $mailer */
            $mailer = Yii::createObject(ArrayHelper::merge(
                $config,
                [
                    'htmlLayout' => $this->htmlLayout,
                    'textLayout' => $this->textLayout,
                    'messageConfig' => $this->messageConfig,
                    'view' => $this->view,
                    'viewPath' => $this->viewPath,
                ]
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
        }
        return !!$successfull;
    }
}

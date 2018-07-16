<?php

namespace alexeevdv\yii;

use yii\mail\BaseMessage;

/**
 * Class ChainMailerMessage
 * @package alexeevdv\yii
 */
class ChainMailerMessage extends BaseMessage
{
    /**
     * @var BaseMessage[]
     */
    public $messages = [];

    /**
     * @var string
     */
    private $_charset;

    /**
     * @var string|array
     */
    private $_from;

    /**
     * @var string|array
     */
    private $_to;

    /**
     * @var string|array
     */
    private $_replyTo;

    /**
     * @var string|array
     */
    private $_cc;

    /**
     * @var string|array
     */
    private $_bcc;

    /**
     * @var string
     */
    private $_subject;

    /**
     * @inheritdoc
     */
    public function getCharset()
    {
        return $this->_charset;
    }

    /**
     * @inheritdoc
     */
    public function setCharset($charset)
    {
        $this->_charset = $charset;
        foreach ($this->messages as $message) {
            $message->setCharset($charset);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getFrom()
    {
        return $this->_from;
    }

    /**
     * @inheritdoc
     */
    public function setFrom($from)
    {
        $this->_from = $from;
        foreach ($this->messages as $message) {
            $message->setFrom($from);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getTo()
    {
        return $this->_to;
    }

    /**
     * @inheritdoc
     */
    public function setTo($to)
    {
        $this->_to = $to;
        foreach ($this->messages as $message) {
            $message->setTo($to);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getReplyTo()
    {
        return $this->_replyTo;
    }

    /**
     * @inheritdoc
     */
    public function setReplyTo($replyTo)
    {
        $this->_replyTo = $replyTo;
        foreach ($this->messages as $message) {
            $message->setReplyTo($replyTo);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCc()
    {
        return $this->_cc;
    }

    /**
     * @inheritdoc
     */
    public function setCc($cc)
    {
        $this->_cc = $cc;
        foreach ($this->messages as $message) {
            $message->setCc($cc);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getBcc()
    {
        return $this->_bcc;
    }

    /**
     * @inheritdoc
     */
    public function setBcc($bcc)
    {
        $this->_bcc = $bcc;
        foreach ($this->messages as $message) {
            $message->setBcc($bcc);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getSubject()
    {
        return $this->_subject;
    }

    /**
     * @inheritdoc
     */
    public function setSubject($subject)
    {
        $this->_subject = $subject;
        foreach ($this->messages as $message) {
            $message->setSubject($subject);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setTextBody($text)
    {
        foreach ($this->messages as $message) {
            $message->setTextBody($text);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setHtmlBody($html)
    {
        foreach ($this->messages as $message) {
            $message->setHtmlBody($message);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function attach($fileName, array $options = [])
    {
        foreach ($this->messages as $message) {
            $message->attach($fileName, $options);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function attachContent($content, array $options = [])
    {
        foreach ($this->messages as $message) {
            $message->attachContent($content, $options);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function embed($fileName, array $options = [])
    {
        $cid = '';
        foreach ($this->messages as $index => $message) {
            $messageCid = $message->embed($fileName, $options);
            // We concider main mailer is going first... so well return it CID
            if ($index === 0) {
                $cid = $messageCid;
            }
        }

        return $cid;
    }

    /**
     * @inheritdoc
     */
    public function embedContent($content, array $options = [])
    {
        $cid = '';
        foreach ($this->messages as $index => $message) {
            $messageCid = $message->embedContent($content, $options);
            // We concider main mailer is going first... so well return it CID
            if ($index === 0) {
                $cid = $messageCid;
            }
        }

        return $cid;
    }

    /**
     * @inheritdoc
     */
    public function toString()
    {
        return '';
    }
}

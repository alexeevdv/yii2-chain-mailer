<?php

namespace tests;

use yii\mail\BaseMessage;

/**
 * Class DummyMessage
 * @package tests
 */
class DummyMessage extends BaseMessage
{
    /**
     * @inheritDoc
     */
    public function getCharset()
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function setCharset($charset)
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getFrom()
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function setFrom($from)
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getTo()
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function setTo($to)
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getReplyTo()
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function setReplyTo($replyTo)
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCc()
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function setCc($cc)
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getBcc()
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function setBcc($bcc)
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getSubject()
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function setSubject($subject)
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setTextBody($text)
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setHtmlBody($html)
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function attach($fileName, array $options = [])
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function attachContent($content, array $options = [])
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function embed($fileName, array $options = [])
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function embedContent($content, array $options = [])
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function toString()
    {
        return '';
    }
}

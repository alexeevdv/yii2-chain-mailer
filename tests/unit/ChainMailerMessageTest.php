<?php

namespace tests\unit;

use alexeevdv\mailer\ChainMailerMessage;
use Codeception\Stub;

/**
 * Class ChainMailerMessageTest
 * @package tests\unit
 */
class ChainMailerMessageTest extends \Codeception\Test\Unit
{
    /**
     * @var \tests\UnitTester
     */
    public $tester;

    /**
     * @test
     */
    public function setAndGetCharset()
    {
        $message = new ChainMailerMessage([
            'charset' => 'windows-1251',
            'messages' => [
                Stub::make(ChainMailerMessage::class),
            ],
        ]);
        $this->tester->assertEquals(
            'windows-1251',
            $message->getCharset(),
            'Charset should be the same as set via constructor'
        );
        $return = $message->setCharset('utf-8');
        $this->tester->assertEquals(
            'utf-8',
            $message->getCharset(),
            'Charset should be the same as set via setter'
        );
        $this->tester->assertEquals($return, $message, 'Setter should return object instance for chaining');
    }

    /**
     * @test
     */
    public function setAndGetFrom()
    {
        $message = new ChainMailerMessage([
            'from' => 'mail@example.org',
            'messages' => [
                Stub::make(ChainMailerMessage::class),
            ],
        ]);
        $this->tester->assertEquals(
            'mail@example.org',
            $message->getFrom(),
            'Mail should be the same as set via constructor'
        );
        $return = $message->setFrom(['mail2@example.org' => 'John Doe']);
        $this->tester->assertEquals(
            ['mail2@example.org' => 'John Doe'],
            $message->getFrom(),
            'Mail should be the same as set via setter'
        );
        $this->tester->assertEquals($return, $message, 'Setter should return object instance for chaining');
    }

    /**
     * @test
     */
    public function setAndGetTo()
    {
        $message = new ChainMailerMessage([
            'to' => 'mail@example.org',
            'messages' => [
                Stub::make(ChainMailerMessage::class),
            ],
        ]);
        $this->tester->assertEquals(
            'mail@example.org',
            $message->getTo(),
            'Mail should be the same as set via constructor'
        );
        $return = $message->setTo(['mail2@example.org' => 'John Doe']);
        $this->tester->assertEquals(
            ['mail2@example.org' => 'John Doe'],
            $message->getTo(),
            'Mail should be the same as set via setter'
        );
        $this->tester->assertEquals($return, $message, 'Setter should return object instance for chaining');
    }

    /**
     * @test
     */
    public function setAndGetReplyTo()
    {
        $message = new ChainMailerMessage([
            'replyTo' => 'mail@example.org',
            'messages' => [
                Stub::make(ChainMailerMessage::class),
            ],
        ]);
        $this->tester->assertEquals(
            'mail@example.org',
            $message->getReplyTo(),
            'Mail should be the same as set via constructor'
        );
        $return = $message->setReplyTo(['mail2@example.org' => 'John Doe']);
        $this->tester->assertEquals(
            ['mail2@example.org' => 'John Doe'],
            $message->getReplyTo(),
            'Mail should be the same as set via setter'
        );
        $this->tester->assertEquals($return, $message, 'Setter should return object instance for chaining');
    }

    /**
     * @test
     */
    public function setAndGetCc()
    {
        $message = new ChainMailerMessage([
            'cc' => 'mail@example.org',
            'messages' => [
                Stub::make(ChainMailerMessage::class),
            ],
        ]);
        $this->tester->assertEquals(
            'mail@example.org',
            $message->getCc(),
            'Mail should be the same as set via constructor'
        );
        $return = $message->setCc(['mail2@example.org' => 'John Doe']);
        $this->tester->assertEquals(
            ['mail2@example.org' => 'John Doe'],
            $message->getCc(),
            'Mail should be the same as set via setter'
        );
        $this->tester->assertEquals($return, $message, 'Setter should return object instance for chaining');
    }

    /**
     * @test
     */
    public function setAndGetBcc()
    {
        $message = new ChainMailerMessage([
            'bcc' => 'mail@example.org',
            'messages' => [
                Stub::make(ChainMailerMessage::class),
            ],
        ]);
        $this->tester->assertEquals(
            'mail@example.org',
            $message->getBcc(),
            'Mail should be the same as set via constructor'
        );
        $return = $message->setBcc(['mail2@example.org' => 'John Doe']);
        $this->tester->assertEquals(
            ['mail2@example.org' => 'John Doe'],
            $message->getBcc(),
            'Mail should be the same as set via setter'
        );
        $this->tester->assertEquals($return, $message, 'Setter should return object instance for chaining');
    }

    /**
     * @test
     */
    public function setAndGetSubject()
    {
        $message = new ChainMailerMessage([
            'subject' => 'Hello there!',
            'messages' => [
                Stub::make(ChainMailerMessage::class),
            ],
        ]);
        $this->tester->assertEquals(
            'Hello there!',
            $message->getSubject(),
            'Subject should be the same as set via constructor'
        );
        $return = $message->setSubject('Password recovery');
        $this->tester->assertEquals(
            'Password recovery',
            $message->getSubject(),
            'Subject should be the same as set via setter'
        );
        $this->tester->assertEquals($return, $message, 'Setter should return object instance for chaining');
    }

    /**
     * @test
     */
    public function setTextBody()
    {
        $message = new ChainMailerMessage([
            'messages' => [
                Stub::make(ChainMailerMessage::class),
            ],
        ]);
        $return = $message->setTextBody('Hello world!');
        $this->tester->assertEquals($return, $message, 'Setter should return object instance for chaining');
    }

    /**
     * @test
     */
    public function setHtmlBody()
    {
        $message = new ChainMailerMessage([
            'messages' => [
                Stub::make(ChainMailerMessage::class),
            ],
        ]);
        $return = $message->setHtmlBody('<strong>Hello world!</strong>');
        $this->tester->assertEquals($return, $message, 'Setter should return object instance for chaining');
    }

    /**
     * @test
     */
    public function attach()
    {
        $message = new ChainMailerMessage([
            'messages' => [
                Stub::make(ChainMailerMessage::class),
            ],
        ]);
        $return = $message->attach('fileName');
        $this->tester->assertEquals($return, $message, 'Method should return object instance for chaining');
    }

    /**
     * @test
     */
    public function attachContent()
    {
        $message = new ChainMailerMessage([
            'messages' => [
                Stub::make(ChainMailerMessage::class),
            ],
        ]);
        $return = $message->attachContent('content');
        $this->tester->assertEquals($return, $message, 'Method should return object instance for chaining');
    }

    /**
     * @test
     */
    public function embed()
    {
        $message = new ChainMailerMessage([
            'messages' => [
                Stub::make(ChainMailerMessage::class, [
                    'embed' => function () {
                        return 'C-I-D';
                    },
                ]),
            ],
        ]);
        $return = $message->embed('fileName');
        $this->tester->assertEquals('C-I-D', $return, 'Method should return attachment CID');
    }

    /**
     * @test
     */
    public function embedContent()
    {
        $message = new ChainMailerMessage([
            'messages' => [
                Stub::make(ChainMailerMessage::class, [
                    'embedContent' => function () {
                        return 'C-I-D';
                    },
                ]),
            ],
        ]);
        $return = $message->embedContent('content');
        $this->tester->assertEquals('C-I-D', $return, 'Method should return attachment CID');
    }

    /**
     * @test
     */
    public function toString()
    {
        $message = new ChainMailerMessage([
            'messages' => [
                Stub::make(ChainMailerMessage::class),
            ],
        ]);
        $this->tester->assertEmpty($message->toString());
    }
}

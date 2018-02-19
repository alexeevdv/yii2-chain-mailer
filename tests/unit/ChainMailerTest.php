<?php

namespace tests\unit;

use alexeevdv\mailer\ChainMailer;
use tests\DummyMailer;
use tests\DummyMessage;
use yii\mail\MailEvent;

/**
 * Class ChainMailerTest
 * @package tests\unit
 */
class ChainMailerTest extends \Codeception\Test\Unit
{
    /**
     * @var \tests\UnitTester
     */
    public $tester;

    /**
     * @test
     */
    public function testSend()
    {
        $mailer = new ChainMailer([
            'viewPath' => '/dev/null',
            'mailers' => [
                [
                    'class' => DummyMailer::class,
                ],
            ],
        ]);

        $return = $mailer
            ->compose()
            ->setTo([
                'mail@example.org' => 'John Doe'
            ])
            ->send();

        $this->tester->assertEquals(
            true,
            $return,
            'Dummy message should be sent'
        );

        $message = new DummyMessage(['mailer' => new DummyMailer]);
        $return = $mailer->send($message);
        $this->tester->assertTrue($return, 'Dummy message should be sent');
    }

    /**
     * @test
     */
    public function testFailedBeforeSend()
    {
        $mailer = new ChainMailer([
            'mailers' => [
                [
                    'class' => DummyMailer::class,
                ],
            ],
        ]);

        $mailer->on(ChainMailer::EVENT_BEFORE_SEND, function (MailEvent $event) {
            $event->isValid = false;
        });

        $return = $mailer
            ->compose()
            ->setTo([
                'mail@example.org' => 'John Doe'
            ])
            ->send();

        $this->tester->assertEquals(
            false,
            $return,
            'Dummy message should not be sent because of beforeSend event'
        );
    }

}

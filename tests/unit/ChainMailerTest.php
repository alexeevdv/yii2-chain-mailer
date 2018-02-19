<?php

namespace tests\unit;

use alexeevdv\mailer\ChainMailer;
use Yii;

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
        Yii::setAlias('@app/mail', '/dev/null');

        $mailer = new ChainMailer([
            'mailers' => [
                [
                    'class' => ChainMailer::class,
                ],
            ],
        ]);

        $return = $mailer
            ->compose(null)
            ->send();

        $this->tester->assertEquals(
            false,
            $return,
            'No actual email is sent in this case'
        );
    }
}

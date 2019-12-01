<?php

namespace frontend\tests;

use Codeception\Test\Unit;
use common\models\LoginForm;
use frontend\models\ContactForm;

class FirstTest extends Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testVariable()
    {
        //$this->assertTrue - сравнении с true
        $a = true;
        $this->assertTrue($a);

        //$this->assertEquals - равно ожидаемому значению
        $a = 123;
        $this->assertEquals(123, $a);
        //$this->assertLessThan - меньше ожидаемого значения
        $this->assertLessThan(157, $a);

        // $this->assertAttributeEquals - значение атрибута (свойства) объекта равно ожидаемому значению
        $contact = new ContactForm();
        $contact->name = 'first';
        $contact->email = 'first@mail.ru';
        $contact->subject = 'Theme content';
        $contact->body = 'Content body';
        $contact->verifyCode = 'verify5161code';

        $this->assertAttributeEquals('first', 'name', $contact);
        $this->assertAttributeEquals('first@mail.ru', 'email', $contact);
        $this->assertAttributeEquals('Theme content', 'subject', $contact);
        $this->assertAttributeEquals('Content body', 'body', $contact);
        $this->assertAttributeEquals('verify5161code', 'verifyCode', $contact);
        // проверка в стиле expect()->
        expect('name = first', $contact->name)->equals('first');
        expect('email = first@mail.ru', $contact->email)->equals('first@mail.ru');

        //$this->assertArrayHasKey - в массиве есть указанный ключ
        $arr = [
            'first' => 'one',
            'second' => 'two',
            'third' => 'three',
            'fourth' => 'four',
        ];
        $this->assertArrayHasKey('second', $arr);

        $obj = new LoginForm();
        expect('rememberMe is true', $obj->rememberMe)->equals(true);

    }
}
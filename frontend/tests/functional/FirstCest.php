<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use Codeception\Example;

class FirstCest
{
    public function _before(FunctionalTester $I)
    {
    }

    /**
     * @dataProvider pageProvider
     */
    public function staticPages(FunctionalTester $I, Example $data)
    {
        $I->amOnPage($data['url']);
        $I->see($data['h1'], 'h1');
    }

    /**
     * @return array
     */
    protected function pageProvider()
    {
        return [
            ['url' => "/", 'h1' => "Congratulations!"],
            ['url' => "site/about", 'h1' => "About"],
            ['url' => "site/contact", 'h1' => "Contact"],
            ['url' => "site/signup", 'h1' => "Signup"],
            ['url' => "site/login", 'h1' => "Login"]
        ];
    }
}

<?php
use yii\helpers\Url as Url;

class HomeCest
{
    public function ensureThatHomePageWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));        
        $I->see('Новости');
        
        $I->seeLink('About');
        $I->click('About');
        $I->wait(2); // wait for page to be opened
        
        $I->see('This is the About page.');
    }
}
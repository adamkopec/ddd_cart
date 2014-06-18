<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('add a product to basket and see if it is inside');
$I->amOnPage('/');
$I->click('addToBasket', '.addToBasket:nth-child(1)');
$I->amOnPage('/basket');
$I->see('You have just added a product to basket');
$I->seeElement('table',['class' => 'basketProductTable']);
$I->seeElement('table tr', ['class' => 'basketProductRow']);

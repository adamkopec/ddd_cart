<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that there are some products on welcome page');
$I->amOnPage('/');
$I->seeElement('table',['class' => 'mainProductTable']);
$I->seeElement('table tr', ['class' => 'productRow']);

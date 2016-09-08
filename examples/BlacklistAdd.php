<?php

//First you should set AppKey and SecretKey value inside
//EmailLabsConfig.php

//Including autoloader
require_once( '../autoload.php' );

//Init BlacklistAdd action
//This action will add address into blacklist
$blacklist = new \EmailLabs\Actions\BlacklistAdd();

//Add data required to add address into blacklist ( Basic )
$blacklist->setData( 'account', '1.mkujawski.smtp' );
$blacklist->setData( 'email', 'test_email@example.com' );

//You can also add you comment, reason and source ( Not required )
//Allowed reasons: unsubscribe, hardbounce, spam_complaint, other
$blacklist->setData( 'reason', 'unsubscribe' );
$blacklist->setData( 'comment', 'Address has been banned' );
$blacklist->setData( 'source', 'CMS' );

//Send request and get response from server
var_dump( $blacklist->getResult() );

//Get errors if exists
if( count( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() ) > 0 ){
    var_dump( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() );
}
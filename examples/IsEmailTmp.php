<?php

//First you should set AppKey and SecretKey value inside
//EmailLabsConfig.php

//Including autoloader
require_once( '../autoload.php' );

//Init IsEmailTmp action
//This action will check if email address is templorary like yopmail.com
$tmpMail = new \EmailLabs\Actions\IsEmailTmp();

//Add email address to check
$tmpMail->setEmail( 'teat_address@example.com' );

//Send request and get response from server
var_dump( $tmpMail->getResult() );

//Get errors if exists
if( count( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() ) > 0 ){
    var_dump( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() );
}
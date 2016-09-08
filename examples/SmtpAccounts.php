<?php

//First you should set AppKey and SecretKey value inside
//EmailLabsConfig.php

//Including autoloader
require_once( '../autoload.php' );

//Init SmtpAccounts action
//This action will all your smtp accounts
$accounts = new \EmailLabs\Actions\SmtpAccounts();

//Send request and get response from server
var_dump( $accounts->getResult() );

//Get errors if exists
if( count( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() ) > 0 ){
    var_dump( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() );
}
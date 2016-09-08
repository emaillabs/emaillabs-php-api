<?php

//First you should set AppKey and SecretKey value inside
//EmailLabsConfig.php

//Including autoloader
require_once( '../autoload.php' );

//Init BlacklistReasons action
//This action will get all reasons of blacklisting
$blacklist = new \EmailLabs\Actions\BlacklistReasons();

//Send request and get response from server
var_dump( $blacklist->getResult() );

//Get errors if exists
if( count( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() ) > 0 ){
    var_dump( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() );
}
<?php

//First you should set AppKey and SecretKey value inside
//EmailLabsConfig.php

//Including autoloader
require_once( '../autoload.php' );

//Init Agregate action
//This action will get aggregated data about sent messages
$agregate = new \EmailLabs\Actions\Agregate();

//Required params
$agregate->setParam( 'smtp_account', '1.name_of_smtp_server.smtp' );
$agregate->setParam( 'date_from', strtotime( '2016-01-01' ) );

//Not required but usefull
$agregate->setParam( 'date_to', strtotime( '2016-01-14' ) );

//Send request and get response from server
var_dump( $agregate->getResult() );

//Get errors if exists
if( count( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() ) > 0 ){
    var_dump( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() );
}
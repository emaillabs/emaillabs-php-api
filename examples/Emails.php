<?php

//First you should set AppKey and SecretKey value inside
//EmailLabsConfig.php

//Including autoloader
require_once( '../autoload.php' );

//Init Emails action
//This action will get list of all emails send by SMTP
$mails = new \EmailLabs\Actions\Emails();

//Add params to filter response ( Not Required )
//Way of sorting data
$mails->setParam( 'sort', '-created_at' );          //DESC
//$blacklist->setParam( 'sort', 'created_at' );     //ASC
//Max number of results per request
$mails->setParam( 'limit', 10 );
//Start at row
$mails->setParam( 'offset', 40 );

//In this action You can also use filters:
//created_at.from - Date of creation "from"
//created_at.to - Date of creation "to"
//account - SMTP account
//message_id - Id of message
//injected_time.from - Date of getting by server "from"
//injected_time.to - Date of getting by server "to"
//
//Example: $mails->setFilter( 'created_at.from', strtotime( '2016-01-01' ) );

//Send request and get response from server
var_dump( $mails->getResult() );

//Get errors if exists
if( count( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() ) > 0 ){
    var_dump( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() );
}
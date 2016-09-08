<?php

//First you should set AppKey and SecretKey value inside
//EmailLabsConfig.php

//Including autoloader
require_once( '../autoload.php' );

//Init OpenTracking action
//This action will get list opened emails ( max from last 3 days )
$opens = new \EmailLabs\Actions\OpenTracking();

//Add params to filter response ( Not Required )
//Way of sorting data
$opens->setParam( 'sort', '-created_at' );          //DESC
//$blacklist->setParam( 'sort', 'created_at' );     //ASC
//Max number of results per request
$opens->setParam( 'limit', 10 );
//Start at row
$opens->setParam( 'offset', 40 );

//In this action You can also use filters:
//created_at.from - Date of creation "from"
//created_at.to - Date of creation "to"
//account - SMTP account
//
//Example: $opens->setFilter( 'created_at.from', strtotime( '2016-01-01' ) );

//Send request and get response from server
var_dump( $opens->getResult() );

//Get errors if exists
if( count( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() ) > 0 ){
    var_dump( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() );
}
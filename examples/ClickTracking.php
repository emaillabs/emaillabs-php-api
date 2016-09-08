<?php

//First you should set AppKey and SecretKey value inside
//EmailLabsConfig.php

//Including autoloader
require_once( '../autoload.php' );

//Init ClickTracking action
//This action will get all clicks ( max from last 3 days )
$click = new \EmailLabs\Actions\ClickTracking();

//Add params to filter response ( Not Required )
//Way of sorting data
$click->setParam( 'sort', '-created_at' );          //DESC
//$blacklist->setParam( 'sort', 'created_at' );     //ASC
//Max number of results per request
$click->setParam( 'limit', 10 );
//Start at row
$click->setParam( 'offset', 30 );

//In this action You can also use filters:
//created_at.from - Date of creation "from"
//created_at.to - Date of creation "to"
//
//Example: $click->setFilter( 'created_at.from', strtotime( '2016-01-01' ) );

//Send request and get response from server
var_dump( $click->getResult() );

//Get errors if exists
if( count( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() ) > 0 ){
    var_dump( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() );
}
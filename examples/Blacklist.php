<?php

//First you should set AppKey and SecretKey value inside
//EmailLabsConfig.php

//Including autoloader
require_once( '../autoload.php' );

//Init Blacklist action
//This action will get addresses that are blacklisted
$blacklist = new \EmailLabs\Actions\Blacklist();

//Add params to filter response ( Not Required )
//Way of sorting data
$blacklist->setParam( 'sort', '-created_at' );          //DESC
//$blacklist->setParam( 'sort', 'created_at' );         //ASC
//Max number of results per request
$blacklist->setParam( 'limit', 10 );
//Start at row
$blacklist->setParam( 'offset', 30 );

//In this action You can also use filters:
//account - smtp account
//email - e-mail address
//created_at.from - Date of creation "from"
//created_at.to - Date of creation "to"
//reason - Reason of blacklisting
//source - Source of blacklisting
//
//Example: $blacklist->setFilter( 'reason', 'spambounce' );
//Example: $blacklist->setFilter( 'source', 'smtp' );

//Send request and get response from server
var_dump( $blacklist->getResult() );

//Get errors if exists
if( count( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() ) > 0 ){
    var_dump( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() );
}
<?php

//First you should set AppKey and SecretKey value inside
//EmailLabsConfig.php

//Including autoloader
require_once( '../autoload.php' );

//Init AddTemplate action
//This action allows you to add email template
$addTemplate = new \EmailLabs\Actions\AddTemplate();

//Set html-template value
//Between {{ and }} you can add varieble name that could be
//replaced by some values in SendmailTemplate action
$addTemplate->setData( 'html', '<p>{{ firstName }}</p>' );

//Set txt-template value
$addTemplate->setData( 'txt', '{{ firstName }}' );

//Send request and get response from server
//Inside response will be include [template_id] => {some_value}
//You can use it in SendmailTemplate action
var_dump( $addTemplate->getResult() );

//Get errors if exists
if( count( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() ) > 0 ){
    var_dump( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() );
}
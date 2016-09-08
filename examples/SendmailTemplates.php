<?php

//First you should set AppKey and SecretKey value inside
//EmailLabsConfig.php

//Including autoloader
require_once( '../autoload.php' );

//Prepear email array
$adresses = array(
    'reciver01@example.com' => array(
        'vars' => array(
            'test' => 'This is test var 001',
            'user' => 'User 001'
        ),
        'message_id' => 'messageid001@example.com'
    ),
    'reciver02@example.com' => array(
        'vars' => array(
            'test' => 'This is test var 001',
            'user' => 'User 002'
        ),
        'message_id' => 'messageid002@example.com'
    )
);


//Init SendmailTemplates action
//This action will send e-mail
$mail = new \EmailLabs\Actions\SendmailTemplates();

//Set required data
$mail->setData( 'from', 'sender@example.com' );
$mail->setData( 'from_name', 'Sender Name' );
$mail->setData( 'to', $adresses );
$mail->setData( 'subject', 'Message subject {{ user }}' );
$mail->setData( 'smtp_account', '1.name_of_smtp_account.smtp' );

//Html or txt are required
$mail->setData( 'html', '<p>Html message {{ test }} body</p>' );
$mail->setData( 'text', 'Text message body {{ test }}' );

//You can also set data:
//cc - CC reciver
//cc_name - Name of cc reciver
//bcc - BCC reciver
//bcc_name - Name of bcc
//replay_to - Replay_to address

//Add attachment as inline
//$mail->setFile( 'path_to_file', 1 );

//Add attachment as regular attachment
//$mail->setFile( 'path_to_file', 0 );

//Set custom header
//$mail->setHeader( 'X-CUSTOM-HEADER', 'MY_CUSTOM_HEADER' );

//Set tag
//$mail->setTag( 'tag1' );

//Send request and get response from server
var_dump( $mail->getResult() );

//Get errors if exists
if( count( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() ) > 0 ){
    var_dump( \EmailLabs\Tools\EmailLabsErrorHandler::getErrors() );
}
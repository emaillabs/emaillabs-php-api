<?php

//First you should set AppKey and SecretKey value inside
//EmailLabsConfig.php

//Including autoloader
require_once( '../autoload.php' );

//Init Sendmail action
//This action will send e-mail
$mail = new \EmailLabs\Actions\Sendmail();

$mail->setAppKey( "APP_KEY" );

$mail->setAppSecret( "APP_SECRET" );

//Prepear email array
$adresses = array(
    'reciver01@example.com' => array(
        'message_id' => 'messageid001@example.com'
    ),
    'reciver02@example.com' => array(
        'message_id' => 'messageid002@example.com'
    )
);

//Set required data
$mail->setData( 'from', 'sender@example.com' );
$mail->setData( 'from_name', 'Sender Name' );
$mail->setData( 'to', $adresses );
$mail->setData( 'subject', 'Message subject' );
$mail->setData( 'smtp_account', '1.smtp_account_name.smtp' );

//Html or txt are required
$mail->setData( 'html', '<p>Html message body</p>' );
$mail->setData( 'text', 'Text message body' );

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
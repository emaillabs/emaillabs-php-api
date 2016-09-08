### 1. Instalation
---------------------------------------------------------------------------

To install this library simply add

```json
{
  "require": {
    "emaillabs/emaillabs-php-api"   : "dev-master"
  }
}
```

into your composer.json file and run

```
composer install
```

Inside EmailLabsConfig.php change $appKey and $appSecret

```php
    
    /**
     * @var string App key from EmailLabs panel
     */
    private $appKey = '';

    /**
     * @var string App secret from EmailLabs panel
     */
    private $appSecret = '';
    
```

Your library is ready to send e-mails via EmailLabs

### 2. Actions
---------------------------------------------------------------------------

| Action | Desctiption |
| --- | --- |
| \EmailLabs\Actions\AddTemplate | This function lets you add a message template. |
| \EmailLabs\Actions\Agregate | This function allows you to download aggregated data divided into statuses. |
| \EmailLabs\Actions\AgregateTags | This function allows you to download aggregated data with a division into tags. |
| \EmailLabs\Actions\Blacklist | This function allows you to download a list of blocked addresses (blacklist), to which e-mails will not be sent. |
| \EmailLabs\Actions\BlacklistAdd | This function allows you to add an email address to the blacklist, which means it will exclude this address for each subsequent transmission. |
| \EmailLabs\Actions\BlacklistCheck | This function allows you to check whether an email address is on the blacklist, and for what reason. This function accepts an additional parameter. |
| \EmailLabs\Actions\BlacklistDelete | This function allows you to remove an email address from the blacklist, it accepts one additional parameter. |
| \EmailLabs\Actions\BlacklistReasons | This function allows you to download a list of reasons for rejections of e-mail addresses on to the black list. |
| \EmailLabs\Actions\ClickTracking | This function allows you to download e-mail messages sent by SMTP server. This option allows you to determine on which fields the search will take place, allowing you to precisely match the result.  |
| \EmailLabs\Actions\Emails | This function allows you to download e-mail messages sent by SMTP server. This option allows you to determine on which fields the search will take place, allowing you to precisely match the result. |
| \EmailLabs\Actions\IsEmailTmp | This feature allows you to determine if a e-mail address is registered in one of the sites that provide temporary email addresses (ie. YopMail) |
| \EmailLabs\Actions\OpenTracking | This function allows to download the users e-mail openings, it accepts additional parameters. |
| \EmailLabs\Actions\Sendmail | This function allows you to send messages. |
| \EmailLabs\Actions\SendmailTemplates | This function allows you to send messages using a previously loaded template or an individually sent template without an entry.  |
| \EmailLabs\Actions\SmtpAccounts | This function allows you to get all your smtp accounts. |
| \EmailLabs\Actions\SmtpEvents | This function lets you download e-mail messages based on the status, which it ultimately received. |

For more information visit http://dev.emaillabs.io/
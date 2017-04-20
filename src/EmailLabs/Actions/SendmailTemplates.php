<?php
/**
 * Copyright 2016 Vercom S.A.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace EmailLabs\Actions;

use \EmailLabs\Actions\Sendmail;

class SendmailTemplates extends Sendmail
{
    /**
     * @var string Name of the action
     */
    protected $action = 'sendmail_templates';

    /**
     * @var array Allowed data
     */
    protected $allowedData = array( 'to', 'smtp_account', 'subject', 'html', 'text', 'from', 'from_name', 'headers', 'cc',
        'cc_name', 'bcc', 'bcc_name', 'replay_to', 'reply_to', 'tags', 'files', 'template_id' );

    /**
     * @var array Array with required items
     */
    protected $requireData = array( 'to', 'smtp_account', 'subject', 'from' );

}
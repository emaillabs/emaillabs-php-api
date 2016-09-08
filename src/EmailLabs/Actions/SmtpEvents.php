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

use \EmailLabs\Tools\EmailLabsRequestLayer;


class SmtpEvents extends EmailLabsRequestLayer
{

    /**
     * @var string Method of the request
     */
    protected $method = 'GET';

    /**
     * @var string Name of the action
     */
    protected $action = 'smtp_events/';

    /**
     * @var Added filters
     */
    protected $filters = array();

    /**
     * @var Added params
     */
    protected $params = array( 'offset' => 0, 'limit' => 100, 'sort' => '-created_at' );

    /**
     * @var array Allowed filters
     */
    protected $allowFilters = array( 'created_at.from', 'created_at.to', 'injected_time.from', 'injected_time.to' );

    /**
     * @var array Allowed filters
     */
    protected $allowParams = array( 'sort', 'limit', 'offset', 'from_time' );

    /**
     * @var string Type of emails
     */
    private $event = 'ok';

    /**
     * @param string $type Type of event
     */
    public function setEvent( $event='ok' ){
        $this->event = $event;
    }

    /**
     * @return string return name of action
     */
    public function getAction(){return "smtp_events/".$this->event;}

}
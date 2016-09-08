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


class AddTemplate extends EmailLabsRequestLayer
{
    /**
     * @var string Method of the request
     */
    protected $method = 'POST';

    /**
     * @var string Name of the action
     */
    protected $action = 'add_template';

    /**
     * @var array Array with required items
     */
    protected $requireData = array( 'html' );

    /**
     * @var array Array with required items
     */
    protected $allowedData = array( 'html', 'txt' );

    /**
     * @var array Array with data to send
     */
    protected $data = array();

}
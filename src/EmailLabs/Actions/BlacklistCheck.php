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
use \EmailLabs\Tools\EmailLabsErrorHandler;

class BlacklistCheck extends EmailLabsRequestLayer
{
    /**
     * @var string Method of the request
     */
    protected $method = 'GET';

    /**
     * @var string Name of the action
     */
    protected $action = 'blacklists/email/';

    /**
     * @var string Email to check if exists
     */
    private $email;

    /**
     * @param $email string Email to check
     */
    public function setEmail( $email ){ $this->email = $email; }

    /**
     * @return string Url to request
     */
    public function getAction(){ return "blacklists/email/".$this->email; }

    /**
     * Getting result
     */
    public function getResult(){
        try{
            if($this->email) {
                return $this->curl->getResult( $this->getAction(), $this->getMethod(), $this->getData(), $this->getParams(), $this->getFilters() );
            }else{
                throw new \Exception( "Email is require for this method, use ->setEmail( 'email@adress' )" );
            }
        }catch( \Exception $e ){
            EmailLabsErrorHandler::setError( __CLASS__, 'Error', $e->getMessage() );
        }

    }
}
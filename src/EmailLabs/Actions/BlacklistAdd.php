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

class BlacklistAdd extends EmailLabsRequestLayer
{
    /**
     * @var string Method of the request
     */
    protected $method = 'POST';

    /**
     * @var string Name of the action
     */
    protected $action = 'blacklists';

    /**
     * @var array Array with required items
     */
    protected $requireData = array( 'account', 'email', 'reason', 'comment' );

    /**
     * @var array Array with data to send
     */
    protected $data = array( 'reason' => 'spam_complaint', 'comment' => 'Added by library to support web-service', 'source' => 'api-client' );

    /**
     * @var array Array with allowed fields
     */
    protected $allowedData = array( 'reason', 'comment', 'source', 'account', 'email' );

    /**
     * Getting result
     */
    public function getResult(){
        try{
            if( !empty( $this->data['account'] ) && !empty( $this->data['email'] ) ){
                return $this->curl->getResult( $this->getAction(), $this->getMethod(), $this->getData(), $this->getParams(), $this->getFilters() );
            }else{
                throw new \Exception( 'Account and email are required' );
            }
        }catch(\Exception $e){
            EmailLabsErrorHandler::setError( __CLASS__, 'Error', $e->getMessage() );
        }
    }

}
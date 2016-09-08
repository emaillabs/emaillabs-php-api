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
namespace EmailLabs\Tools;

use \EmailLabs\EmailLabsConfig;
use \EmailLabs\Tools\EmailLabsFilter;

class EmailLabsCurl extends EmailLabsConfig{

    /**
     * @var resource Resource with curl
     */
    private $curlLink;

    /**
     * @var object Object with result of request
     */
    private $resultSet;

    /**
     * Main constructor
     */
    public function __construct(){
        try{

            if( $this->getAppKey() != '' && $this->getAppSecret() != '' ){
                $this->curlLink = curl_init();
                curl_setopt( $this->curlLink, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
                curl_setopt( $this->curlLink, CURLOPT_USERPWD , $this->getAppKey().":".$this->getAppSecret() );
                curl_setopt( $this->curlLink, CURLOPT_RETURNTRANSFER, 1 );
                curl_setopt( $this->curlLink, CURLOPT_HTTPHEADER, array( 'X-EL-CLI-VERSION' => $this->getCliVersion() ) );
            }else{
                throw new \Exception( "You must enter app-secret and app-key inside 'EmailLabsContig.php' before you start working with the API." );
            }

        }catch( \Exception $e ){
            die( $e->getMessage() );
        }
    }

    /**
     * Method send request to web-service
     *
     * @param $action string Name of action
     * @param $method string Method of the action
     * @param string $data array Array with data
     * @param string $params array Array with params
     * @param string $filters array Array with filters
     */
    public function getResult( $action, $method, $data='', $params='', $filters='' ){
        try{

            $url = $this->getAdress().$action;

            if( $params ){
                $url = sprintf("%s?%s", $url, http_build_query($params));
            }

            if( $filters ){
                $filterClass = new EmailLabsFilter();
                $url = $url.$filterClass->setFilter( $filters );
            }

            curl_setopt( $this->curlLink, CURLOPT_URL, $url );

            switch( $method ){
                case "GET":
                    break;
                case "POST":
                    curl_setopt( $this->curlLink, CURLOPT_POST, 1 );
                    curl_setopt( $this->curlLink, CURLOPT_POSTFIELDS, http_build_query( $data ) );
                    break;
                case "DELETE":
                    curl_setopt( $this->curlLink, CURLOPT_CUSTOMREQUEST, "DELETE" );
                    break;
                default:
                    break;
            }

            $this->resultSet = json_decode( curl_exec( $this->curlLink ) );

            return $this->analyzeResult();

        }catch( \Exception $e ){
            EmailLabsErrorHandler::setError( __CLASS__, 'Error', $e->getMessage() );
        }
    }

    /**
     * This method is chacking results
     */
    public function analyzeResult(){
        try{
            if( $this->resultSet )
            {
                if( $this->resultSet->code == "200" ){
                    return $this->resultSet;
                }else{
                    throw new \Exception( $this->resultSet->message );
                }
            }else {
                throw new \Exception( 'Result was empty' );
            }
        }catch( \Exception $e ){
            EmailLabsErrorHandler::setError(__CLASS__, 'Error', $e->getMessage());
        }
    }

}
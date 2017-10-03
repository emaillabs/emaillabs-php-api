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

use \EmailLabs\EmailLabsInit;
use EmailLabs\Tools\EmailLabsCurl;
use \EmailLabs\Tools\EmailLabsActionInterface;
use \EmailLabs\Tools\EmailLabsErrorHandler;

class EmailLabsRequestLayer implements EmailLabsActionInterface{

    /**
     * @var string App key from EmailLabs panel
     */
    protected $appKey = '';

    /**
     * @var string App secret from EmailLabs panel
     */
    protected $appSecret = '';

    /**
     * @var string Method of the request
     */
    protected $method = 'GET';

    /**
     * @var string Name of the action
     */
    protected $action = 'clicks';

    /**
     * @var Added filters
     */
    protected $filters = array();

    /**
     * @var Added params
     */
    protected $params = array();

    /**
     * @var array Allowed filters
     */
    protected $allowFilters = array();

    /**
     * @var array Allowed filters
     */
    protected $allowParams = array();

    /**
     * @var array Array with data to send
     */
    protected $data = array();

    /**
     * @var object Curl object container
     */
    protected $curl = '';

    /**
     * @return string Method of the request
     */
    public function getMethod(){ return $this->method; }

    /**
     * @return string Url to request
     */
    public function getAction(){ return $this->action; }

    /**
     * @return array Array with data to send via POST
     */
    public function getData(){ return $this->data; }

    /**
     * @return array Array with filters
     */
    public function getFilters(){ return $this->filters; }

    /**
     * @return array Array with params
     */
    public function getParams(){ return $this->params; }

    /**
     * constructor
     */
    public function __construct(){}

    /**
     * @param $key string Key of param to send
     * @param $value string Value of param to send
     */
    public function setData( $key, $value ){
        try{
            if( in_array( $key, $this->allowedData ) ){
                $this->data[$key] = $value;
            }else{
                throw new \Exception( "Param '".$key."' is not allowed " );
            }
        }catch( \Exception $e ){
            EmailLabsErrorHandler::setError( __CLASS__, 'Error', $e->getMessage() );
        }
    }

    /**
     * @param $key Key of filter
     * @param $value Value of filter
     */
    public function setParam( $key, $value ){
        try{
            if( in_array( $key, $this->allowParams ) ){
                $this->params[$key] = $value;
            }else{
                throw new \Exception( "Param '".$key."' is not allowed " );
            }
        }catch( \Exception $e ){
            EmailLabsErrorHandler::setError( __CLASS__, 'Error', $e->getMessage() );
        }
    }

    /**
     * @param $key Key of filter
     * @param $value Value of filter
     */
    public function setFilter( $key, $value ){
        try{
            if( in_array( $key, $this->allowFilters ) ){
                $this->filters[$key] = $value;
            }else{
                throw new \Exception( "FIlter '".$key."' is not allowed " );
            }
        }catch( \Exception $e ){
            EmailLabsErrorHandler::setError( __CLASS__, 'Error', $e->getMessage() );
        }
    }

    /**
     * @param $limit Number of elements per page
     */
    public function setLimit( $limit ){ $this->setParam( 'limit', intval( $limit ) ); }

    /**
     * @param $offset Number of page
     */
    public function setOffset( $offset ){ $this->setParam( 'offset', intval( $offset ) ); }

    /**
     * @param $field Sort by field
     * @param $order Asc or Desc
     */
    public function setOrder( $field, $order ){
        try{
            $order=strtolower($order);

            if($order=='asc'){
                $orderValue = $field;
            }elseif($order=='desc'){
                $orderValue= '-'.$field;
            }else{
                throw new \Exception( "Order value must be 'asc' or 'desc'. '".$order."' given " );
            }

            $this->setParam( 'sort', $orderValue );
        }catch( \Exception $e ){
            EmailLabsErrorHandler::setError( __CLASS__, 'Error', $e->getMessage() );
        }
    }

    /**
     * Getting result
     */
    public function getResult(){
        $this->curl = new EmailLabsCurl( $this->appKey, $this->appSecret );
        return $this->curl->getResult( $this->getAction(), $this->getMethod(), $this->getData(), $this->getParams(), $this->getFilters() );
    }

    /**
     * This method set app key
     *
     * @param string $appKey AppKey from panel
     */
    public function setAppKey( $appKey="" ){
        $this->appKey = $appKey;
    }

    /**
     * This method set app secret
     *
     * @param string $appSecret AppSecret from panel
     */
    public function setAppSecret( $appSecret ){
        $this->appSecret = $appSecret;
    }

}
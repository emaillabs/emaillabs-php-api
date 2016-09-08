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

interface EmailLabsActionInterface{

    /**
     * @return string Method of the request
     */
    public function getMethod();

    /**
     * @return string Url of action
     */
    public function getAction();

    /**
     * @return array Set of data to send
     */
    public function getData();

    /**
     * @return array Set of filter to send
     */
    public function getFilters();

    /**
     * @return array Set of params to send
     */
    public function getParams();

    /**
     * This method add new item to data
     *
     * @param $key string Key of new item
     * @param $value string Value of new item
     */
    public function setData( $key, $value );

    /**
     * This method add new item to filter
     *
     * @param $key string Key of new item
     * @param $value string Value of new item
     */
    public function setFilter( $key, $value );

    /**
     * This method is limiting number of items in result
     *
     * @param $limit int Number of item in results
     */
    public function setLimit( $limit );

    /**
     * This method setting up number of page
     *
     * @param $offset int Number of page
     */
    public function setOffset( $offset );

    /**
     * Set order of results
     *
     * @param $field string Set field
     * @param $order string Set order Asc or Desc
     */
    public function setOrder( $field, $order );

    /**
     * This method add new item to params
     *
     * @param $key string Key of new item
     * @param $value string Value of new item
     */
    public function setParam( $key, $value );

}
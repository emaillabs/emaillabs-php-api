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

class EmailLabsFilter{

    /**
     * @var array Array with filters
     */
    private $filterArray;

    /**
     * @param $filter array Array with filters
     * @return string Processed filters
     */
    public function setFilter( $filter ){
        $this->filterArray = $filter;
        return $this->processFilter();
    }

    /**
     * This method processing filters
     *
     * @return string PRocessed filters
     */
    private function processFilter(){
        $result = '&filter=';
        foreach($this->filterArray as $key=>$value){
            $result .= $key.'::'.$value.'|';
        }
        $result = substr( $result, 0, -1 );
        return $result;
    }

}
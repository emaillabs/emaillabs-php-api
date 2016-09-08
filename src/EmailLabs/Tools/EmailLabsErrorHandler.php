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

class EmailLabsErrorHandler{

    /**
     * @var array Array with errors
     */
    private static $errors;

    /**
     * @param $class string Class where error throws
     * @param string $lvl Level of the error
     * @param string $msg Message of the error
     */
    public static function setError( $class, $lvl='Error', $msg='Error found' ){
        self::$errors[] = array(
            'class' => $class,
            'lvl' => $lvl,
            'msg' => $msg,
            'date' => date('H:i:s')
        );

        if( $lvl == 'Error' ){
            self::displayErrors();
        }
    }

    /**
     * Method returns array
     *
     * @return array Array with errors
     */
    public static function getErrors(){
        return self::$errors;
    }

    /**
     * Method render html with errors
     */
    public static function displayErrors(){
        $ec = new EmailLabsConfig();
        if( $ec->getMode() == true && !empty( self::$errors ) ){
            $message = '';
            foreach( self::$errors as $item )
                $message .= '['.$item['lvl'].']['.$item['date'].']'.$item['msg']."\n";
            die( $message );
        }
    }

}
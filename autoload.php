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
function errorHandler($errno, $errstr, $errfile, $errline)
{
    $data = "[$errno] $errstr @ $errfile :: $errline \n";
    die($data);
}
set_error_handler("errorHandler");

spl_autoload_register( function( $className ){

    $fileName = str_replace( 'EmailLabs\\', '', $className );
    $fileName = str_replace( '\\', '/', $fileName );

    $baseDir = dirname( __FILE__ );
    $apiDir = $baseDir.'/src/EmailLabs/'.$fileName.'.php';
    $baseClass = $baseDir.'/'.$fileName.'.php';

    if( file_exists( $apiDir ) ){
        require_once( $apiDir );
    }elseif( file_exists( $baseClass ) ){
        require_once( $baseClass );
    }

});
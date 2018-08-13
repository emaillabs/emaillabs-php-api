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

class Sendmail extends EmailLabsRequestLayer
{
    /**
     * @var string Method of the request
     */
    protected $method = 'POST';

    /**
     * @var string Name of the action
     */
    protected $action = 'new_sendmail';

    /**
     * @var array Allowed data
     */
    protected $allowedData = array( 'to', 'smtp_account', 'subject', 'html', 'text', 'from', 'from_name', 'headers', 'cc',
        'cc_name', 'bcc', 'bcc_name', 'replay_to', 'reply_to', 'tags', 'files', 'multi_bcc', 'multi_cc' );

    /**
     * @var array Array with required items
     */
    protected $requireData = array( 'to', 'smtp_account', 'subject', 'from' );

    /**
     * This method is setting up new tag
     *
     * @param $tag Tag to add
     */
    public function setTag( $tag ){
        $actualTags = $this->getData();

        $actualTags['tags'][] = $tag;
        $this->setData( 'tags' , $actualTags['tags'] );
    }

    /**
     * This method is setting up headers
     *
     * @param $name Name of the header
     * @param $value Value of the header
     */
    public function setHeader( $name, $value ){
        if( $name != '' && $value != '' ){
            $actualHaaders = $this->getData();
            $actualHaaders['headers'][ $name ] = $value;

            $this->setData( 'headers' , $actualHaaders['headers'] );
        }
    }

    /**
     * This method is add attatchment to message
     *
     * @param $filePath Path to file
     * @param $inline Type of attached file ( inline = 1 you can add image into e-mail )
     */
    public function setFile( $filePath, $inline = 0 ){
        if( file_exists( $filePath ) ){
            $actualFiles = $this->getData();
            $fileName = explode( '/', $filePath );

            $fileArray = array(
                'name' => end( $fileName ),
                'mime' => mime_content_type( $filePath ),
                'content' => base64_encode( file_get_contents( $filePath ) ),
                'inline' => $inline
            );

            $actualFiles['files'][] = $fileArray;

            $this->setData( 'files' , $actualFiles['files'] );
        }
    }

}

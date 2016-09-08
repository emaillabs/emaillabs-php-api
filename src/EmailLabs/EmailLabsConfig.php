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
namespace EmailLabs;

class EmailLabsConfig{

    /**
     * @var bool If true show errors
     */
    private $devMode = false;

    /**
     * @var string App key from EmailLabs panel
     */
    private $appKey = '';

    /**
     * @var string App secret from EmailLabs panel
     */
    private $appSecret = '';

    /**
     * @var string Protocol of query
     */
    private $protocol = 'https';

    /**
     * @var string Url to api panel
     */
    private $defaultUrl = '://api.emaillabs.net.pl/api/';

    /**
     * @var string Version of client
     */
    private $cliVersion = '1.3';

    /**
     * This method returns app key
     *
     * @return string App key
     */
    public function getAppKey(){
        return $this->appKey;
    }

    /**
     * This method returns app secret
     *
     * @return string App secret
     */
    public function getAppSecret(){
        return $this->appSecret;
    }

    /**
     * This method returns url to web-service
     *
     * @return string Url to web-service
     */
    public function getAdress(){
        return $this->protocol.$this->defaultUrl;
    }

    /**
     * This method returns dev mode
     *
     * @return bool Mode of client
     */
    public function getMode(){
        return $this->devMode;
    }

    /**
     * This method returns client version
     *
     * @return string
     */
    public function getCliVersion(){
        return $this->cliVersion;
    }
}
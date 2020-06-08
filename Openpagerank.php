<?php

/** Open Page Rank API v1 - PHP Library
 *  ================================================================================
 *  PHP library to wrap the Open Page Rank v1 api in PHP.
 *  The class will submit and return a page rank for a single or list of url's.
 *  ================================================================================
 *  @package     Openpagerank-PHP
 *  @author      James Simpson <info@granulr.uk>
 *  @company     Granulr Ltd
 *  @copyright   Copyright (c) 2020 - present Granulr Ltd
 *  @license     http://mit-license.org
 *  @version     1.0
 *  @link        https://github.com/Granulr/Openpagerank/
 *  @website     https://www.granulr.uk/
 
 *  ================================================================================
 *  LICENSE: Permission is hereby granted, free of charge, to any person obtaining
 *  a copy of this software and associated documentation files (the "Software'),
 *  to deal in the Software without restriction, including without limitation the
 *  rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is furnished
 *  to do so, subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY
 *  WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 *  CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *  ================================================================================
 */

class Openpagerank {

    private $endpoint_url = "https://openpagerank.com/api/v1.0";
    private $apikey = null;

    /*
     * construct
     * prepares the object for execution
     *
     * @params $apikey string
     * @return object
     */

    function __construct($apikey)
    {
        $this->apikey = $apikey;
    }

    /*
     * getPageRank
     * Get pagerank metrics about one or more urls.
     *
     * @param $targets array
     * @return object
     */

    public function getPageRank($targets) {
        //get the url metrics for the domain
        $requestUrl = $this->endpoint_url . "/getPageRank";

        $targets = http_build_query(array( 'domains' => $targets ));

        return json_decode($this->file_post_contents($requestUrl,$targets));
    }

    /*
     * file_post_contents
     * Generates the authentication and triggers the URL GET request to the api.
     *
     * @params $url string
     * @params $data http_build_query
     * @return object
     */

    private function file_post_contents($url, $data) {

        $ch = curl_init();
        $url = $url .'?'. $data;
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('API-OPR: '. $this->apikey) );
        $context = curl_exec($ch);
        curl_close($ch);

        return $context;
    }

}

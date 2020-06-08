# Open Page Rank Api V1 - PHP Library

Openpagerank-PHP is an open source PHP library to get query data out of Open Page Rank API v1. 

The library is used to submit and recive a numerical page rank from an array of URL's.

This library is for anyone that is looking to build an SEO tool set for any purpose.

## Dependencies

This library was written on PHP 7.2 and was written using PHP-CURL.

## Installation

Download the zip file from the repository and add Openpagerank.php to your php applications path.

Retrieve an api key Open Page Rank. If you dont' have one you can signup for a free account here: https://www.domcop.com/openpagerank/

## Usage

### Table of Contents

* <a href='#configuration'>Brief Example of Use</a>
<hr>

### Brief Example of Use
```php
<?php
// This require_once will vary depending on your php applications specific directory structure
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Openpagerank' . DIRECTORY_SEPARATOR . 'Openpagerank.php';

//initialize the library
$opr = new Openpagerank(your_api_key);

//query some data
$result = $opr->getPageRank( array("https://granulr.uk/", "https://www.google.com") );

//dump the result 
var_dump($result);
```
More detailed examples can be found here <a href="https://www.domcop.com/openpagerank/documentation">Open Page Rank Api V1 Library for PHP</a>.

<hr>

## License

(c) 2020 - Present, Granulr Ltd info@granulr.uk   
License: MIT
URL: https://granulr.uk

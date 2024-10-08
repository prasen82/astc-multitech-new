
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cross {
    function access()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
        header('Content-Type: application/json');
    }

}

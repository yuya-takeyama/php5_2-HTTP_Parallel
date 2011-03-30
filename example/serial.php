<?php
require_once dirname(__FILE__) . '/urls.php';

global $URLS;

foreach ($URLS as $url) {
    var_dump(substr(file_get_contents($url), 0, 512));
}

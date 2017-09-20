<?php
/* This is the config for our database, for now we will have our database store
    the amount of page views, we will change this later obviously */
return array(
    'host' => '127.0.0.1', //'localhost:8889',//'localhost:8889',
    'username' => 'root',
    'password' => 'root', //remember this needs to be changed depending on server
    'database' => 'ofs',
    'table' => 'counter',
    'name' => 'page',
    'value' => 'views',
    'pages' => array('home', 'contact'), // Must match with individual controller line 18.
    'initial_value' => 0,
    'BASE_URL' => 'http://localhost'//'http://localhost:8888/index.php'
);

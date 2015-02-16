<?php

if(!file_exists(__DIR__.'/../vendor/autoload.php')){
    if(!file_exists(__DIR__.'/../../../autoload.php')){
        echo 'You must set up the project dependencies, run the following commands:'.PHP_EOL.
            'curl -sS https://getcomposer.org/installer | php'.PHP_EOL.
            'php composer.phar install'.PHP_EOL;
        exit(1);
    }
    else{
        $autoload = __DIR__.'/../../../autoload.php';
    }
}
else{
    $autoload = __DIR__.'/../vendor/autoload.php';
}

require_once($autoload);
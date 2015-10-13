<?php

$autoloader = require '/vendor/autoload.php';
require './generated-conf/config.php';

$user = new User();
$user->setFirstName('Steven');
$user->setLastName('Chin');
$user->setNetID('sachin');
$user->setEmail('steven.chin@stonybrook.edu');

$user->save();
<?php

ini_set('display_errors',1);

define('ROOT', __DIR__);

require_once ROOT.'/components/Router.php';
require_once ROOT.'/components/DB.php';
session_start();

$Router = new Router();
include ROOT.'/view/template.php';


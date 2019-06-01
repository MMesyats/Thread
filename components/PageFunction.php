<?php
include_once "Router.php";
include_once "DB.php";

define('ROOT', __DIR__."/..");
include ROOT."/model/User.php";

$Router = new Router();
if(session_status()==1){session_start();}

if(isset($_GET['URL']))
{
    echo $Router->run($_GET['URL']);
}
if(isset($_POST['name'])&&isset($_POST['password'])&&($_POST['email']))
{
    echo User::registration($_POST['name'],$_POST['password'],$_POST['email']);
}
elseif(isset($_POST['name'])&&isset($_POST['password']))
{
    echo User::login($_POST['name'],$_POST['password']);
}
if(isset($_GET['exit']))
{
    echo("close");
    session_destroy();
}
if(isset($_GET['getUserID']))
{
    echo $_SESSION['user_id'];
}
<?php

include_once ROOT."/model/User.php";


class UserController
{
    public function actionWrite()
    {
        ob_start();
        include ROOT.'/view/write.php';
        $html = ob_get_clean();
        return $html;
    }
    public function actionLogin()
    {

        ob_start();
        include ROOT.'/view/login.php';
        $html = ob_get_clean();
        return $html;
    }   
    public function actionRegistration()
    {
        ob_start();
        include ROOT.'/view/register.php';
        $html = ob_get_clean();
        return $html;
    }     

    public function actionProfile($id)
    {
        ob_start();
        $user = array();
        $user = User::getUserProfile($id);

        include ROOT.'/view/profile.php';
        $html = ob_get_clean();
        return $html;
    }
}
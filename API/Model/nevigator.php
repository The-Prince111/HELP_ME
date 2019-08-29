<?php
class nevigator
{
    public function nevigate($script)
    {
    //AURA DIRECTORY
        if($script == 'home')
        {
           require_once 'API/View/Common/aura.php';
        }
        else if($script == 'login')
        {
            require_once 'API/View/Common/login.php';
        }
         //CLIENT DIRECTORY
        else if($script == 'helpme')
        {
            require_once 'API/View/Client/helpme.php';
        }
        //EMPLOYEE DIRECTORY
        else if($script == 'panic')
        {
            require_once 'API/View/Employee/panic.php';
           // require_once 'API/View/test_panic.php';
        }
        //DEFAULT DIRECTORY becomes ERROR PAGE 404 (page not fount)
        else
        {
        require_once 'API/View/Common/error.php';
        }

    }
}
?>
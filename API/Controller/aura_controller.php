<?php
require_once 'API/Model/nevigator.php';
require_once 'API/Model/user.php';
require_once 'API/Model/helpme.php';
require_once 'API/Model/panic.php';

class aura_controller
{
    public function home() {
        nevigator::nevigate(home); 
    }
     public  function account()
    {
        //nevigator::nevigate('login');
        if(isset($_POST['btn_login']))
        {
            $username = $_POST["txt_email"];
            $password = $_POST["txt_password"];
        
        
       $user = user::get_user($username,$password);   // user object
        }
            
        if($user)
        {  
         $_SESSION['user_email'] =  $user->user_email;
         $_SESSION['user_password'] =  $user->user_password;
         $_SESSION['user_role'] = $user->user_role;
        // echo "Have a User " .$_SESSION['user_email'];  
        // echo "with Password " .$_SESSION['user_password'];  
         if($user->user_role == 'client')
         {
         nevigator::nevigate('helpme');
         }
         else if($user->user_role == 'employee')
         {
           // $panix = panic::get_panic();
           
            nevigator::nevigate('panic'); 
         }

        }
        else if (!$user)
        {
         nevigator::nevigate('login');
        }
        //Check for help me call from the button
        if(isset($_POST['btn_helpme']))
        {
            $user = $_SESSION['user_email'] ;
            $location = 'Joburg,Wynberg, Sandton,2000 ';
            $date = date('Y-m-d');
            $time =date('h:i:sa');
           // echo " Date and Time ".$date." | ".$time;
            helpme::panic($user,$location,$date,$time);
        }
        else if(isset($_POST['btn_accept']))
        {
            $user = $_SESSION['user_email'] ;
            $panId = $_POST['panid'];
            helpme::accept($user,$panId);
        }
    }
   /* public function helpme() {
        
        if(isset($_POST['btn_helpme']))
        {
            $user = $_SESSION['user_email'] ;
            $location = 'Joburg,Wynberg, Sandton,2000 ';
            
            helpme::panic($user,$location);
            
            nevigator::nevigate('panic');
        }
    } */
    public function error() {
        echo "Error Page 404";
    }
}

<?php
require_once 'API/Model/nevigator.php';
class client_controller
{
    //For now I'm going to use only the Login and the help me method
    public function home() {
        nevigator::nevigate(home); 
    }
    public function helpme() {
        nevigator::nevigate('helpme');
    }
    public function error() {
        echo "Error Page 404";
    }
}
?>

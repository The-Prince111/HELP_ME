<?php
function route($controller, $action) 
{
    require_once('/API/Controller/' . $controller . '_controller.php');
     
    switch ($controller) 
    {
        case 'aura':
            $controller = new aura_controller();
            break;
        case 'client':
            $controller = new client_controller();
            break;
        case 'employee':
            $controller = new employee_controller();
            break;
        case 'supervisor':
            $controller = new supervisor_controller();
            break;
        default : //default page becomes client login page
            $controller = new aura_controller();
            break;
    }
session_start();
    $controller->{ $action }();
}
// we're adding an entry for the new controller and its actions
$controllers = array('client'=>array('helpme'),'aura'=>array('home','account','about','contact','services'),'employee'=>array('home','profile','followup','panic'), 'owner' => array('home','profile','employee','summary'));
if (array_key_exists($controller, $controllers)) 
{
    if (in_array($action, $controllers[$controller])) 
    {
        route($controller, $action);
    } 
    else 
        {
        route('client', 'helpme');
        }
} 
else 
    {
    route('aura', 'account');
    }
?>



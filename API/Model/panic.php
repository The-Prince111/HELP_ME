<?php
class panic
{
    public $pan_id;
    public $user_name;
    public $user_vehicle;
    public $user_cell;
    public $user_location;
    

    public function __construct($pId,$pName,$pVeh,$pCell,$pLoc)
     {
        $this->pan_id = $pId;
        $this->user_name=$pName;
        $this->user_vehicle = $pVeh;
        $this->user_cell = $pCell;
        $this->user_location = $pLoc;
        
     }
     public static function get_panic()
     {
        $list = array();
         $db = aura_db_conn::getInstance();
         $sql_panic = "CALL get_panic()";
         
         $sqlExec = $db->query($sql_panic);
        //echo "Query ".$sql_panic;
         foreach ($sqlExec->fetchAll() as $panics)
         {
             $list[] = new panic($panics['pan_id'],$panics['user_name'],$panics['user_vehicle'],$panics['user_cell'],$panics['user_location']);  // Return the info. of the user that panics from the DB
             $i++;
         }
         return $list[0];
     }
}
?>
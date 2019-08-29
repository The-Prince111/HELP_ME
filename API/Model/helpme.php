<?php
class helpme
{
    public $pan_id;
    public $pan_email;
    public $pan_location;
    public $pan_date;
    public $pan_time;
    

    public function __construct($pId,$pEmail,$pLoc,$pDate,$pTime)
     {
        $this->pan_id = $pId;
        $this->pan_email =$pEmail;
        $this->pan_location = $pLoc;
        $this->pan_date = $pDate;
        $this->pan_time = $pTime;
        
     }
    
     
     public static function panic($pEmail, $pLoc,$pDate,$pTime)
     {
        $sql_panic = "CALL panic('$pEmail','$pLoc','$pDate','$pTime')";
        $db = aura_db_conn::getInstance();
        $db->query($sql_panic);
     }
      public static function accept($pEmail,$pPanid)
     {
        $sql_panic = "CALL accept('$pEmail','$pPanid')";
        $db = aura_db_conn::getInstance();
        $db->query($sql_panic);
     }
     
}
?>

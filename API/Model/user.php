<?php
class user
{
    public $user_userId;
    public $user_fullname;
    public $user_surname;
    public $user_cell;
    public $user_email;
    public $user_password;
    public $user_idNo;
    public $user_role;
    

    public function __construct($uId,$uFname,$uSname,$uCell,$uEmail,$uPwd,$uIdNo,$uRole)
     {
        $this->user_userId = $uId;
        $this->user_fullname =$uFname;
        $this->user_surname = $uSname;
        $this->user_cell = $uCell;
        $this->user_email = $uEmail;
        $this->user_password = $uPwd;
        $this->user_idNo = $uIdNo;
        $this->user_role = $uRole;
        
     }
    
     
     public static function get_user($pUsername, $pPassword)
     {
         $list = array();
         $db = aura_db_conn::getInstance();
         //$sql = "SELECT * FROM tbl_user WHERE user_email = '$pUsername' AND user_password = '$pPassword' LIMIT 1";
         $sql = "SELECT *
                FROM (SELECT * FROM tbl_user
                UNION
                SELECT * FROM tbl_employee) as us
                WHERE us.user_email= '$pUsername'
                AND  us.user_password = '$pPassword'
                LIMIT 1 ";
         $sqlExec = $db->query($sql);
       
           $i = 0;
         foreach ($sqlExec->fetchAll() as $user)
         {
             $list[] = new user($user['user_id'],$user['user_fullname'],$user['user_surname'],$user['user_cell'],$user['user_email'],$user['user_password'],$user['user_idNo'],$user['user_role']);  // Return the user from the DB
             $i++;
         }
         if($i>0)
         {
             return $list[0];
         }
            else 
                {    
                return false;
                }   
     }
}
?>

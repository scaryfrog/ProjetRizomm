<?php
  class Administrateurs 
  {
    private $user_id;
    private $user_name;
    private $user_email;
    private $user_pass;

    public function getUser_id()
    {
    return $this->user_id;
    }    

    public function getUser_name()
    {
    return $this->user_name;
    } 

    public function getUser_email()
    {
    return $this->user_email;
    }   

    public function getUser_pass()
    {
    return $this->user_pass;
    }  

    // les settes                 

    public function setUser_id($user_id)
    {
    $this->user_id=$user_id;
    }

    public function setUser_name($user_name)
    {
    $this->user_name=$user_name;
    }   
  
    public function setUser_email($user_email)
    {
    $this->user_email=$user_email;
    }   

    public function setUser_pass($user_pass)
    {
    $this->user_pass=$user_pass;
    } 


  public static function login($mail, $pw)
    {
        $db=DB::getInstance();
        $req=$db->query('SELECT * FROM administrateurs WHERE user_email="'.$mail.'" AND user_pass="'.$pw.'"');
        return $req; 
    }  

public static  function FindByEmail($email) 
    {
       $db=Db::getInstance();
       $email=strtolower($email);
       $req= $db->prepare('SELECT * FROM administrateurs WHERE user_email=:email');
       $req->execute(array('email' =>$email));
       return $req;
    }

public   function generermotPass($mail,$password) 
{
         $db = Db::getInstance();
          $req = $db->query("UPDATE  administrateurs SET  user_pass='".$password."' WHERE user_email='".$user_email."' "); 
}    

  }


?>
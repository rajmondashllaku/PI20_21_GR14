<?php
class User {
    private $id;
    private $emri;
    private $mbiemri;
    private $email;
    private $password;
    private $manager;
    function __construct($emri,$mbiemri,$email,$password,$manager)
    {
        $this->id++;
        $this->emri=$emri;
        $this->mbiemri=$mbiemri;
        $this->email=$email;
        $this->password=$password;
        $this->manager=$manager;
        
    }
    public function getUid()
    {
        return $this->id;
    }
    public function getEmri()
    {
        return $this->emri;
    }
    public function getMbiemri()
    {
        return $this->mbiemri;
    }
    public function getManager()
    {
        return $this->manager;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setEmri($emri)
    {
        $this->emri=$emri;

    }
    public function setMbiemri($mbiemri)
    {
        $this->mbiemri=$mbiemri;

    }
    public function setEmail($email)
    {
        $this->email=$email;

    }
    public function setPassword($password)
    {
        $this->password=$password;

    }

}

//funksionet ndihmese per databaze

function insertUser($db,$user)
{
    $salt=generateRandomString();
    $password=sha1('{user->getPassword()}'.$salt);
    $sql="INSERT INTO user(emri,mbiemri,email,salt,isManager,password) VALUES(%s,%s,%s,%s,%s,%s)";
    echo $sql;
   if($db->executeData($sql,$user->getEmri(),$user->getMbiemri(),$user->getEmail(),$salt,$user->getManager(),$password))
      return true; 
    return false;
}
function updateUser($db,$user,$kolona)
{
    $sql="";
    switch($kolona)
      {
          case 'emri':
                $sql="UPDATE user SET emri='{$user->getEmri()}' WHERE id={$user->getUid()}";
               $db->executeData($sql);
               break;
          case 'mbiemri':
      $sql="UPDATE user SET mbiemri='{$user->getMbiemri()}' WHERE id={$user->getUid()}";
               $db->executeData($sql);
               break;
          case 'email':
      $sql="UPDATE user SET email='{$user->getEmail()}' WHERE id={$user->getUid()}";
               $db->executeData($sql);
               break;
          case 'password':
      $sql="UPDATE user SET password='{$user->getPassword()}' WHERE id={$user->getUid()}";
               $db->executeData($sql);
               break;
        }
}

function deleteUser($db,$user)
{
$sql="DELETE FROM  user WHERE id={$user->getUid()}";

    $result=$db->executeData($sql);   
    return $result;
}
function selectUser($db,$user)
{

$sql="SELECT * FROM user WHERE id={$user->getUid()}";
    $arrayUser=$db->getData($sql);
    return $arrayUser;
}

function generateRandomString($length = 10) {
    if($length<=0){
        throw new Exception("Keni kerkuar te krijohet string me me pak se 1 karakter");
    }
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
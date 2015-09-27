<?php
class Database_Info extends CI_Model {


	// function __construct(){
	// 	this->models->load()
	// }

	public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

    public function ulogin($email,$password)
	{
		$query = $this->db->query("
            SELECT userId 
            FROM users 
            WHERE email = ".$this->db->escape($email)." and password = ".$this->db->escape(md5($password)).";
        ");

        return $query->result();
	}

    public function vlogin($email,$vpassword)
	{
		$query = $this->db->query("
            SELECT userId 
            FROM users 
            WHERE email = ".$this->db->escape($email)." and viewPassword = ".$this->db->escape(md5($vpassword)).";
        ");

        return $query->result();
	}

	public function profile($uid)
	{
		$query = $this->db->query("
            SELECT * 
            FROM users 
            LEFT JOIN listItem on listItem.userId = users.userId
            WHERE users.userId = ".$this->db->escape($uid).";
        ");

        return $query->result();
	}

	public function item($iid)
    {
        $query = $this->db->query("
            SELECT * 
            FROM listItem 
            WHERE itemId = ".$this->db->escape($iid).";
        ");

        return $query->result();
    }

    public function user_item($uid)
    {
        $query = $this->db->query("
            SELECT * 
            FROM listItem 
            WHERE userId = ".$this->db->escape($uid).";
        ");

        return $query->result();
    }

	public function new_user($email,$password,$vpassword,$fname,$lname,$address,$city,$state,$zip)
	{
		$searchQuery = $this->db->query("
            INSERT into users (email,password,viewPassword,firstName,lastName,address,city,state,zip)
            VALUES(".$this->db->escape($email).",".$this->db->escape(md5($password)).",".$this->db->escape(md5($vpassword)).",".$this->db->escape($fname).",".$this->db->escape($lname).",
            	".$this->db->escape($address).",".$this->db->escape($city).",".$this->db->escape($state).",".$this->db->escape($zip).");
        ");
	}

	public function new_item($url,$iname,$iprice,$uid)
	{
		$searchQuery = $this->db->query("
            INSERT into listItem (url,itemName,itemPrice,userId)
            VALUES(".$this->db->escape($url).",".$this->db->escape($iname).",".$this->db->escape($iprice).",".$this->db->escape($uid).");
        ");
	}

	public function edit($iid,$iname,$iprice)
	{
		$searchQuery = $this->db->query("
            UPDATE listItem
            SET itemName = ".$this->db->escape($iname).", itemPrice = ".$this->db->escape($iprice)."
            WHERE itemId = ".$this->db->escape($iid).";
        ");
	}

	public function delete($iid)
	{
		$searchQuery = $this->db->query("
            DELETE from listItem
            WHERE itemId = ".$this->db->escape($iid).";
        ");
	}
	
}

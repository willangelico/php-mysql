<?php

/**
* 
*/
class ServiceUser
{
	
	private $db;
	private $user;
	private $table;

	function __construct(Mysqli $mysqli,User $user)
	{
		$this->db = $mysqli;
		$this->user = $user;
		$this->table = $this->user->getTable();
	}

    public function find($id){
        $stmt = $this->db->stmt_init();
        $stmt->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$name,$email);
        $stmt->fetch();
        return array("id"=>$id,"name"=>$name,"email"=>$email);
    }

	public function listUser($order = null){
        $order = $order ? $order : "id ASC";
        $sql = "SELECT * FROM {$this->table} ORDER BY {$order}";
        $query = $this->db->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);

	}

	public function insert(){
        $stmt = $this->db->stmt_init();
        $stmt->prepare("INSERT INTO {$this->table} (name, email) VALUES (?,?)");
        $stmt->bind_param("ss", $this->user->getName(), $this->user->getEmail());
        $stmt->execute();        
        return $stmt->insert_id;		
	}

	public function update(){
		$stmt = $this->db->stmt_init();
        $stmt->prepare("UPDATE {$this->table} SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $this->user->getName(), $this->user->getEmail(), $this->user->getId());
        return $stmt->execute();                
	}

	public function delete($id){
	   $stmt = $this->db->stmt_init();
       $stmt->prepare("DELETE FROM {$this->table} WHERE id = ?");
       $stmt->bind_param("i",$id);
       return $stmt->execute();  
	}
}
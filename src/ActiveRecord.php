<?php 

class ActiveRecord
{
    
    private $db;  
    private $keys; 
    private $table; 
    public function __construct()
    {
        $this->db = new Database(); 
    }

    public function select($tabele, $filter = '')
    {
        $query = "SELECT * FROM ".$tabele." ". $filter;
        $this->db->query($query); 
        return $this->db->resultSet();
    }

    public function select_one($tabele, $filter) 
    {
        $query = "SELECT * FROM ".$tabele." ". $filter;
        $this->db->query($query); 
        return $this->db->single(); 
    } 

    public function update($table_name, $data, $column = "")
    { 
        $set = []; 
        if(is_array($data)) {
            foreach($data as $key =>  $value) {
                $k = $key." = :".$key; 
                array_push($set,$k); 
            }
        }
        $set = implode(", ",$set); 
        $query = "UPDATE ".$table_name. " SET ".$set." WHERE ".$column;
        $this->db->query($query);  
        foreach($data as $key => $value) {
            $bind = ":".$key; 
            $this->db->bind($bind, $value); 
        } 
        if($this->db->execute())
      {
         return true; 
      } else {
         return false; 
      }  
    }

    public function insert($table_name, $data)
    {    
        $this->sort($data); 
        $query = "INSERT INTO ".$table_name."(".$this->table.") VALUES (" .$this->keys. ")"; 
        $this->db->query($query); 
        foreach($data as $key => $value) {
            $keys = ":".$key;
            $this->db->bind($keys,$value); 
        }
        if($this->db->execute()) {
            return true; 
        } else {
            return false;
        }
    }

    public function delete($table_name, $column)
    {
        $query = "DELETE FROM " .$table_name. " WHERE " .$column;
        $this->db->query($query); 
        $this->db->execute(); 
    }

    private function sort($data)
    {
        if(is_array($data)) {
            $keys = [];
            $tables = [];  
            foreach($data as $key => $value) {
                $k = ":".$key;
                array_push($keys, $k);
                array_push($tables,$key); 
            }
            $this->keys = implode(", ", $keys); 
            $this->table = implode(", ", $tables); 
        }
        return; 
    }
}
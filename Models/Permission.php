<?php

class Permission{
    protected $id;
    protected $name;

    public function __construct($id = NULL, $name = NULL)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getPermissions(){
        $mysqli = new mysqli("localhost","root","","faturas");
        if(!$mysqli->connect_error){
            $sql = "SELECT * FROM permissions";
            $result = $mysqli->query($sql);

            if($result->num_rows > 0){
                $permissions = array();
                while($row = $result->fetch_assoc()) {
                    $permission = new Permission($row["id"], $row["name"]);
                    array_push($permissions, $permission);
                }
                return $permissions;
            }
            else{
                return "No permissions found";
            }
        }
    }

    public function getPermissionByName($name){
        
    }
}
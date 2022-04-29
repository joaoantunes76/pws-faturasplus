<?php

class Permission{
    protected ?int $id;
    protected ?string $name;

    public function __construct(int $id = NULL, string $name = NULL)
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
                    $permissions[] = $permission;
                }
                return $permissions;
            }
            else{
                return "No permissions found";
            }
        }
    }

    public function getPermissionByName($name){
        $mysqli = new mysqli("localhost","root","","faturas");
        if(!$mysqli->connect_error){
            $sql = "SELECT * FROM permissions WHERE name LIKE '$name'";
            $result = $mysqli->query($sql);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return new Permission($row["id"], $row["name"]);
            }
            else{
                return "No permissions found";
            }
        }
    }
}
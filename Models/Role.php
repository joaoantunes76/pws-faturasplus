<?php

class Role{
    protected $id;
    protected $name;
    protected $permissions = array();

    public function __construct($id = NULL, $name = NULL)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getRoles(){
        $mysqli = new mysqli("localhost","root","","faturas");
        if(!$mysqli->connect_error){
            $sql = "SELECT * FROM roles";
            $result = $mysqli->query($sql);

            if($result->num_rows > 0){
                $roles = array();
                while($row = $result->fetch_assoc()) {
                    $role = new Role($row["id"], $row["name"]);
                    //TODO: (BERNARDO)
                    //Fazer uma query para buscar as permissions juntamente com as roles e adicionar ao array $permissions
                    array_push($roles, $role);
                }
                return $roles;
            }
            else{
                return "No roles found";
            }
        }
    }

    public function getRoleById($id){
        $mysqli = new mysqli("localhost","root","","faturas");
        if(!$mysqli->connect_error){
            $sql = "SELECT * FROM roles WHERE id = $id";
            $result = $mysqli->query($sql);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return new Role($row["id"], $row["name"]);
            }
            else{
                return "No roles found";
            }
        }
    }

    public function checkPermission($permission){
        foreach($this->permissions as $rolePermission){
            if($rolePermission == $permission){
                return true;
            }
        }
        return false;
    }
}
<?php

class Role{
    protected ?int $id;
    protected ?string $name;
    public ?array $permissions = array();

    public function __construct(int $id = NULL, string $name = NULL, array $permissions = NULL)
    {
        $this->id = $id;
        $this->name = $name;
        $this->permissions = $permissions;
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
                    $sqlRolesPermissions = "SELECT * FROM rolespermissions INNER JOIN permissions ON permissionId = id WHERE roleId = ".$row["id"];
                    $rolesPermissions = $mysqli->query($sqlRolesPermissions);
                    while($permissions = $rolesPermissions->fetch_assoc()) {
                        $permission = new Permission($permissions["permissionId"], $permissions["name"]);

                        $role->permissions[] = $permission;
                    }
                    $roles[] = $role;

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
                $role = new Role($row["id"], $row["name"]);
                $sqlRolesPermissions = "SELECT * FROM rolespermissions INNER JOIN permissions ON permissionId = id WHERE roleId = ".$row["id"];
                $rolesPermissions = $mysqli->query($sqlRolesPermissions);
                while($permissions = $rolesPermissions->fetch_assoc()) {
                    $permission = new Permission($permissions["permissionId"], $permissions["name"]);

                    $role->permissions[] = $permission;
                }
                return $role;
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
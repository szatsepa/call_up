<?php

/*
 * created by arcady.1254@gmail.com 9.11.2011
 */

class User{
    
    var $id;
    var $surname;
    var $name;
    var $patronymic;
    var $phone;
    var $email;
    var $status;
    var $role;
    
    function User($id){
        
        $query = "SELECT surname, name, patronymic, phone, email, role, status FROM users WHERE id = $id";
        
        $result = mysql_query($query) or die ($query);
        
        $row = mysql_fetch_assoc($result);
        
        $this->id = $id;
        
        $this->surname = $row[surname];
        
        $this->name = $row[name];
        
        $this->patronymic = $row[patronymic];
        
        $this->phone = $row[phone];
        
        $this->email = $row[email];
        
        $this->status = $row[status];
        
        $this->role = $row[role];
    }
    
//    function setUser($id){  
//        
//        
//    }

}

?>

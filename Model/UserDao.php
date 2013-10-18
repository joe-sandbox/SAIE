<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDao
 *
 * @author Joe
 */
class UserDao extends A_Dao implements  I_UserController{
    
    function __construct($database) {
        $this->database = (isset($database))? $database : FactoryDB::buildObject();
    }
    public function insertList($values) {
           $sql="SELECT * FROM users WHERE user_id = ?";
        $query = "INSERT INTO users (name,mail,description,password) VALUES (".$object->getName().",".$object->getMail().",".$object->getDescription().",".$object->getPassword().")";
        echo $query;
        /* Prepare statement */
        if(is_a($object,"User")){
            $db = $this->database;
            $stmnt = $db->prepareStatement($sql);
            if($stmnt === false) {
              trigger_error('Wrong SQL: ' . $stmnt . ' Error: ' . $this->database->error, E_USER_ERROR);
            }else{
                /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
                //var_dump($stmt->bind_param('ssss',$object->getName(),$object->getMail(),$object->getDescription(),$object->getPassword()));
                $num = 1;
                $stmnt->bind_param("i", $num);
                /* Execute statement */
                $stmnt->execute();    
                $values = $stmnt->get_result();
                $row = $values->fetch_array(MYSQLI_NUM);
                var_dump($row);
                $stmnt->close();
            }     
        }
    }
    public function insertRow($object) {
        $sql="INSERT INTO users(name,mail,description,password,date_registration) 
                VALUES (?,?,?,?,?)";
        /* Prepare statement */
        if(is_a($object,"User")){
            $db = $this->database;
            $stmnt = $db->prepareStatement($sql);
            if($stmnt != false) {
                /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
                $name = $object->getName();
                $mail = $object->getMail();
                $description = $object->getDescription();
                $password = $object->getPassword();
                $date = $this->database->getDate();
                $stmnt->bind_param('sssss',$name,$mail,$description,$password,$date); 
                /* Execute statement */
                $stmnt->execute();    
                if($stmnt->close()){
                    return true;
                }else{
                    return false;
                }
            }            
        }
        //header('Content-type:text/html');
        /*echo $stmt->param_count;*/
    }

    public function removeRowById($object) {
        $sql='DELETE FROM users WHERE id = ?';
        /* Prepare statement */
        $stmnt = $this->database->prepare($sql);
        if($stmt === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        }
        /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
        $stmt->bind_param('i',$object->getId());
        /* Execute statement */
        $stmt->execute();      
        $stmt->close();
        
    }

    public function updateRow($object) {        
        $sql='UPDATE users SET name = ? ,mail = ? , description = ?, password = ?) WHERE id = ?';
        /* Prepare statement */
        $stmnt = $this->database->prepareStatement($sql);
        if($stmt === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        }
        /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
        $stmt->bind_param('ssssi',$object->getName(),$object->getMail(),$object->getDescription(),$object->getPassword(),$object->getId());
        /* Execute statement */
        $stmt->execute();      
        $stmt->close();
    }  

    public function getUserById($id) {     
        $sql='SELECT * FROM users  WHERE id = ?';
        /* Prepare statement */
        $stmnt = $this->database->prepareStatement($sql);
        if($stmt === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        }
        /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
        $stmt->bind_param('i',$id);
        /* Execute statement */
        $stmt->execute();      
        $stmt->bind_result($lastname, $email);
        $result = array();
        $j = 0;
        while ($stmt->fetch()) {
          $result[j] = new User($id,$name,$mail,$description,$password);
        }
        $stmt->close();
        return $result;
    }

    public function getUserByName($name) {    
        $sql='SELECT * FROM users  WHERE name = "?"';
        /* Prepare statement */
        $stmnt = $this->database->prepareStatement($sql);
        if($stmt === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        }
        /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
        $stmt->bind_param('i',$name);
        /* Execute statement */
        $stmt->execute();      
        $stmt->bind_result($lastname, $email);
        $result = array();
        $j = 0;
        while ($stmt->fetch()) {
          $result[j] = new User($id,$name,$mail,$description,$password);
        }
        $stmt->close();
        return $result;        
    }

    public function getUsers() {
        $sql='SELECT * FROM users ';
        /* Prepare statement */
        $stmnt = $this->database->prepareStatement($sql);
        if($stmt === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        }
        /* Execute statement */
        $stmt->execute();      
        $stmt->bind_result($lastname, $email);
        $result = array();
        $j = 0;
        while ($stmt->fetch()) {
          $result[j] = new User($id,$name,$mail,$description,$password);
          $j++;
        }
        $stmt->close();
        return $result;        
    }

    public function getUsersByDate($date, $op) {
        switch ($op){
            case -1:
                $sql='SELECT * FROM users WHERE date_registration < "?"';
                break;
            case 1:
                $sql='SELECT * FROM users WHERE date_registration > "?"';
                break;
            default:
                $sql='SELECT * FROM users WHERE date_registration = "?"';
        }
        /* Prepare statement */
        $stmnt = $this->database->prepareStatement($sql);
        if($stmt === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        }
        /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
        $stmt->bind_param('i',$date);
        /* Execute statement */
        $stmt->execute();      
        $stmt->bind_result($lastname, $email);
        $result = array();
        $j = 0;
        while ($stmt->fetch()) {
          $result[j] = new User($id,$name,$mail,$description,$password);
        }
        $stmt->close();
        return $result;
    }

}

?>

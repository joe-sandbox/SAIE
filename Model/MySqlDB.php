<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MySqlDB
 *
 * @author Joe
 */
class MySqlDB extends mysqli implements I_DataBase{
    private $date;
    const HOST = "localhost";
    const PASSWORD = "passroot";
    const USER = "root";
    const DATA_BASE = "saie";
    //const HOST = "sql.byethost38.org";
    //const PASSWORD = "Colegio@leman1979";
    //const USER = "salawgdl_2013";
    //const DATA_BASE = "salawgdl_2013";
    const charset = "utf8_general_ci";
    
    private function queryDate(){
        $query = "SELECT DATE_FORMAT((DATE_SUB(NOW(), INTERVAL 1 HOUR)),'%y-%m-%d %T') AS NOW";
        $result = $this->query($query);
        $row = mysqli_fetch_array($result);
        $this->date = $row['NOW'];
    }
    public function commitStmnt() {
        return parent::commit();
    }

    public function connectDB() {
        parent(self::HOST, self::USER, self::PASSWORD, self::DATA_BASE);
        if ($this->connect_errno) {
            echo "Fallo al contenctar a MySQL: " . $this->connect_error;
        }
        $this->queryDate();
    }

    public function disconnectDB() {
        return $this->close();
    }

    public function executeStmnt() {
        return parent::execute();
    }

    public function getDate() {
        return $this->date;
    }    

    public function rollBackTransactions() {
        return parent::rollBack();
    }   
    

    public function prepareStatement($statement) {
        $var = $this->prepare($statement);
        if($var === false) {
          trigger_error('Wrong SQL: ' . $statement . ' Error: ' . $this->error, E_USER_ERROR);
        }
        return $var;
    }    

    function __construct() {
        parent::__construct(self::HOST, self::USER, self::PASSWORD,self::DATA_BASE);
        parent::set_charset("utf-8");
        $this->query("SET CHARACTER_SET_CLIENT='utf8'");
        $this->query("SET CHARACTER_SET_RESULTS='utf8'");
        $this->query("SET CHARACTER_SET_CONNECTION='utf8'");
        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        $this->queryDate();
    }
}

?>

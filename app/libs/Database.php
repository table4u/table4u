<?php
/*
* PDO DB Classes
*Connect to db
* prepared statements
* Bind values
* return rows and results
*/

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $pw = '';
    private $dbname = 'table4u';

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        //DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //create pdo instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pw, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    //execute the prepared statement
    public function execute()
    {
        return $this->stmt->execute();
    }

    //get result set as array of objects
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //single record as an object
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //getting row count
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}
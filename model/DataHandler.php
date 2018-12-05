<?php
/**
 * The DataHandler used in the model
 * 
 * @category   Model
 * @author     Leon in 't Veld <leon3110l@gmail.com>
 */
class DataHandler {
    /**
     * 
     * a pdo instance
     * 
     * @var pdo
     * @access public
     */
    public $pdo;

    /**
     * last select made by the datahandler
     *
     * @var array
     * @access public
     */
    public $lastSelect = [];

    /**
     * the host used for the connection
     *
     * @var string
     * @access public
     */
    public $host;
    /**
     * the database used for the connection
     *
     * @var string
     * @access public
     */
    public $database;
    /**
     * the username used for the connection
     *
     * @var string
     * @access public
     */
    public $username;
    /**
     * the password used for the connection
     *
     * @var string
     * @access public
     */
    public $password;
    /**
     * the database type used for the connection
     *
     * @var string
     * @access public
     */
    public $dbtype;

    /**
     * constructor for the datahandler
     *
     * @param string $host database host
     * @param string $database database name
     * @param string $username database username
     * @param string $password database password
     * @param string (optional) $dbtype database type
     */
    public function __construct(string $host, string $database, string $username, string $password, string $dbtype = "mysql") {
        try {
            $this->pdo = new PDO("$dbtype:host=$host;dbname=$database;charset=utf8mb4", $username, $password, [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch(PDOexeption $e) {
            $this->showError("Error: " . $e->getMessage());
        }

        $this->host = $host;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
        $this->dbtype = $dbtype;
    }

    /**
     * used to insert data in the database
     *
     * @param string $sql the sql query
     * @param array (optional) $bindings the bindings used in the query
     * @return int last insert id
     */
    public function createData(string $sql, array $bindings = []) {
        $sth = $this->pdo->prepare($sql);
        $sth->execute($bindings);
        return $this->pdo->lastInsertId();
    }
    
    /**
     * reads data from a database
     *
     * @param string $sql the sql query
     * @param array (optional) $bindings the bindings for the query
     * @param boolean (optional) $multiple if you want multiple rows or not
     * @param integer (optional) $pagination the pagination amount, 5 rows, 10 rows etc.
     * @return array the data from the database
     */
    public function readData(string $sql, array $bindings = [], bool $multiple = true, int $pagination = 0) {

        $sql = $sql
                . ($pagination ? " LIMIT $pagination OFFSET " . (intval(($_REQUEST["page"] ?? 0)) * $pagination ?? 0) : "");

        $sth = $this->pdo->prepare($sql);
        $sth->execute($bindings);

        $this->lastSelect = compact("bindings", "sql");

        if($multiple) {
            return $sth->fetchAll();
        } else {
            return $sth->fetch();
        }
        
    }

    /**
     * updates data in the database
     *
     * @param string $sql the sql query
     * @param array $bindings (optional) the bindings for the query
     * @return int last insert id
     */
    public function updateData(string $sql, array $bindings = []) {
        $sth = $this->pdo->prepare($sql);
        $sth->execute($bindings);
        return $this->pdo->lastInsertId();        
    }

    /**
     * deletes data in the database
     *
     * @param string $sql the sql query
     * @param array $bindings (optional) the bindings for the query
     * @return bool if the query completed or not
     */
    public function deleteData(string $sql, array $bindings = []) {
        $sth = $this->pdo->prepare($sql);
        return $sth->execute($bindings);
    }

    /**
     * exports data to CSV
     *
     * @param array $data the data you want to export, must be 2d array
     * @return string $csv csv formatted data
     */
    public function exportToCSV(array $data) {

        function addQuotes($val) {
            return "\"$val\"";
        }

        $csv = "";
        foreach ($data as $value) {
            $csv .= implode(", ", array_map("addQuotes", array_keys($value))) . "\r\n";
            break;
        }

        foreach ($data as $value) {
            $csv .= implode(", ", array_map("addQuotes", array_values($value))) . "\r\n";
        }

        echo $csv;
    }

    /**
     * get the amount of pages from a query
     *
     * @param integer $pagination the amount of rows per page
     * @return int $pages the amount of paginated pages
     */
    public function pagination(int $pagination) {

        $sql = preg_replace("/LIMIT [0-9]+ OFFSET [0-9]+/", "", $this->lastSelect["sql"]);
        $sql = "SELECT COUNT(*) AS count FROM (" . $sql . ") AS countTable";
                
        $count =  $this->readData(
            $sql,
            $this->lastSelect["bindings"],
            false
        )["count"];

        return ceil($count / $pagination);

    }

    /**
     * shows an error
     *
     * @param string $error the error you want to have displayed
     * @return void
     */
    public function showError(string $error) {
        echo $error;
    }

}

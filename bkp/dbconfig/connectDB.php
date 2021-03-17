<?php
error_reporting(0);
@ini_set('display_errors', 0);
include '../models/CommonFunction.php';
//date_default_timezone_set('America/Los Angeles');

class ConnectDB extends CommonFunction {
    
    /**
     *
     * @var String HostName
     */
    private $host = 'localhost';

    /**
     *
     * @var int database Port
     */
    private $port = '3306';

    /**
     *
     * @var String Database Name
     */
//    private $dbname = "test";
    private $dbname = "uboaffiliateweb";

    /**
     *
     * @var String Username
     */
    private $username = "root";

    /**
     *
     * @var String Password
     */
    private $password = "";

    /**
     *
     * @var String MySQL Charset
     */
    private $charset = "utf8";

    /**
     *
     * @var PDO
     */
    protected $con = false;

    public function getHost() {
        return $this->host;
    }

    public function getPort() {
        return $this->port;
    }

    public function getDbname() {
        return $this->dbname;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getCharset() {
        return $this->charset;
    }

    public function getCon() {
        return $this->con;
    }

    public function setHost(String $host) {
        $this->host = $host;
    }

    public function setPort($port) {
        $this->port = $port;
    }

    public function setDbname(String $dbname) {
        $this->dbname = $dbname;
    }

    public function setUsername(String $username) {
        $this->username = $username;
    }

    public function setPassword(String $password) {
        $this->password = $password;
    }

    public function setCharset(String $charset) {
        $this->charset = $charset;
    }

    public function setCon(PDO $con) {
        $this->con = $con;
    }

    public function __construct() {
        $this->getConnect();
    }

    public function getConnect() {
        $dsn = "mysql:host=" . $this->getHost() . ";dbname=" . $this->getDbname() . ";port=" . $this->getPort() . ";charset=" . $this->getCharset();
        try {
            if (!$this->getCon()) {
                $this->setCon(new PDO($dsn, $this->getUsername(), $this->getPassword()));
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    

}

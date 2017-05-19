
<?php
//db.php
class Banco {
    private $banco;
    private $host;
    private $username;
    private $password;
    public $db;
    public function __construct() {
        $this->banco = 'fazenda';
        $this->host = 'localhost';//localhost
        $this->username = 'postgres';
        $this->password = '123456';

    }
    public function connect(){
        $this->db = new PDO('pgsql:dbname='.$this->banco. ';host='.$this->host, $this->username, $this->password );
    }
    public function setBanco($banco){
        $this->banco = $banco;
    }
    public function setHost($host){
        $this->host = $host;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getBanco(){
        return $this->banco;
    }
    public function getHost(){
        return $this->host;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
}
?>

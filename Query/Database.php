<?php

namespace Query;
class Database
{
    private $connection;

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param mixed $connection
     */
    public function setConnection($connection): void
    {
        $this->connection = $connection;
    }
    /**
     * Содединение с базой данных
     * @param string $host Адрес хоста
     * @param string $username Имя пользователя БД
     * @param string $password Пароль
     * @param string $dbname Имя БД
     * @param string $port Адрес порта
    */
    public function __construct($host,$username,$password,$dbname,$port) {
        $this->setConnection(new \mysqli($host,$username,$password,$dbname,$port));
    }
    public function add($name,$surname,$lastname):void{
        $req=$this->getConnection();
        $qu=sprintf("INSERT INTO users (name,surname,lastname) VALUES ('%s','%s','%s')",$name,$surname,$lastname);
        $req->query($qu);

    }
    public function raw(){
        $req=$this->getConnection()->query("SELECT * FROM users");
        return json_encode(mysqli_fetch_assoc($req));
    }

}
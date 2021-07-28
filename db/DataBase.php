<?php
namespace Db;
Class DataBase{

    public $db_cfg;
    private $host, $user, $pass, $database, $charset, $driver;

    //Propiedades

    protected $rows = array();
    public $mensaje = "Hecho";


    function __construct()
    {
        //
    }

    //Conectar a la base de datos
    public function open_connection()
    {

        $con=new \mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']) or die(mysqli_connect_error());

        if ($con->connect_errno) {
            die('Connect Error: '. $con->connect_errno.'-> '.$con->connect_error);
        }

        $con->query("SET NAMES 'utf8'");
        $con->query("SET SESSION sql_mode = ''");
        $con->query("SET GLOBAL sql_mode = ''");

        return $con;
    }

    //Desconectar la base de datos
    private function close_connection()
    {
        $this->conn->close();
    }


    //Ejecutar una query simple (INSERT, DELETE, UPDATE)
    protected function execute_single_query()
    {
        if($_POST){
            $this->open_connection();
            $this->conn->query($this->query);
            $this->close_connection();
        }else{
            $this->mensaje = "Metodo no permitido";
        }
    }

    //Traer resultados de una consulta en un array
    protected function get_result_from_query()
    {
        $this->open_connection();
        $result = $this->conn->query($this->query);
        while ($this->rows[] = $result->fetch_assoc());
        $result->close();
        $this->close_connection();
        array_pop($this->rows);
    }
}
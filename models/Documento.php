<?php


namespace Models;
use \Db\EntidadBase;

class Documento extends EntidadBase
{
    public $doc_id;
    public $doc_nombre;
    public $doc_codigo;
    public $doc_contenido;
    public $doc_id_tipo;
    public $doc_id_proceso;

    public function __construct()
    {
        $table = "doc_documento";
        parent::__construct($table);
    }

    /**
     * @return mixed
     */
    public function getDocId()
    {
        return $this->doc_id;
    }

    /**
     * @param mixed $doc_id
     */
    public function setDocId($doc_id): void
    {
        $this->doc_id = $doc_id;
    }

    /**
     * @return mixed
     */
    public function getDocNombre()
    {
        return $this->doc_nombre;
    }

    /**
     * @param mixed $doc_nombre
     */
    public function setDocNombre($doc_nombre): void
    {
        $this->doc_nombre = $doc_nombre;
    }

    /**
     * @return mixed
     */
    public function getDocCodigo()
    {
        return $this->doc_codigo;
    }

    /**
     * @param mixed $doc_codigo
     */
    public function setDocCodigo($doc_codigo): void
    {
        $this->doc_codigo = $doc_codigo;
    }

    /**
     * @return mixed
     */
    public function getDocContenido()
    {
        return $this->doc_contenido;
    }

    /**
     * @param mixed $doc_contenido
     */
    public function setDocContenido($doc_contenido): void
    {
        $this->doc_contenido = $doc_contenido;
    }

    /**
     * @return mixed
     */
    public function getDocIdTipo()
    {
        return $this->doc_id_tipo;
    }

    /**
     * @param mixed $doc_id_tipo
     */
    public function setDocIdTipo($doc_id_tipo): void
    {
        $this->doc_id_tipo = $doc_id_tipo;
    }

    /**
     * @return mixed
     */
    public function getDocIdProceso()
    {
        return $this->doc_id_proceso;
    }

    /**
     * @param mixed $doc_id_proceso
     */
    public function setDocIdProceso($doc_id_proceso): void
    {
        $this->doc_id_proceso = $doc_id_proceso;
    }


    public function agregarEditarDoc($acc){
        if($acc=='i'){
            $start = "INSERT INTO";
            $end = "";
        }elseif($acc=='e'){
            $start = "UPDATE";
            $end = "WHERE doc_id = '".$this->doc_id."'";
        }
        $query =$start." doc_documento SET
                        doc_nombre = '".$this->doc_nombre."',
                        doc_codigo = '".$this->doc_codigo."',
                        doc_contenido = '".$this->doc_contenido."',
                        doc_id_tipo = '".$this->doc_id_tipo."',              
                        doc_id_proceso = '".$this->doc_id_proceso."'
                        ".$end;

        $this->query = $query;
        $con = $this->db();
        $save = $con->query($this->query);
        $last_id = $con->insert_id;
        if (!$save) {
            throw new \Exception($con->error . "[ $this->query]");
        }
        return array($save,$last_id);
    }

    public function obtenerConsecutivoCod($doc_id_tipo, $doc_id_proceso){

        $con = $this->db();
        $sql = "SELECT * FROM doc_documento                                    
                WHERE doc_id_tipo='".$doc_id_tipo."' AND doc_id_proceso='".$doc_id_proceso."' 
                ORDER BY doc_id DESC LIMIT 1";
        $res = $con->query($sql);
        $resultSet= array();
        while ($row = $res->fetch_assoc()) {
            $resultSet[] = $row;
        }
        return $resultSet;
    }


    public function obtenerDocumentos(){
        $con = $this->db();

        $sql = "SELECT * FROM doc_documento AS d
                INNER JOIN tip_tipo_doc AS td ON  td.tip_id = d.doc_id_tipo
                INNER JOIN pro_proceso AS pr ON  pr.pro_id = d.doc_id_proceso ";
        $res = $con->query($sql);
        $resultSet= array();
        while ($row = $res->fetch_assoc()) {
            $resultSet[] = $row;
        }
        return $resultSet;
    }

}
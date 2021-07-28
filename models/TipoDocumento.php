<?php


namespace Models;
use Db\EntidadBase;

class TipoDocumento extends EntidadBase
{
    public function __construct()
    {
        $table = "tip_tipo_doc";
        parent::__construct($table);
    }
}
<?php


namespace Models;
use Db\EntidadBase;

class Proceso extends EntidadBase
{
    public function __construct()
    {
        $table = "pro_proceso";
        parent::__construct($table);
    }
}
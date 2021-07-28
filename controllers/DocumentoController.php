<?php


namespace Controllers;
use Models\Documento;
use Models\TipoDocumento;
use Models\Proceso;
class DocumentoController
{
    function view(){
        $view = "documento";
        include_once "views/master.php";
    }

    function crear(){
        //Carga de data básica
        $objTipoDoc = new TipoDocumento();
        $dataTipo = $objTipoDoc->getAll();
        $objProceso = new Proceso();
        $dataProc = $objProceso->getAll();

        if($_POST['guardar']!=''){
            $this->guardarDocumento($_POST,'i');
            $type = "ok";
            $msj = "Documento registrado con exito.";
        }
        $view = "crea_documento";
        include_once "views/master.php";
    }

    private function guardarDocumento($post,$acc,$id=''){
        $objDoc = new Documento();
        $objTipo = new TipoDocumento();
        $objProc = new Proceso();

        //Codigo de documento
        $preProc = $objProc->getBy('pro_id',$post['doc_id_proceso']);
        $preTipo = $objTipo->getBy('tip_id',$post['doc_id_tipo']);

        $nConsecutivo = $objDoc->obtenerConsecutivoCod($post['doc_id_tipo'],$post['doc_id_proceso']);
        if($nConsecutivo==0){
            $n = 1;
        }else{
            $nextNumber = explode('-',$nConsecutivo[0]['doc_codigo']);
            $n = ($nextNumber[2])+1;
        }

        $doc_codigo = $preTipo[0]->tip_prefijo."-".$preProc[0]->pro_prefijo."-".$n;
        if($acc=='e'){
            $codAnt = $objDoc->getBy('doc_id',$id);
            $codInsert = ($codAnt[0]['doc_codigo']!=$doc_codigo)?$doc_codigo:$codAnt[0]['doc_codigo'];

        }else{
            $codInsert=$doc_codigo;
        }
        $insDoc = new Documento();
        $insDoc->setDocId($id);
        $insDoc->setDocNombre($post['doc_nombre']);
        $insDoc->setDocCodigo($codInsert);
        $insDoc->setDocContenido($post['doc_contenido']);
        $insDoc->setDocIdTipo($post['doc_id_tipo']);
        $insDoc->setDocIdProceso($post['doc_id_proceso']);
        $insDoc->agregarEditarDoc($acc);
    }

}
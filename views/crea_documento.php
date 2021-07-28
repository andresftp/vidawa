<div class="py-4 text-center">
</div>
<h5>Crear documento</h5>
<?php
if($type=='ok'){
    ?>
    <div class="alert alert-success" role="alert">
        <?php echo $msj ?>
    </div>
    <script>
        setTimeout(function () {
            location.href = "<?php echo ROOT.'/documentos/view/' ?>"
        }, 2000)

    </script>
    <?php
}elseif($type=='error'){
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $msj ?>
    </div>
    <script>
        setTimeout(function () {
            location.href = "<?php echo ROOT.'/documentos/view/' ?>"
        }, 2000)

    </script>
    <?php
}
?>
<div class="alert alert-primary" role="alert">
    Los campos con asteriscos (*) son obligatorios
</div>
<hr/>
<div class="card">
    <div class="card-body">
        <form method="post" class="row g-3 needs-validation" novalidate action="<?php echo $_SERVER['REQUEST_URI']?>">
            <div class="mb-3 row">
                <label for="doc_nombre" class="col-sm-3 col-form-label">Nombre documento *</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="doc_nombre" name="doc_nombre" placeholder="Nombre documento" value="<?php echo $dataDoc[0]->doc_nombre ?>" required>
                    <div class="invalid-feedback">
                        Nombre de documento es obligatorio.
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="doc_contenido" class="col-sm-3 col-form-label">Contenido *</label>
                <div class="col-sm-6">
                    <textarea name="doc_contenido" id="doc_contenido" class="form-control" rows="" required><?php echo $dataDoc[0]->doc_contenido ?></textarea>
                    <div class="invalid-feedback">
                        El contenido es obligatorio
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-3 col-form-label">Tipo *</label>
                <div class="col-sm-6">
                    <select name="doc_id_tipo" id="doc_id_tipo" class="form-control" required>
                        <option value="">Seleccione una</option>
                        <?php
                        if(count($dataTipo)>0){
                            foreach ($dataTipo AS $item){
                                $sel = ($item->tip_id==$dataDoc[0]->doc_id_tipo)?'selected':'';
                                echo '<option value="'.$item->tip_id.'" '.$sel.'>'.'('.$item->tip_prefijo.') '.$item->tip_nombre.'</option>';
                            }
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        El tipo es obligatorio
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-3 col-form-label">Proceso *</label>
                <div class="col-sm-6">
                    <select name="doc_id_proceso" id="doc_id_proceso" class="form-control" required>
                        <option value="">Seleccione una</option>
                        <?php
                        if(count($dataProc)>0){
                            foreach ($dataProc AS $item){
                                $sel = ($item->pro_id==$dataDoc[0]->doc_id_proceso)?'selected':'';
                                echo '<option value="'.$item->pro_id.'" '.$sel.'>'.'('.$item->pro_prefijo.') '.$item->pro_nombre.'</option>';
                            }
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        El proceso es obligatorio
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="col-lg-6 offset-3">
                    <button class="btn btn-primary" name="guardar" value="guardar" type="submit">Guardar</button>
                    <a class="btn btn-primary" href="<?php echo ROOT.'/documentos/view/' ?>" >Cancelar</a>
                </div>

            </div>
        </form>
    </div>
</div>
<div class="py-4 text-center">
</div>
<h5>Elimina documento</h5>
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
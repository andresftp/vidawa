<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard documental</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">


    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo ROOT ?>/views/plugins/datatables/DataTables-1.10.25/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT ?>/views/plugins/datatables/AutoFill-2.3.7/css/autoFill.bootstrap5.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT ?>/views/plugins/datatables/KeyTable-2.6.2/css/keyTable.bootstrap5.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT ?>/views/plugins/datatables/Responsive-2.2.9/css/responsive.bootstrap5.min.css"/>


    <link href="<?php echo ROOT ?>/views/plugins/fontawesome-free-5.15.3-web/css/fontawesome.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/views/plugins/fontawesome-free-5.15.3-web/css/brands.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/views/plugins/fontawesome-free-5.15.3-web/css/solid.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="icon" href="<?php echo ROOT ?>/views/img/logo.png">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="<?php echo ROOT ?>/views/css/dashboard.css" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Vidawa</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="<?php echo ROOT.'/login/cerrar/' ?>">Cerrar Sesi??n</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo ROOT."/documentos/view/" ?>">
                            <span data-feather="home"></span>
                            Documentos
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php include_once $view.'.php'?>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="<?php echo ROOT ?>/views/js/jquery-3.5.0.js" ></script>
<script>
    window.root = '<?php echo ROOT ?>';
</script>

<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
<script type="text/javascript" src="<?php echo ROOT ?>/views/plugins/datatables/DataTables-1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT ?>/views/plugins/datatables/DataTables-1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT ?>/views/plugins/datatables/AutoFill-2.3.7/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT ?>/views/plugins/datatables/AutoFill-2.3.7/js/autoFill.bootstrap5.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT ?>/views/plugins/datatables/KeyTable-2.6.2/js/dataTables.keyTable.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT ?>/views/plugins/datatables/Responsive-2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT ?>/views/plugins/datatables/Responsive-2.2.9/js/responsive.bootstrap5.js"></script>

<script src="<?php echo ROOT ?>/views/js/defaultPageScripts.js" ></script>
<script src="<?php echo ROOT ?>/views/js/dashboard.js"></script>
</body>
</html>

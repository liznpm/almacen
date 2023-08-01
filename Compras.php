<!DOCTYPE html>
<html>
<head>
    <title>Administración de proyectos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php include 'nav.php'; ?>

    <div class="container mt-4">
        <h1 class="mb-4">Compras</h1>
        <div class="row">
            <div class="col">
                <a href="Verproductos.php" class="card text-center bg-warning text-white">
                    <div class="card-body">
                        <i class="fas fa-eye fa-4x mb-3"></i>
                        <p class="h4">Ver compras</p>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="Guardar_compras.php" class="card text-center bg-primary text-white">
                    <div class="card-body">
                        <i class="fas fa-plus fa-4x mb-3"></i>
                        <p class="h4">Nueva compra</p>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="Buscarproducto.php" class="card text-center bg-danger text-white">
                    <div class="card-body">
                        <i class="fas fa-search fa-4x mb-3"></i>
                        <p class="h4">Buscar compra</p>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="Proveedores.php" class="card text-center bg-danger text-white">
                    <div class="card-body">
                        <i class="fas fa-search fa-4x mb-3"></i>
                        <p class="h4">Agregar proveedor</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// get_proveedores.php

include "db_conn.php";

if (!function_exists('getProveedores')) {
    function getProveedores($conn) {
        $sql = "SELECT * FROM proveedores";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}

$proveedores = getProveedores($conn);
?>
<select name="proveedor_id" id="proveedor_id" class="form-select" required>
    <option value="">Seleccione un proveedor...</option>
    <?php
    while ($row = mysqli_fetch_assoc($proveedores)) {
        echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
    }
    ?>
</select>

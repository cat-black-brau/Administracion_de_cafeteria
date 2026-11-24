<?php
$mensaje = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reservar'])) {
    $nombre = $_POST['nombre'] ?? '';
    $fecha = $_POST['fecha'] ?? '';
    $hora = $_POST['hora'] ?? '';
    $personas = $_POST['personas'] ?? '';
    $area = $_POST['area'] ?? '';
    $mensaje = "¡Mesa reservada con exito para $nombre el dia $fecha a las $hora en el area $area!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menu de la Cafeteria</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../src/css/styles.css">
</head>

<body>
    <h1 style="text-align: center; color: #6f4e37; margin-top: 20px;">☕ Menu de la Cafeteria</h1>
    <p style="text-align: center; color: #555;">Bienvenido comensal (Nivel 2), consulta nuestra carta de especialidades y aparta tu mesa.</p>
    <div style="text-align: center;">
        <a href="../index.php" class="btn-solid theme-secondary">Cerrar Sesion</a>
    </div>
    <br>

    <!-- TABLA DEL MENU -->
    <div style="max-width: 70%; margin: 0 auto;">
        <h2 class="fs-3xl" style="color: #6f4e37;">Nuestros Cafes y Alimentos</h2>
        <br>
        <table class="table table-bordered border-primary">
            <th style="text-align: center;">Producto</th>
            <th style="text-align: center;">Categoria</th>
            <th style="text-align: center;">Descripcion</th>
            <th style="text-align: center;">Precio</th>
            <tbody>
                <tr>
                    <td style="text-align: center; font-weight: bold;">Cafe Americano</td>
                    <td style="text-align: center;">Cafe Caliente</td>
                    <td style="text-align: center;">Cafe negro clasico de granos seleccionados</td>
                    <td style="text-align: center; font-weight: bold; color: #6f4e37;">$35.00</td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold;">Cappuccino Italiano</td>
                    <td style="text-align: center;">Cafe Caliente</td>
                    <td style="text-align: center;">Espresso con leche vaporizada y abundante espuma con canela</td>
                    <td style="text-align: center; font-weight: bold; color: #6f4e37;">$50.00</td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold;">Latte Vainilla</td>
                    <td style="text-align: center;">Cafe Caliente</td>
                    <td style="text-align: center;">Cafe suave con leche cremosa y jarabe de vainilla</td>
                    <td style="text-align: center; font-weight: bold; color: #6f4e37;">$55.00</td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold;">Frappe Moka</td>
                    <td style="text-align: center;">Cafe Frio</td>
                    <td style="text-align: center;">Cafe batido con chocolate, hielo y crema chantilly</td>
                    <td style="text-align: center; font-weight: bold; color: #6f4e37;">$65.00</td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold;">Cheesecake de Frutos Rojos</td>
                    <td style="text-align: center;">Postre</td>
                    <td style="text-align: center;">Pastel de queso artesanal con mermelada de moras y fresas</td>
                    <td style="text-align: center; font-weight: bold; color: #6f4e37;">$70.00</td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold;">Croissant de Mantequilla</td>
                    <td style="text-align: center;">Panaderia</td>
                    <td style="text-align: center;">Hojaldre frances crujiente horneado en el dia</td>
                    <td style="text-align: center; font-weight: bold; color: #6f4e37;">$40.00</td>
                </tr>
            </tbody>
        </table>
    </div>

    <br><br>

    <!-- APARTADO DE RESERVACION DE MESAS -->
    <div style="max-width: 50%; margin: 0 auto; margin-bottom: 50px;">
        <h2 class="fs-3xl" style="text-align: center; color: #6f4e37;">🪑 Apartado de Reservacion de Mesas</h2>
        <br>
        
        <?php if (!empty($mensaje)) { ?>
            <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; text-align: center; margin-bottom: 20px;">
                <strong><?= $mensaje ?></strong>
            </div>
        <?php } ?>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="menu.php">
                    <input type="hidden" name="reservar" value="1">
                    
                    <label class="form-label">Nombre del Comensal</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Tu nombre completo" required/><br>

                    <label class="form-label">Fecha de Visita</label>
                    <input type="date" class="form-control" name="fecha" value="<?= date('Y-m-d') ?>" required/><br>

                    <label class="form-label">Hora</label>
                    <input type="time" class="form-control" name="hora" value="16:00" required/><br>

                    <label class="form-label">Numero de Personas</label>
                    <input type="number" min="1" max="12" class="form-control" name="personas" value="2" required/><br>

                    <label class="form-label">Area de la Cafeteria</label>
                    <select name="area" class="form-control">
                        <option value="Interior (Climatizado)">Interior (Climatizado)</option>
                        <option value="Terraza (Al aire libre)">Terraza (Al aire libre)</option>
                        <option value="Barra de Cafe">Barra de Cafe</option>
                        <option value="Zona Lounge (Sillones)">Zona Lounge (Sillones)</option>
                    </select><br>

                    <div class="text-center">
                        <button type="submit" class="btn-solid theme-primary"> Confirmar Reservacion </button>
                        <button type="reset" class="btn-solid theme-secondary"> Limpiar </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

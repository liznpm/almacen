<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard con Bootstrap</title>
  <!-- Agrega la biblioteca de Bootstrap (CSS) -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Agrega la biblioteca de Font Awesome (íconos) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <div class="container-fluid">
    <div class="row">
      <!-- Menú lateral -->
      <!-- Sidebar -->
      <?php include 'nav.php'; ?>

      <!-- Menú lateral 2 -->
    ¡
      <main class="col-md-8 offset-md-2">
        <!-- Navbar -->
       
        <!-- Contenido principal -->
        <div class="dashboard-section" id="section-home">
          <h1>Inicio</h1>
          <p>Contenido de la sección Inicio.</p>
        </div>
        <div class="dashboard-section" id="section-paciente" style="display: none;">
          <!-- Contenido de la sección Paciente -->
          <h1>Paciente</h1>
          <p>Contenido de la sección Paciente.</p>
        </div>
        <div class="dashboard-section" id="section-widgets" style="display: none;">
          <!-- Contenido de la sección Widgets -->
          <h1>Widgets</h1>
          <p>Contenido de la sección Widgets.</p>
        </div>
        <div class="dashboard-section" id="section-medico" style="display: none;">
          <!-- Contenido de la sección Medico -->
          <h1>Medico</h1>
          <p>Contenido de la sección Medico.</p>
        </div>
      </main>
    </div>
  </div>

  <!-- Agrega el código JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</body>

</html>

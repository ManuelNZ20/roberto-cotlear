<?php
// TODO: Cambiar el controllador y revisar detalles
   if(isset($_GET['id'])){
     include_once '../../../app/controller/ProductController.php';
      $controller = new ProviderController();
      $id = $_GET['id'];
    }else {
      $id = 0;
      $dateRegister = date('Y-m-d');
      $state = 'all';
      $categories = 'all';
      $providers = 'all';
    }
?>
<!doctype html>
<html lang="en">
<head>
  <title>Roberto Cotlear</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../public/css/main.css">
</head>
<body>
  <!-- header -->
  <?php
    require_once('../../../app/views/layout/header.php');
  ?>   
<!-- main -->
<main class="container pt-4 mb-4">
    <div class="container pt-5">
      <div class="row align-items-center">
        <div class="col mb-2">
            <div class="row align-items-center">
                <div class="col-auto"> <i class="bi bi-pencil" >
              </i></div>
                <h4 class="col-6 col-sm-3">Productos</h4>
            </div>
        </div>
        <div class="col-md-auto mb-2">
            <div class="row">
                <h4 class="col-auto">ID:</h4>
                <h4 class="col-auto"><?php
                    if($id!=0) {
                        echo $id;
                    }else {
                        echo "Nuevo";
                    }
                    ?>
                </h4>
            </div>
        </div>
        <div class="col-md-auto mb-2">
            <div class="row">
                <h4 class="col-auto">Fecha de registro:</h4>
                <h4 class="col-auto"><?php
                    echo $dateRegister;
                    ?> <?php
                    ?>
                </h4>
            </div>
        </div>
  </div>
  <hr>
  </div>
  <form class="row g-3" action="../../../app/controller/ProviderController.php?id=<?= ($id!=0)?$id:''; ?>" method="POST">
  <!--  Nombre -->
  <div class="col-md-6">
      <label for="nameProvider" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="nameProvider" name="nameProvider" value="<?= ($id>0)?$name:'';?>" required>
    </div>
   <!--  Categoría -->
  <div class="col-md-3">
    <label for="emailProvider" class="form-label">Cantidad</label>
    <input type="email" class="form-control" id="emailProvider" name="emailProvider" value="<?= ($id>0)?$email:'';?>" required>
  </div>
  
  <div class="col-md-3">
    <label for="addressProvider" class="form-label">Precio</label>
    <input type="text" class="form-control" id="addressProvider" name="addressProvider" value="<?= ($id>0)?$address:'';?>" required>
  </div>
  <div class="col-md-6">
    <label for="phoneProvider" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="phoneProvider" name="phoneProvider" value="<?= ($id>0)?$phone:'';?>" required>
  </div>
    <!--  Estado -->
    <div class="col-md-3">
        <label for="stateProvider" class="form-label">Estado</label>
        <select class="form-select" aria-label="Default select example" name="stateProvider" id="stateProvider" required>
            <option value="activo" <?php if($state=='activo') echo 'selected';?>>Activo</option>
            <option value="inactivo" <?php if($state=='inactivo') echo 'selected';?>>Inactivo</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="stateProvider" class="form-label">Categoría</label>
        <select class="form-select" aria-label="Default select example" name="stateProvider" id="stateProvider" required>
            <option value="all" <?php if($state=='all') echo 'selected';?>>Seleccionar</option>
            <option value="activo" <?php if($state=='activo') echo 'selected';?>>Activo</option>
            <option value="inactivo" <?php if($state=='inactivo') echo 'selected';?>>Inactivo</option>
        </select>
    </div>
      <!--  Descripción -->
  <div class="col-md-12">
  <label for="descriptionProvider" class="form-label">Descripción</label>
  <textarea class="form-control" id="descriptionProvider" name="descriptionProvider" rows="3" cols="4" style="resize:none;" required><?=($id>0)?$description:''; ?></textarea>
  </div>
  <!-- selected -->
  <div class="col-md-4">
        <label for="stateProvider" class="form-label">Proveedor</label>
        <select class="form-select" aria-label="Default select example" name="stateProvider" id="stateProvider" required>
            <option value="all" <?php if($state=='all') echo 'selected';?>>Seleccionar</option>
            <option value="activo" <?php if($state=='activo') echo 'selected';?>>Activo</option>
            <option value="inactivo" <?php if($state=='inactivo') echo 'selected';?>>Inactivo</option>
        </select>
    </div>
    <div class="col-md-8">
        <h4 class="text-center">Imagen</h4>
        <input class="form-control" type="file" id="formFileMultiple" multiple>
        <hr>
        <img class="img " src="../../../public/img/img-home.png" alt="imagen" style="border-radius:10px; width:270px;">
    </div>
    <div class="col-md-8">
    </div>
  <!-- buttons -->
  <div class="col-12 text-end">
    <button id="btnProvider" class="col-3 btn btn-outline-secondary"  name="btnProvider" value="<?= ($id!=0)?'Guardar':'Crear'; ?>">
    <i class="bi bi-floppy"></i> <?php
            if($id!=0) {
                echo "Guardar";
            }else {
                echo "Crear";
            }
            ?>
    </button>
    <a class="col-3 btn btn-outline-secondary"  href="../../../app/views/admin/products.php">
    <i class="bi bi-arrow-left-circle"></i> Cerrar
    </a>
  </div>
</form>
</main>
  <!-- Bootstrap JavaScript Libraries -->  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>


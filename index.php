<?php require('./config/db.php');
require("./config/config.php");
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_producto, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);



?>

<?php require('./layout/header.php')?>




<!-- Encabezado--> 
      <header class=" py-4">
            <div class="container px-4 px-lg-4 my-9">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder" >BOLSAS JULI</h1>
                    <h2 >AL ALCANCE DE UN CLICK</h2>
                    <h3 >Holii Bienvenid@ te lo mereces 💜</h3>
                    <p class="lead fw-normal text-white-50 mb-0">Envíos a todo México</p>
                    <img src="./img/logo.jpg" class="logo">
                </div>
            </div>
        </header>
        
        <!-- Slider Falta -->
  </main>

<main>
  <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
      <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <!--Tarjeta producto-->
        <?php foreach ($resultado as $row) {?>
          <div class="col mb-5">
            <div class="producto">
              <div class="card h-100">
              <!--Imagen producto-->
              <?php $id=$row["id_producto"];
              $imagen = "./img/Productos/". $id . "/principal.jpg";
              if(!file_exists($imagen)){
                $imagen = "./img/no-photo.jpg";
              }
              ?>
              <img src="<?php echo $imagen ?>" class="d-block w-100">
              <!--Detalles producto-->
              <div class="card-body p-4">
                <div class="text-center">
                  <!--Nombre producto-->
                  <h5 class="fw-bolder"><?php  echo $row['nombre'];  ?></h5>
                  <!-- Precio producto -->
                  <p>$ <?php echo number_format($row['precio'],2,'.',',');?></p>
                </div>
                <!-- Botones -->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                  <div class="botones">
                  <a href="detalles.php?id=<?php echo $row["id_producto"];?>&token=<?php echo
                  hash_hmac("sha512",$row["id_producto"],KEY_TOKEN)?>">
                  <button  class="btn btn-outline-dark mt-auto">Detalles</button>
                  </a>
                  <a href="">
                    <button class="btn btn-outline-dark mt-auto">Compara ahora</button>
                  </a>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
          <?php }?>
      </div>
    </div>
  </section>
</main>

<?php require('./layout/footer.php')?>
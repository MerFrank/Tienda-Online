<?php require('./config/db.php');

$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_producto, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);



?>

<?php require('./layout/header.php')?>

  <main>


<!-- Encabezado--> 
      <header class=" py-4">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder" >BOLSAS JULI</h1>
                    <h2 >AL ALCANCE DE UN CLICK</h2>
                    <h3 >Holii Bienvenid@ te lo mereces 💜</h3>
                    <p class="lead fw-normal text-white-50 mb-0">Envíos a todo México</p>
                    <img src="./img/logo.jpg" class="logo">
                </div>
            </div>
        </header>
        
        <!-- Slider -->
        <div id="carouselExampleDark" class="carousel carousel-dark slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
        <!-- Imagen del slider -->
      <img src="https://images.pexels.com/photos/974964/pexels-photo-974964.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Primer label</h5>
        <p>Descripción de la imagen</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
        <!-- Imagen del slider -->
      <img src="https://images.pexels.com/photos/1778412/pexels-photo-1778412.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100" >
      <div class="carousel-caption d-none d-md-block">
        <h5>Segundo label</h5>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta, aliquid adipisci, et rem commodi sunt corporis fuga sapiente excepturi possimus officiis porro in repudiandae aperiam fugit rerum magnam corrupti nulla.</p>
      </div>
    </div>
    <div class="carousel-item">
      <!-- Imagen del slider -->  
      <img src="https://images.pexels.com/photos/1543931/pexels-photo-1543931.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100" >
      <div class="carousel-caption d-none d-md-block">  
        <h5>Tercer label</h5>
        <p>Descripción de la imagen</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>

<?php ?> 

  </main>

  <?php require('./layout/footer.php')?>
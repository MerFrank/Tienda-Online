<?php require('./db.php');

$sentencia=$conexion->prepare("SELECT * FROM productos");
$sentencia->execute();
$productos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require('./layout/header.php')?>

<main>


        <!-- Sección-->
        <section class="py-5    ">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">                   
                

<?php foreach($productos as $row) { ?>
<div class="col mb-5">
<div class="producto">
<div class="card h-100">
    <!-- Product image-->
        <img class="card-img-top" src="https://images.pexels.com/photos/1050244/pexels-photo-1050244.jpeg?auto=compress&cs=tinysrgb&w=600" alt="..." />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder"> <?php  echo $row['nombre'];  ?> </h5>
                <!-- Product price-->
                <p>$ <?php echo number_format($row['precio'],2,'.',',');?>
                </p>
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent" >
            <div class="botones">
            <button  class="btn btn-outline-dark mt-auto">Añadir al carrito</button>
            <button  class="btn btn-outline-dark mt-auto">Comprara Ahora</button>
        </div>
            
        </div>
    </div>
</div>  

</div>    <!-- Este mantiene las comulnas-->

<?php } ?> 
</main>

<?php require('./layout/footer.php')?>
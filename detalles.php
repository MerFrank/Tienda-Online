<?php require('./config/db.php');
require("./config/config.php");
$db = new Database();
$con = $db->conectar();

$id= isset($_GET["id"]) ? $_GET["id"] : "";
$token= isset($_GET["token"]) ? $_GET["token"] : "";

if($id == "" || $token == ""){
    echo "Error al procesar la petición";
    exit;
} else{
    $token_tmp = hash_hmac("sha512",$id,KEY_TOKEN);
    if($token == $token_tmp){
        $sql = $con->prepare("SELECT count(id_producto) FROM productos WHERE id_producto=? AND activo=1");
        $sql->execute([$id]);
        if($sql->fetchColumn() > 0){
            $sql = $con->prepare("SELECT nombre, descripción, precio, descuento FROM productos WHERE id_producto=? AND activo=1
            LIMIT 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row["nombre"];
            $descricion = $row["descripción"];
            $precio = $row["precio"];
            $descuento = $row["descuento"];
            $precio_desc = $precio - (($precio * $descuento) / 100);
            $dir_images = "./img/Productos/". $id . "/";

            $rutaImg = $dir_images . "principal.jpg";
            
            if(!file_exists($rutaImg)){
                $rutaImg = "./img/no-photo.jpg";
            }
            $imagenes = array();
            $dir = dir($dir_images);
            while(($archivo = $dir->read()) != false ){
                if($archivo != "principal.jpg" && (strpos($archivo,"jpg") || strpos($archivo, "jpeg"))){
                    $imagenes[] = $dir_images . $archivo;
                }
            }
        }
    }else{
        echo "Error al procesar la petición";
        exit;
    }
}
?>

<?php require('./layout/header.php')?>



    <main>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5 py-5">
                <div class="row">
                    <div class="col-md-6 order-md-1">
                    <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo $rutaImg; ?>" class="d-block w-100">
                            </div>
                            <?php foreach ($imagenes as $img){?>
                            <div class="carousel-item">
                                <img src="<?php echo $img;?>" class="d-block w-100">
                            </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>

                    </div>
                    <div class="col-md-6 order-md-2">
                        <h2><?php echo $nombre;?></h2>
                        <?php if ($descuento > 0){?>
                            <p><del><?php echo MONEDA . number_format($precio,2,".",",");?></del></p>
                            <h2>
                                <?php echo MONEDA . number_format($precio_desc,2,".",",");?>
                                <small class="text-success"><?php echo $descuento;?> % descuento</small>
                            </h2>
                        <?php } else { ?>
                            <h2><?php echo MONEDA . number_format($precio,2,".",",");?></h2>
                        <?php } ?>

                        <p class="lead">
                            <?php echo $descricion ?>
                        </p>
                        <div class="d-grid gap-3 col-10 mx-auto">
                            <button class="btn btn-primary" type="button">Compara ahora</button>
                            <button class="btn btn-outline-primary" type="button">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


<?php require('./layout/footer.php')?>
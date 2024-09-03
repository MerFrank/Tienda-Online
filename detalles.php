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
            $sql = $con->prepare("SELECT nombre, descripción, precio FROM productos WHERE id_producto=? AND activo=1
            LIMIT 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row["nombre"];
            $descricion = $row["descripción"];
            $precio = $row["precio"];
        }
    }else{
        echo "Error al procesar la petición";
        exit;
    }
}
?>

<?php require('./layout/header.php')?>
<main> 
<!-- Este main es del header -->

<body>
    <main>
        <div class="container px-4 px-lg-5 mt-5 py-5">
            <div class="row">
                <div class="col-md-6 order-md-1">
                    <img src="./img/Productos/1/principal.jpg" alt="">
                </div>
                <div class="col-md-6 order-md-2">

                </div>
            </div>
        </div>
    </main>
</body>

<?php require('./layout/footer.php')?>
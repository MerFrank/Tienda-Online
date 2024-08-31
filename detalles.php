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

    }else{
        echo "Error al procesar la petición";
        exit;
    }
}

$sql = $con->prepare("SELECT id_producto, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require('./layout/header.php')?>

<main>



<main>
    <div class="container">

    </div>
</main>

<?php require('./layout/footer.php')?>
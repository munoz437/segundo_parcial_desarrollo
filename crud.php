<?php
if (!empty($_POST)){
    $txt_id= utf8_decode($_POST["txt_id"]);
    $txt_codigo = utf8_decode($_POST["txt_codigo"]);
    $txt_nombres =utf8_decode($_POST["txt_nombres"]);
    $txt_apellidos = utf8_decode($_POST["txt_apellidos"]);
    $txt_direccion = utf8_decode($_POST["txt_direccion"]);
    $txt_telefono = utf8_decode($_POST["txt_telefono"]);
    $drop_puesto = utf8_decode($_POST["drop_puesto"]);
    $txt_fn = utf8_decode($_POST["txt_fn"]);
    $sql="";

    if (isset($_POST["btn_agregar"])) {
        $sql = "INSERT INTO productos(producto,descripcion,precio_costo, precio_venta, existencia, idMarca) VALUES ('".$txt_codigo."','".$txt_nombres."',".$txt_apellidos.",".$txt_direccion.",".$txt_telefono.",".$drop_puesto.");";
    }
    if (isset($_POST["btn_editar"])) {
        $sql = "update productos set producto='".$txt_codigo."', descripcion='".$txt_nombres."', precio_costo=".$txt_apellidos.", precio_venta=".$txt_direccion.", existencia=".$txt_telefono.", idMarca=".$drop_puesto." WHERE id=".$txt_id.";";
    }
    if (isset($_POST["btn_eliminar"])) {
        $sql = "delete from productos where id =".$txt_id.";";
    }
    
    include("datos_conexion.php");
    $db_conexion = mysqli_connect($db_host, $db_usr, $db_pass,$db_name);
    if ($db_conexion->query($sql)===true) {
        $db_conexion ->close();
        header('location: index.php');
    }else{
        echo"Error".$sql."<br>".$db_conexion->close();
    }
 
}
 ?>
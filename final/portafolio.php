<?php include("cabecera.php"); ?> 
<?php include("conexion.php"); ?> 
<?php

if($_POST){
//print_r($_POST);
$nombre= $_POST['nombre'];   
$tipo= $_POST['tipo'];
$precio= $_POST['precio'];
$descripcion= $_POST['descripcion'];
$vendedor= $_POST['vendedor'];
$contacto= $_POST['contacto'];
$objconexion= new conexion();
$sql="INSERT INTO `productos` (`id`, `nombre`, `tipo`, `imagen`, `precio`, `descripcion`, `vendedor`, `contacto`) VALUES (NULL,'$nombre','$tipo', 'andres.jpg',$precio,'$descripcion','$vendedor',$contacto);";
$objconexion->ejecutar($sql);
}

if($_GET){
    
    $id=$_GET['borrar'];
    $objconexion= new conexion();
    $sql="DELETE FROM `productos` WHERE `productos`.`id` =".$id;
    $objconexion->ejecutar($sql);

}

$objconexion= new conexion();
$proyectos=$objconexion->consultar("SELECT * FROM `productos`");

//print_r($proyectos);

?>
<br/>

<div class="container">
    <div class="row">
        <div class="col-md-4">

        <div class="card">
    <div class="card-header">
        Registrar Producto
    </div>
    <div class="card-body">
    <form action="portafolio.php" method="post" enctype="multipart/form-data">

Nombre del producto: <input class="form-control" type="text" name="nombre" id="">  
<br/>
Tipo de Producto: <input class="form-control" type="text" name="tipo" id="">
<br/>
Imagenes: <input class="form-control" type="file" name="archivo" id="">
<br/>
Precio: <input class="form-control" type="text" name="precio" id="">
<br/>
Descripcion: <input class="form-control" type="text" name="descripcion" id="">
<br/>
vendedor: <input class="form-control" type="text" name="vendedor" id="">
<br/>
contacto: <input class="form-control" type="text" name="contacto" id="">
<br/>

<input class="btn btn-success" type="submit" value="Enviar Datos">

    </div>
</div>
 
        </div>
        <div class="col-md-6">
        <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Vendedor</th>
            <th>Contacto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($proyectos as $proyecto) { ?>
            
        <tr>
            <td><?php echo $proyecto['id']; ?></td>
            <td><?php echo $proyecto['nombre']; ?></td>
            <td><?php echo $proyecto['tipo']; ?></td>
            <td><?php echo $proyecto['imagen']; ?></td>
            <td><?php echo $proyecto['precio']; ?></td>
            <td><?php echo $proyecto['descripcion']; ?></td>
            <td><?php echo $proyecto['vendedor']; ?> </td>
            <td><?php echo $proyecto['contacto']; ?></td>
            <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>">Eliminar</a></td>
        </tr>
        <?php } ?>
       
    </tbody>
</table>

        </div>
        
    </div>
</div>




<?php include("pie.php");  ?> 
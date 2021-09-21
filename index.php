<!doctype html>
<html lang="en">
  <head>
    <title>productos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootswhatch CSS--->
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">


    <!-- Bootstrap CSS v5
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    -->
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

<style>
    body {
        background: #02AAB0;  
        background: -webkit-linear-gradient(to left, #00CDAC, #02AAB0); 
        background: linear-gradient(to left, #00CDAC, #02AAB0); 
    }
    h1{
        text-align: center;
    }
</style>
  </head>
  <body>
    <h1>Formulario productos</h1>

    <!-- Modal -->
    <div class="modal" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">productos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
      <form class="d-flex" action="crud_empleado.php" method="post">

<div class="col">
    <div class="mb-3">
       
        <input type="hidden" name="txt_id" id="txt_id" class="form-control" placeholder="0"  readonly>
    </div>
    <div class="mb-3">
        <label for="lbl_codigo" class="form-label"><b>Producto</b></label>
        <input type="text" name="txt_codigo" id="txt_codigo" class="form-control" placeholder="Producto..." required>
    </div>

    <div class="mb-3">
        <label for="lbl_nombres" class="form-label"><b>Descripción</b></label>
        <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="Descripcion..." required>
    </div>

    <div class="mb-3">
        <label for="lbl_apellidos" class="form-label"><b>Precio Costo</b></label>
        <input type="number" step="0.01" name="txt_apellidos" id="txt_apellidos" class="form-control" placeholder="100.50" required>
    </div>

    <div class="mb-3">
        <label for="lbl_direccion" class="form-label"><b>Precio Venta</b></label>
        <input type="number"  step="0.01" name="txt_direccion" id="txt_direccion" class="form-control" placeholder="200.99" required>
    </div>

    <div class="mb-3">
        <label for="lbl_telefono" class="form-label"><b>Existencia</b></label>
        <input type="number" name="txt_telefono" id="txt_telefono" class="form-control" placeholder="45" required>
    </div>

    <div class="mb-3">
      <label for="lbl_puesto" class="form-label"><b>Marca</b></label>
      <select class="form-select" name="drop_puesto" id="drop_puesto">
        <option value=0>--- Elija una Marca ---</option>
       <?php 
            //CONEXION Y SELECT
            include("datos_conexion.php");
            $db_conexion = mysqli_connect($db_host, $db_usr, $db_pass,$db_name);

            $db_conexion->real_query("SELECT idMarca as id, marca FROM marcas");
            $resultado=$db_conexion->use_result();


            while ($fila = $resultado->fetch_assoc()) {
               echo "<option value=". $fila['id'].">".$fila['marca']."</option>";
            }

            $db_conexion->close();
       ?>
     
      </select>
    </div>

    
    <div class="mb-3">
        <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary" value="Agregar">
        <input type="submit" name="btn_editar" id="btn_editar" class="btn btn-warning" value="Editar">
        <input type="submit" name="btn_eliminar" id="btn_eliminar" class="btn btn-danger" value="Eliminar">

    </div>


   

</div>

</form>
      </div>
     
    </div>
  </div>
</div>
    <div class="container">
                        
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="limpiar()">Nuevo</button>

        <table class="table table-striped table-inverse table-responsive table-dark" id="tabla">
            <thead class="thead-inverse|thead-default">
                <tr>
                    <th>productos</th>
                    <th>Descripcion</th>
                    <th>precio costo</th>
                    <th>precio venta</th>
                    <th>Existencia</th>
                    <th>Marca</th>
                </tr>
                </thead>
                <tbody id="tbl_productos">
                    <?php
                        include("datos_conexion.php");
                        $db_conexion = mysqli_connect($db_host, $db_usr, $db_pass,$db_name);

                         $db_conexion->real_query("select e.id,e.producto,e.descripcion,e.precio_costo,e.precio_venta,e.existencia,e.idMarca, p.marca from productos as e inner join marcas as p on e.idMarca = p.idMarca order by e.id;");
                         $resultado=$db_conexion->use_result();
 
                         while ($fila = $resultado->fetch_assoc()) {
                            echo "<tr data-id=".$fila['id']." data-id_p=".$fila['idMarca']. ">";
                                echo "<td>".$fila['producto']."</td>";
                                echo "<td>".$fila['descripcion']."</td>";
                                echo "<td>".$fila['precio_costo']."</td>";
                                echo "<td>".$fila['precio_venta']."</td>";
                                echo "<td>".$fila['existencia']."</td>";
                                echo "<td>".$fila['marca']."</td>";                           
                            echo "</tr>";
                         }
                          $db_conexion->close();
                    ?>
                   
                </tbody>
        </table>
        
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">

        function limpiar(){
            $("#txt_id").val(0);

            $("#txt_codigo").val('');

            $("#txt_nombres").val('');

            $("#txt_apellidos").val('');

            $("#txt_direccion").val('');

            $("#txt_telefono").val('');

            $("#txt_fn").val('');

            $("#drop_puesto").val(0);
        }
        $('#tbl_productos').on('click', 'tr td',function(evt){
            var target,id,id_p,codigo,nombres,apellidos,direccion,telefono,nacimiento;
            target = $(event.target);
            id=target.parent().data('id');
            id_p=target.parent().data('id_p');
            codigo=target.parent("tr").find("td").eq(0).html();
            nombres=target.parent("tr").find("td").eq(1).html();
            apellidos=target.parent("tr").find("td").eq(2).html();
            direccion=target.parent("tr").find("td").eq(3).html();
            telefono=target.parent("tr").find("td").eq(4).html();
            nacimiento=target.parent("tr").find("td").eq(6).html();
            $("#txt_id").val(id);

            $("#txt_codigo").val(codigo);

            $("#txt_nombres").val(nombres);

            $("#txt_apellidos").val(apellidos);

            $("#txt_direccion").val(direccion);

            $("#txt_telefono").val(telefono);

            $("#txt_fn").val(nacimiento);

            $("#drop_puesto").val(id_p);

            $("#exampleModal").modal('show');
           
        });

        var tabla=document.querySelector("#tabla");
        var dataTable = new DataTable(tabla,{
            perPage:3
        });
    </script>

</body>
</html>
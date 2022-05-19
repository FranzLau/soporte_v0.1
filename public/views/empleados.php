<?php
  session_start();
  require '../../config/conexion.php';
  if (isset($_SESSION['loginUser'])) {
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include('../include/head.php'); ?>
  </head>
  <body id="page-top">

    <?php include('../modal/modalNuevoEmpleado.php'); ?>
    <?php include('../modal/modalEditarEmpleado.php'); ?> 
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    <!-- Page Wrapper -->
    <div id="wrapper">
      <?php include("../include/sidebar.php"); ?>

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
          <?php include("../include/topbar.php"); ?>

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
              <h1 class="h3 mb-0 text-gray-800">Empleados</h1>
              <button class="d-none d-sm-inline-block btn btn-success btn-sm btn-icon-split" data-toggle="modal" data-target="#modalNuevoEmpleado">
                <span class="icon text-white-50">
                  <i class="fas fa-plus fa-sm"></i>
                </span>
                <span class="text">Agregar Empleado</span>
              </button>
            </div>

            <!-- Page Lista de Empleados -->
            <div class="row mt-3">
              <div class="col-sm-12">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list mr-2"></i>Lista de Empleados</h6>
                  </div>
                  <div class="card-body">
                    <!-- ************* TARJETA CON TABLA ***************** -->
                    <div id="tablaEmpleados"></div>
                    <!-- ************************************************* -->
                  </div>
                </div>
              </div>
            </div>

            <!-- Content Row -->

          </div>
        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2019</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->

    

    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    <?php include('../include/scripts.php'); ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tablaEmpleados').load('../componentes/tablaEmpleados.php');
      });
    </script>
    <script>
      function verDatosEmpleado(idemp){
        $.ajax({
          url: '../procesos/empleados/leerEmpleado.php',
          type: 'POST',
          data: "idemp=" + idemp,
          success:function(r){
            var datos = $.parseJSON(r);
            $('#idEditarEmpleado').val(datos['idempphp']);
            $('#nomEditarEmpleado').val(datos['nomempphp']);
            $('#apeEditarEmpleado').val(datos['apempphp']);
            $('#cargoEditarEmpleado').val(datos['cargoempphp']);
            $('#gerenciaEditarEmpleado').val(datos['grempphp']);
            if (datos['gpoempphp']==1) {
              $('#grupoEditarEmpleado1').prop('checked',true);
            }else {
              $('#grupoEditarEmpleado2').prop('checked',true);
            };
            if (datos['estaempphp']==1) {
              $('#estadoEditarEmpleado1').prop('checked',true);
            }else {
              $('#estadoEditarEmpleado2').prop('checked',true);
            }
            
            
          }
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

      }
      //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
      function borrarEmpleado(idemp){

        Swal.fire({
            title: 'Estas seguro?',
            text: "No podrás revertir esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4e73df',
            cancelButtonColor: '#e74a3b',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
            url: '../../public/procesos/empleados/eliminarEmpleado.php',
            type: 'POST',
            data: "idemp=" + idemp,
            success:function(r){
              if (r==1) {
                $('#tablaEmpleados').load('../componentes/tablaEmpleados.php');
                Swal.fire(
                    'Eliminado!',
                    'Tu archivo ha sido eliminado.',
                    'success'
                  )
              }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un error!'
                    })
                }
              }
            })
          }
        })
      }
      //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    </script>
  </body>
</html>
<?php
  }else{
    header('Location: ../../');
  }
?>
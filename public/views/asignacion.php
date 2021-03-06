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
    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column vh-100">

        <!-- Main Content -->
        <div id="content">

          <?php include("../include/navbar.php"); ?>

          <!-- Begin Page Content -->
          <div class="container">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Movimientos</li>
                <li class="breadcrumb-item"><a href="#">Asignación</a></li>
              </ol>
            </nav>

            <div class="row">
              <div class="col-md-12">
                <ul class="nav nav-pills nav-pills-primary" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-list-tab" data-toggle="pill" href="#pills-list" role="tab" aria-controls="pills-list" aria-selected="true"><i class="fas fa-list mr-2 fa-sm"></i>Listado de Asignaciones</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-formAsig-tab" data-toggle="pill" href="#pills-formAsig" role="tab" aria-controls="pills-formAsig" aria-selected="false"><i class="far fa-file mr-2 fa-sm"></i>Agregar Asignacion</a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-sm-12">

                <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                <div class="tab-content" id="pills-tabContent">

                  <!-- primer PANEL -->

                  <div class="tab-pane fade show active" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
                    <div class="card shadow-mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-desktop mr-2"></i>Lista de Asignaciones</h6>
                      </div>
                      <div class="card-body">
                        <div id="tablaAsignas"></div>
                      </div>
                    </div>

                  </div>

                  <!-- FINAL primer PANEL -->

                  <!-- segundo PANEL -->

                  <div class="tab-pane fade" id="pills-formAsig" role="tabpanel" aria-labelledby="pills-formAsig-tab">

                    <div class="card shadow">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-desktop mr-2"></i>Registro de Asignación</h6>
                      </div>
                      <div class="card-body">

                        <!-- inicio de FORMULARIO -->

                        <form id="formNewAsignament">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="card">
                                <div class="card-body">
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row">
                                    <label for="newAsigFecha" class="col-form-label col-form-label-sm col-sm-2">Fecha:</label>
                                    <div class="col-sm-5">
                                      <input type="date" class="form-control form-control-sm" name="newAsigFecha" id="newAsigFecha">
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row">
                                    <label for="newAsigEmp" class="col-form-label col-form-label-sm col-sm-2">Usuario:</label>
                                    <div class="col-sm-10">
                                      <select class="form-control form-control-sm" id="newAsigEmp" name="newAsigEmp" style="width:100%">
                                        <option >Elije cliente</option>
            														<?php $prod = $con->query("SELECT * FROM empleado");
            															while ($row = $prod->fetch_assoc()) {
            																echo "<option value='".$row['id_emp']."' ";
            																echo ">";
            																echo $row['nom_emp'];
            																echo " ";
            																echo $row['ape_emp'];
            																echo "</option>";
            															}
            														?>
                                      </select>
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row">
                                    <label for="newAsigSerie" class="col-form-label col-form-label-sm col-sm-2">Serie :</label>
                                    <div class="col-sm-5">
                                      <select class="form-control form-control-sm" id="newAsigSerie" name="newAsigSerie" style="width:100%">
                                        <option value="">Elije producto</option>
                                        <?php $prod = $con->query("SELECT * FROM equipo WHERE cantidad_equipo <> 0 ");
                                            while ($row = $prod->fetch_assoc()) {
                                              echo "<option value='".$row['id_equipo']."' ";
                                              echo ">";
                                              echo $row['serie_equipo'];
                                              echo "</option>";
                                            }
                                        ?>
                                      </select>
                                    </div>
                                    <label for="newAsigCant" class="col-form-label col-form-label-sm col-sm-2">Und.</label>
                                    <div class="col-sm-3">
                                      <input type="number" class="form-control form-control-sm" id="newAsigCant" name="newAsigCant">
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row">
                                    <label for="newAsigCateg" class="col-form-label col-form-label-sm col-sm-2">Tipo:</label>
                                    <div class="col-sm-4">
                                      <select class="form-control form-control-sm" id="newAsigCateg" name="newAsigCateg" style="width:100%" disabled>
                                        <option value="">Pertenece a...</option>
                                        <?php $ctg = $con->query("SELECT * FROM categoria");
                                            while ($row = $ctg->fetch_assoc()) {
                                              echo "<option value='".$row['id_categoria']."' ";
                                              echo ">";
                                              echo $row['nom_categoria'];
                                              echo "</option>";
                                            }
                                        ?>
                                      </select>
                                    </div>
                                    <label for="newAsigMarca" class="col-form-label col-form-label-sm col-sm-2">Marca:</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control form-control-sm" id="newAsigMarca" name="newAsigMarca" readonly>
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row mb-0">
                                    <label for="newAsigContrat" class="col-form-label col-form-label-sm col-sm-2">Cto :</label>
                                    <div class="col-sm-10">
                                      <select class="form-control form-control-sm" id="newAsigContrat" name="newAsigContrat" style="width:100%" disabled>
                                        <option value="">Pertenece a...</option>
                                        
                                      </select>
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->

                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <!-- <div class="form-group row mb-0">

                                  </div> -->
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->

                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="card">
                                <div class="card-body">
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->

                                  <div class="form-group row">
                                    <label for="newAsigGerencia" class="col-form-label col-form-label-sm col-sm-3">Gerencia:</label>
                                    <div class="col-sm-9">
                                      <select class="form-control form-control-sm" id="newAsigGerencia" name="newAsigGerencia" style="width:100%">
                                        <option value="">Elije la gerencia</option>
                                        
                                      </select>
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row">
                                    <label for="newAsigArea" class="col-form-label col-form-label-sm col-sm-3">Area:</label>
                                    <div class="col-sm-9">
                                      <select class="form-control form-control-sm" id="newAsigArea" name="newAsigArea" style="width:100%">
                                        <option value="">Elije ubicacion</option>
                                       
                                      </select>
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row">
                                    <label for="newAsigElsu" class="col-form-label col-form-label-sm col-sm-3">ELSU</label>
                                    <div class="col-sm-5">
                                      <input type="text" class="form-control form-control-sm" id="newAsigElsu" name="newAsigElsu" placeholder="Ej: ELS0100 , Anexo">
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row">
                                    <label for="newAsigIP" class="col-form-label col-form-label-sm col-sm-3">IP</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" id="newAsigIP" name="newAsigIP">
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row mb-0">
                                    <label for="newAsigMAC" class="col-form-label col-form-label-sm col-sm-3">MAC</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" id="newAsigMAC" name="newAsigMAC">
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                </div>
                              </div>
                            </div>
                          </div>

                        </form>

                        <!-- final de FORMULARIO -->

                        <!-- 2da fila BOTONES  -->

                        <div class="row mt-3">

                          <div class="col-sm-12 text-center">

                            <button type="button" class="btn btn-sm btn-danger" id="btncleanAsig">
                              <i class="fas fa-broom mr-2 fa-sm"></i>Limpiar
                            </button>
                            <button type="button" class="btn btn-sm btn-info" id="btnaddAsig">
                              <i class="fas fa-plus mr-2 fa-sm"></i>Agregar
                            </button>

                          </div>

                        </div>

                        <!-- 3ra fila BOTONES  -->

                        <div class="row mt-3">
                          <div class="col-sm-12">
                            <div id="TablaAsignasTempLoad"></div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <!-- FINAL segundo PANEL -->

                </div>
                <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< fin content-->

              </div>
            </div>

            <!-- Content Row -->

          </div>
        </div>
        <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
        <!-- Footer -->
        <?php include('../include/footer.php'); ?>
        <!-- End of Footer -->
        <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
      </div>
      <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    </div>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    <?php include('../include/scripts.php'); ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tablaAsignas').load('../componentes/tablaAsignar.php');
        //$('#TableAsigTempLoad').load("../componentes/tableAssignmentTemp.php");
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#newAsigEmp').change(function() {
      			$.ajax({
      				url: '../procesos/empleado/readEmp.php',
      				type: 'POST',
      				data: "idemp=" + $('#newAsigEmp').val(),
      				success:function(r){
                var datos = $.parseJSON(r);

                $('#newAsigGerencia').val(datos['grempphp']);
      				}
      			})
  				});

          // para datos del Equipos
          $('#newAsigSerie').change(function() {
        			$.ajax({
        				url: '../../public/procesos/producto/readProducto.php',
        				type: 'POST',
        				data: "idprod=" + $('#newAsigSerie').val(),
        				success:function(r){
                  var datos = $.parseJSON(r);

                  $('#newAsigMarca').val(datos['ProdMarca']);
                  $('#newAsigModel').val(datos['ProdModel']);
                  $('#newAsigCateg').val(datos['ProdCtg']);
                  $('#newAsigContrat').val(datos['ProdPst']);
        				}
        			})
    				});

            // ---- Agregar equipo al Cesto --------
            $('#btnaddAsig').click(function() {
        			// vacios = validarFrmVacio('frmVentasProducto');
    					// if(vacios > 0){
    					// 	alertify.error("Debe llenar todos los campos!");
    					// 	return false;
    					// }
    					datos = $('#formNewAsignament').serialize();
    					$.ajax({
    						url: '../procesos/assignment/createAsigTemp.php',
    						type: 'POST',
    						data: datos,
    						success:function(r){
    							if (r==2) {
    								alertify.error('Ingrese un valor mayor');
    							}else if(r==1){
    								alertify.error('Ingrese un valor menor');
    							}else{
    								$('#TableAsigTempLoad').load("../componentes/tableAssignmentTemp.php");
    							}
    						}
    					})
    				});

            // --- Limpiar cesto de Equiupos -----------------------------
            $('#btncleanAsig').click(function() {
    		    	$.ajax({
    		    		url: '../procesos/assignment/deleteAsigTemp.php',
    		    		success:function(r){
    		    			$('#TableAsigTempLoad').load("../componentes/tableAssignmentTemp.php");
    		    		}
    		    	})
    		    });

      });
    </script>
    <script type="text/javascript">
      function RemoveArticle(index){
        $.ajax({
          url: '../procesos/assignment/deleteArticleTemp.php',
          type: 'POST',
          data: "ind=" + index,
          success:function(r){
            $('#TableAsigTempLoad').load("../componentes/tableAssignmentTemp.php");
            alertify.success("Se quito el Equipo");
          }
        })
      }
      function createAssig(){
        $.ajax({
    			url: '../procesos/assignment/createAsig.php',
    			success:function(r){
    				if (r > 0) {
    					$('#TableAsigTempLoad').load("../componentes/tableAssignmentTemp.php");
    					$('#formNewAsignament')[0].reset();
							$('#tableAsig').load('../componentes/tableAssignment.php');
    					alertify.alert("Se Asigno el Equipo");
    				}else if(r == 0){
    					alertify.alert("No hay equipos seleccionados");
    				}else{
    					alertify.error("No se pudo Asignar equipo");
    				}
    			}
    		})
      }
    </script>
  </body>
</html>
<?php
  }else{
    header('Location: ../../');
  }
?>

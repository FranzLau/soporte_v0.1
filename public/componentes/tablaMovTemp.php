<?php
	session_start();
	require '../../config/data.php';
  $obj = new data();
 ?>
 
 <div class="row">
	 <div class="col-sm-12">
		<div style="height: 250px; width: 100%;border: 1px solid #e0e0ef;" class="table-responsive">
			<table class="table table-sm table-bordered">
				<thead class="bg-light">
					<tr>
					<th scope="col" class="text-center">Codigo</th>
					<th scope="col" class="text-center">Cant.</th>
					<th scope="col">Descripción</th>
					<th scope="col" class="text-center">Marca</th>
					<th scope="col" class="text-center">Serie</th>
					<th scope="col">Observaciones</th>
					<th scope="col" class="text-center"><i class="fas fa-trash"></i></th>
					</tr>
				</thead>
				<tbody>
					<?php
					//$total = 0; //esta variable guarda los totales de las venta
					if(isset($_SESSION['EquipoAssigTemp'])):
					$i=0;
					foreach (@$_SESSION['EquipoAssigTemp'] as $key) {
						$d= explode("||", @$key);
					?>
					<tr>
					<td><?php echo $d[6]; ?></td>
					<td><?php echo $d[7]; ?></td>
					<td><?php echo $obj->nameCategory($d[8]); ?></td>
					<td><?php echo $d[4]; ?></td>
					<td><?php echo $d[3]; ?></td>
					<td class="text-center">
						<button class="btn btn-danger btn-sm" onclick="RemoveArticle('<?php echo $i; ?>')">
										<i class="fas fa-times"></i>
									</button>
					</td>
					</tr>
					<?php
					//$total = $total + $st;
					$i++;
					$cliente = $d[1];
								$ubicacion = $obj->nameArea($d[9]);
					}
					endif;
				?>
				</tbody>
			</table>
		</div>
	 </div>
 </div>
 <div class="row">
   
	 <div class="col-md-12">

		 <h6 class="font-weight-bold">Origen:</h6>
		 <p id="clienteResp"></p>
		 <h6 class="font-weight-bold">Destino:</h6>
		 <p id="clienteUbic"></p>
		 

	 </div>


 </div>
 <div class="row">
	 <div class="col-md-12 text-right">
		<button class="btn btn-primary btn-sm" onclick="createAssig()">
			<i class="fa-solid fa-floppy-disk mr-2"></i>Guardar Movimiento
		</button>
	 </div>
 </div>

 <!-- <div class="row mt-2" >
   <div class="col-sm-9">
     <div class="row">
       <div class="col-sm-4 text-center text-lg-left">
          <p>Responsable:</p>
				 <h5>Responsable:</h5>
       </div>
       <div class="col-sm-8 text-center text-lg-left">
          <p id="clienteResp"></p>
				 <h5 id="clienteResp"></h5>
       </div>
     </div>
     <div class="row">
       <div class="col-sm-6 text-center text-lg-left">
           <h2>Total:</h2>
       </div>
       <div class="col-sm-6 text-center text-lg-right">
           <h2>s/ <?php echo $total; ?></h2>
       </div>
     </div>
   </div>
   <div class="col-sm-3">
     <button class="btn btn-success w-100 h-100" onclick="createAssig()">
       <i class="fas fa-save"></i>
       Asignar
     </button>
   </div>
 </div> -->

 <!-- <div class="p-2 mt-3" style="border: 1px solid #e0e0ef; background-color:#F2F3F4;">

 </div> -->

<script>
  $(document).ready(function() {
    nombre = "<?php echo @$cliente ?>";
		ubica = "<?php echo @$ubicacion ?>";
    $('#clienteResp').text(nombre);
		$('#clienteUbic').text(ubica);
  });
</script>

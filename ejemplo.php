<html>
	<head>

	
	<script src="assets/js/jquery.js"></script>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css">
	<script src="assets/js/bootstrap.min.js"></script>

	</head>
	<script>
	
	$( document ).ready(function() {


	   
		   	//mandas llamar el php que te trae los datos y de esta manera llenas la tabla
		  	$.post("ejemplo_datos.php").done(function(data) {
		            data = JSON.parse(data);
		            for(var i=0; i<data.length;i++){
		            	$('#campos').append('<tr>'+
									          '<td>'+data[i].id+'</td>'+
									          '<td>'+data[i].nombre+'</td>'+
									          '<td>'+data[i].paterno+'</td>'+
									          '<td>'+data[i].materno+'</td>'+
									          '<td><button type="button" class="btn btn-primary btn-xs" id="verdetalle" valor="'+data[i].id+'">ver</button></td>'+
									      	'</tr>');
		            }
		    });

		  	//ahora cuando se le de click a un boton de la tabla, con el atributo valor(puede ser el que tu quieras), 
		  	//como ves lo llenamos con el ID que traemos de la tabla...
		    $(document).on('click', '#verdetalle', function(){
		    	var id = $(this).attr("valor");

		    	//ya que tenemos el ID aora solo hacemos otra consulta y le pasamos como parametro
		    	//el ID obtenido para que nos traiga todos los datos..
		    	//el primer parametro debe ser el mismo nombre con el que lo vas a resibir en el POST del PHP
		    	$.post("ejemplo_detalle.php",{id:id}).done(function(data) {
		            data = JSON.parse(data);
		            for(var i=0; i<data.length;i++){
		            	
		            	$('#nombre').val(data[i].nombre);
		            	$('#paterno').val(data[i].paterno);
		            	$('#materno').val(data[i].materno);
		            	$('#calle').val(data[i].calle);
		            	$('#colonia').val(data[i].colonia);
		            	$('#numero').val(data[i].numero);
		            	$('#edad').val(data[i].edad);
		            	$('#cel').val(data[i].cel);

		            	//una vez llenado los inputs mostramos el modal y vualaaa!!! todos los campos ya tienen su valor correspondiente
		            	$('#myModal').modal('show');
		            	
		            }
		    });
		    	
		    });


	});



	</script>
	<body>
		
		</br></br></br></br></br>
		<div class="container">
			<table class="table table-hover">
		      <thead>
		        <tr>
		          <th>ID</th>
		          <th>Nombre</th>
		          <th>Paterno</th>
		          <th>Materno</th>
		          <th>Detalles</th>
		        </tr>
		      </thead>
		      <tbody id="campos">

		   
		      </tbody>
		    </table>

		</div>
		

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Datos del Usuario</h4>
		      </div>
		      <div class="modal-body">
				
				Nombre: <input type="text" id="nombre"></br>
				Paterno: <input type="text" id="paterno"></br>
				Materno: <input type="text" id="materno"></br>
				Calle: <input type="text" id="calle"></br>
				Colonia: <input type="text" id="colonia"></br>
				Numero: <input type="text" id="numero"></br>
				Edad: <input type="text" id="edad"></br>
				Cel: <input type="text" id="cel"></br>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		        <button type="button" class="btn btn-primary">Aceptar</button>
		      </div>
		    </div>
		  </div>
		</div>
		
	</body>
</html>
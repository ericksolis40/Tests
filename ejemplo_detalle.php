<?php
		
		//recibimos el parametro desde la funcion que hace click
		$id = $_POST['id'];

		$connection = mysqli_connect("2222.2222.2222.2222", "ejemplo", "ejemplo", "ejemplo", "3306");      
		$result = mysqli_query($connection, "select * from alumnos where id=".$id) or die("Query fail: " . mysqli_error()); 
		$count=0; 

		//debemos guardar los datos en un arreglo
		while($row = mysqli_fetch_object($result)){

			$array = array(
				"id" => $row->id,
				"nombre" => $row->nombre,
				"paterno" => $row->paterno,
				"materno" => $row->materno,
				"calle" => $row->calle,
				"colonia" => $row->colonia,
				"numero" => $row->numero,
				"edad" => $row->edad,
				"cel" => $row->cel
				);
			$data[$count] = $array;
			$count++; 
		}

		//debemos imprimir los datos en formato json, ya que de esa manera es mas facil manipularlos
		echo json_encode($data);

?>
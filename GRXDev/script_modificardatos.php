<?php
include "BD.php";
//Extraemos los datos tanto del formulario como del action del propio form
$id = isset($_POST['id']) ? $_POST['id'] : '';
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
$nick = isset($_POST['nick']) ? $_POST['nick'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$contra = isset($_POST['contra']) ? $_POST['contra'] : '';
$ncontra = isset($_POST['ncontra']) ? $_POST['ncontra'] : '';
$actualcontra = isset($_POST['actualcontra']) ? $_POST['actualcontra'] : '';
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$ubicacion = isset($_POST['ubicacion']) ? $_POST['ubicacion'] : '';
$nif = isset($_POST['nif']) ? $_POST['nif'] : '';
//Realizamos la conexión con la base de datos
$datos = new BD("localhost", "root", "", "GRXDev");

//Realizamos un select para extraer la contraseña actual para comprobarla con el campo actualcontra
$busqueda = $datos->Query("select Contrasena from Usuarios where ID_Usuario='".$id."'");
$fila = mysql_fetch_array($busqueda);

//Primero comprobamos los dueños cuando los modifica el administrador
	if($tipo== 5 && $_COOKIE['tipo_usuario']==1 && !empty($nick) && !empty($nombre)){
		$result = $datos->Query("UPDATE usuarios SET Nombre_usuario='".$nick."',Nombre='".$nombre."' where ID_Usuario=".$id."");
		if ($result) {
			header('location: index.php?cat=perfil&ID_Usuario='.$id.'&exito=modi');
		}
	}
	//si algun campo obligatorio no esta relleno
	elseif($tipo== 5 && $_COOKIE['tipo_usuario']==1 && (empty($nick) || empty($nombre))){
		header('location: index.php?cat=perfil&ID_Usuario='.$id.'&fallo=hueco');//volvemos al perfil con un error
	}
	//Primero comprobamos los usuarios que no sean dueños cuando los modifica el administrador
	if($tipo!= 5 && $_COOKIE['tipo_usuario']==1 && !empty($nick) && !empty($nombre) && !empty($apellidos)&& !empty($ubicacion)){
		$result = $datos->Query("update usuarios set Nombre_usuario='".$nick."',Nombre='".$nombre."',Apellidos='".$apellidos."',Ubicacion='".$ubicacion."' where ID_Usuario=".$id."");
		if ($result) {
			header('location: index.php?cat=perfil&ID_Usuario='.$id.'&exito=modi');
		}
	}
	//si algun campo obligatorio no esta relleno
	elseif($tipo!= 5 && $_COOKIE['tipo_usuario']==1 && (empty($nick) || empty($nombre) || empty($apellidos) || empty($ubicacion))){
			header('location: index.php?cat=perfil&ID_Usuario='.$id.'&fallo=hueco');//volvemos al perfil con un error
	}
	
	//Primero comprobamos los usuarios que no sean dueños cuando los modifica el propio usuario
	if($tipo!= 5 && $_COOKIE['tipo_usuario']!=1 && !empty($email) && !empty($nombre) && !empty($apellidos)&& !empty($ubicacion)&& !empty($fecha)&& !empty($sexo) ){
		if($fila['Contrasena']!=$actualcontra && (!empty($contra) || !empty($ncontra))){
			header('location: index.php?cat=perfil&ID_Usuario='.$id.'&fallo=actual');//volvemos al perfil con un error
		}
		
		elseif( !empty($contra)&& !empty($ncontra) && $contra==$ncontra){ //si la contraseñas estan rellena y coinciden
			$result = $datos->Query("update usuarios set Direccion_correo='".$email."',Nombre='".$nombre."',Contrasena='".$contra."',Apellidos='".$apellidos."',Ubicacion='".$ubicacion."' ,Fecha_nacimiento='".$fecha."' ,Sexo='".$sexo."' where ID_Usuario=".$id."");
		}
		elseif(!empty($contra) && !empty($ncontra) && $contra!=$ncontra){ //si la contraseñas estan rellena pero no coinciden
			header('location: index.php?cat=perfil&ID_Usuario='.$id.'&fallo=contra');//volvemos al perfil con un error
		}
		elseif(empty($contra) && empty($ncontra)){ //si la contraseñas no estan rellenas
			$result = $datos->Query("update usuarios set Direccion_correo='".$email."',Nombre='".$nombre."',Apellidos='".$apellidos."',Ubicacion='".$ubicacion."' ,Fecha_nacimiento='".$fecha."' ,Sexo='".$sexo."' where ID_Usuario=".$id."");
		}
		elseif(empty($contra) || empty($ncontra)){//si una de las contraseñas esta rellena y la otra no
			header('location: index.php?cat=perfil&ID_Usuario='.$id.'&fallo=hueco');//volvemos al perfil con un error
		}
		if ($result) {
			header('location: index.php?cat=perfil&ID_Usuario='.$id.'&exito=modi');
		}
	}
	elseif($tipo!= 5 && $_COOKIE['tipo_usuario']!=1 && (empty($email) || empty($nombre) || empty($apellidos) || empty($ubicacion) || empty($fecha) || empty($sexo) )){
		header('location: index.php?cat=perfil&ID_Usuario='.$id.'&fallo=hueco');//volvemos al perfil con un error
	}

	//Primero comprobamos los usuarios que no sean dueños cuando los modifica el propio dueño
	if($tipo== 5 && $_COOKIE['tipo_usuario']!=1 && !empty($email) && !empty($nombre) && !empty($nif)){
		if($fila['Contrasena']!=$actualcontra && (!empty($contra) || !empty($ncontra))){
			header('location: index.php?cat=perfil&ID_Usuario='.$id.'&fallo=actual');//volvemos al perfil con un error
		}
	
	elseif( !empty($contra)&& !empty($ncontra) && $contra==$ncontra){ //si la contraseñas estan rellena y coinciden
		$result = $datos->Query("update usuarios set Direccion_correo='".$email."',Nombre='".$nombre."',Contrasena='".$contra."',NIF='".$nif."' where ID_Usuario=".$id."");
	}
	elseif(!empty($contra) && !empty($ncontra) && $contra!=$ncontra){ //si la contraseñas estan rellena pero no coinciden
		header('location: index.php?cat=perfil&ID_Usuario='.$id.'&fallo=contra');//volvemos al perfil con un error
	}
	elseif(empty($contra) && empty($ncontra)){ //si la contraseñas no estan rellenas
		$result = $datos->Query("update usuarios set Direccion_correo='".$email."',Nombre='".$nombre."',NIF='".$nif."' where ID_Usuario=".$id."");
	}
	elseif(empty($contra) || empty($ncontra)){ //si una de las contraseñas esta rellena y la otra no
		header('location: index.php?cat=perfil&ID_Usuario='.$id.'&fallo=hueco');//volvemos al perfil con un error
	}
	if ($result) {
		header('location: index.php?cat=perfil&ID_Usuario='.$id.'&exito=modi');
		}
	}
	elseif($tipo== 5 && $_COOKIE['tipo_usuario']!=1 && (empty($email) || empty($nombre) || empty($nif))){
		header('location: index.php?cat=perfil&ID_Usuario='.$id.'&fallo=hueco');//volvemos al perfil con un error
	}
	


?>
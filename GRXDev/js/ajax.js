function objetoAjax(){

	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function MostrarConsulta(){
	divResultado = document.getElementById('resultado_busqueda');
	sexo = document.getElementById('sexo').value;
	nick = document.getElementById('nick').value;
	email = document.getElementById('email').value;
	nombre = document.getElementById('nombre').value;
	apellidos = document.getElementById('apellidos').value;
	fecha = document.getElementById('fecha').value;
	ubicacion = document.getElementById('ubicacion').value;
	
	ajax=objetoAjax();
	ajax.open("GET", "script_consultabuscador.php?sexo="+sexo+"&nick="+nick+"&email="+email+"&nombre="+nombre+"&apellidos="+apellidos+"&fecha="+fecha+"&ubicacion="+ubicacion);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null);
}
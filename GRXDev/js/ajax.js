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

function MostrarConsultadueno(){
	divResultado = document.getElementById('resultado_busqueda');
	nif = document.getElementById('nif').value;
	nick = document.getElementById('nick').value;
	email = document.getElementById('email').value;
	nombre = document.getElementById('nombre').value;
	validado = document.getElementById('validado').value;
	
	ajax=objetoAjax();
	ajax.open("GET", "script_consultabuscadordueno.php?nif="+nif+"&nick="+nick+"&email="+email+"&nombre="+nombre+"&validado="+validado);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null);
}
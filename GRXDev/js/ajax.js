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
function MostrarConsultalojamiento(){
	divResultado = document.getElementById('resultado_busqueda');
	nombre = document.getElementById('nombre').value;
	ubicacion = document.getElementById('ubicacion').value;
	tipo = document.getElementById('tipo').value;
	
	if(document.getElementById('piscina').checked){
		piscina = document.getElementById('piscina').value=1;
	}
	else{
		piscina = document.getElementById('piscina').value="";
	}
	if(document.getElementById('wifi').checked){
		wifi = document.getElementById('wifi').value=2;
	}
	else{
		wifi = document.getElementById('wifi').value="";
	}
	if(document.getElementById('spa').checked){
		spa = document.getElementById('spa').value=4;
	}
	else{
		spa = document.getElementById('spa').value="";
	}
	if(document.getElementById('desayuno').checked){
		desayuno = document.getElementById('desayuno').value=5;
	}
	else{
		desayuno = document.getElementById('desayuno').value="";
	}
	if(document.getElementById('desayuno').checked){
		desayuno = document.getElementById('desayuno').value=5;
	}
	else{
		desayuno = document.getElementById('desayuno').value="";
	}
	nhabitacion = document.getElementById('nhabitacion').value;
	
	if(document.getElementById('cafeteria').checked){
		cafeteria = document.getElementById('cafeteria').value=8;
	}
	else{
		cafeteria = document.getElementById('cafeteria').value="";
	}
	if(document.getElementById('discoteca').checked){
		discoteca = document.getElementById('discoteca').value=13;
	}
	else{
		discoteca = document.getElementById('discoteca').value="";
	}
	if(document.getElementById('pista').checked){
		pista = document.getElementById('pista').value=14;
	}
	else{
		pista = document.getElementById('pista').value="";
	}
	if(document.getElementById('wifih').checked){
		wifih = document.getElementById('wifih').value=3;
	}
	else{
		wifih = document.getElementById('wifih').value="";
	}
	if(document.getElementById('tele').checked){
		tele = document.getElementById('tele').value=10;
	}
	else{
		tele = document.getElementById('tele').value="";
	}
	ncamas = document.getElementById('ncamas').value;
	bano = document.getElementById('bano').value;
	if(document.getElementById('caja').checked){
		caja = document.getElementById('caja').value=11;
	}
	else{
		caja = document.getElementById('caja').value="";
	}
	if(document.getElementById('armario').checked){
		armario = document.getElementById('armario').value=12;
	}
	else{
		armario = document.getElementById('armario').value="";
	}
	
	ajax=objetoAjax();
	ajax.open("GET", "script_consultalojamiento.php?nombre="+nombre+"&ubicacion="+ubicacion+"&tipo="+tipo+"&piscina="+piscina+"&wifi="+wifi+"&spa="+spa+"&desayuno="+desayuno+"&nhabitacion="+nhabitacion+"&cafeteria="+cafeteria+"&discoteca="+discoteca+"&pista="+pista+"&wifih="+wifih+"&ncamas="+ncamas+"&bano="+bano+"&tele="+tele+"&caja="+caja+"&armario="+armario);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null);
}
function MostrarConsultahabitacion(){
	divResultado = document.getElementById('resultado_busqueda');
	wifi = document.getElementById('wifi').value;
	ncamas = document.getElementById('ncamas').value;
	bano = document.getElementById('bano').value;
	tele = document.getElementById('tele').value;
	caja = document.getElementById('caja').value;
	armario = document.getElementById('armario').value;
	
	
	/*spa = document.getElementById('spa').value;
	desayuno = document.getElementById('desayuno').value;
	nhabitacion = document.getElementById('nhabitacion').value;
	cafeteria = document.getElementById('cafeteria').value;
	discoteca = document.getElementById('discoteca').value;
	pista = document.getElementById('pista').value;*/
	
	ajax=objetoAjax();
	ajax.open("GET", "script_consultahabitacion.php?wifi="+wifi+"&ncamas="+ncamas+"&bano="+bano+"&tele="+tele+"&caja="+caja+"&armario="+armario);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null);
}
function MostrarConsultaInforme(){
	divResultado = document.getElementById('resultado_busqueda');
	tipo = document.getElementById('tipo').value;
	
	/*spa = document.getElementById('spa').value;
	desayuno = document.getElementById('desayuno').value;
	nhabitacion = document.getElementById('nhabitacion').value;
	cafeteria = document.getElementById('cafeteria').value;
	discoteca = document.getElementById('discoteca').value;
	pista = document.getElementById('pista').value;*/
	
	ajax=objetoAjax();
	ajax.open("GET", "script_informenovali.php?tipo="+tipo);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null);
}
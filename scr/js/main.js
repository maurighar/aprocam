function mostrar_fecha( ) {
	var cl = document.getElementById("fecha");
	cl.innerHTML = new Date( );  
}

function inicializar() { 
	mostrar_fecha();// muestra fecha al cargar
					// actualiza cada segundo
	setInterval(mostrar_fecha, 1000); 
}
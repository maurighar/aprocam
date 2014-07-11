function mostrar_fecha( ) {
	var cl = document.getElementById("fecha");
	cl.innerHTML = new Date( );
}

function inicializar() {
	mostrar_fecha();// muestra fecha al cargar
					// actualiza cada segundo
	setInterval(mostrar_fecha, 1000);
}

function notificar(mensaje,opciones) {
	if (Notification.permission === "granted") {
		var notification = new Notification(mensaje,opciones);
	}
	else if (Notification.permission !== 'denied') {
		Notification.requestPermission(function (permission) {
			if(!('permission' in Notification)) {
				Notification.permission = permission;
			}
			if (permission === "granted") {
				var notification = new Notification(mensaje,opciones);
			}
		});
	}
}
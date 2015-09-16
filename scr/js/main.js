function mostrar_fecha( ) {
	var cl = document.getElementById("fecha");
	//cl.innerHTML = new Date( );
	cl.innerHTML = moment().format("DD/MM/YYYY HH:mm:ss") + ' (' + moment().week() + ')';
}

function inicializar() {
	mostrar_fecha();// muestra fecha al cargar
					// actualiza cada segundo
	setInterval(mostrar_fecha, 1000);
}

function validaCuit(sCUIT) {
	var aMult = '5432765432';
	var aMult = aMult.split('');

	if (sCUIT && sCUIT.length == 11) {
		aCUIT = sCUIT.split('');
		var iResult = 0;
		for(i = 0; i <= 9; i++)
		{
			iResult += aCUIT[i] * aMult[i];
		}
		iResult = (iResult % 11);
		iResult = 11 - iResult;

		if (iResult == 11) iResult = 0;
		if (iResult == 10) iResult = 9;

		if (iResult == aCUIT[10]) {
			return true;
		}
	}
	return false;
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

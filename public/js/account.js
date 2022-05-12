'use strict';
init();

function init() {
    const avui = new Date();

    let data_naixement = document.getElementById('data_naixement');

    data_naixement.setAttribute("max", calcularData(avui, 18));


}

function calcularData (data, anys) {
	let dataFormat = data.getFullYear()-anys;
 
	if (data.getMonth()+1 >= 10) {
		dataFormat += "-"+(data.getMonth() + 1);
	} else {
		dataFormat += "-0"+(data.getMonth() + 1);
	}

	if (data.getDate() >= 10) {
		dataFormat += "-"+data.getDate();
	} else {
		dataFormat += "-0"+data.getDate();
	}

	return dataFormat;
}
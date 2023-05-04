
//TODO MAYUSCULA
function may(e){
	e.value = e.value.toUpperCase();
}
//SOLO NÚMEROS
function valideKey(evt){
	var code = (evt.which) ? evt.which : evt.keyCode;
	if(code==8) { // backspace.
		return true;
	}else if(code>=48 && code<=57) { // is a number.
		return true;
	}else{ // other keys.
		return false;
	}
}

//CRUD BANCO
	//GUARDAR BANCO
	function guardar_b(){
		var cedula = $("#cedula").val();
		var nombre = $("#nombre").val();
        var id_und_adscripcion = $("#id_und_adscripcion").val();
        var id_cargo = $("#id_cargo").val();

		if (cedula == '') {
			document.getElementById("cedula").focus();
		}else if(nombre == ''){
			document.getElementById("nombre").focus();
		}else if(id_und_adscripcion == ''){
			document.getElementById("id_und_adscripcion").focus();
		}
         else if(id_cargo == ''){
        document.getElementById("id_cargo").focus();
         }
        else {
			event.preventDefault();
			swal.fire({
				title: '¿Registrar?',
				text: '¿Esta seguro de Guardar?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				cancelButtonText: 'Cancelar',
				confirmButtonText: '¡Si, guardar!'
			}).then((result) => {
				if (result.value == true) {
					event.preventDefault();
					var datos = new FormData($("#guardar_ba")[0]);
					//var base_url =window.location.origin+'/caribia/index.php/Comensales/registrar_b';
					var base_url = '/index.php/Comensales/registrar_b';
					$.ajax({
						url:base_url,
						method: 'POST',
						data: datos,
						contentType: false,
						processData: false,
						success: function(response){
							if(response != '') {
								swal.fire({
									title: 'Registro Exitoso',
									type: 'success',
									showCancelButton: false,
									confirmButtonColor: '#3085d6',
									confirmButtonText: 'Ok'
								}).then((result) => {
									if (result.value == true){
										location.reload();
									}
								});
							}
						}
					})
				}
			});
		}
	}
	//BUSCAR BANCO PARA EDITAR
	function modal_ver(id){
		var id_exonerado = id;
		//var base_url = window.location.origin+'/asnc/index.php/Certificaciones/consulta_b';
		var base_url = '/index.php/Certificacion/consulta_b';
		$.ajax({
			url: base_url,
			method:'post',
			data: {id_exonerado: id_exonerado},
			dataType:'json',

			success: function(response){
				$('#id').val(response['id_exonerado']);
				$('#cod_banco_edit').val(response['rif']);
				$('#nombre_banco_edit').val(response['descripcion']);
			}
		});
	}
	//EDITAR BANCO
	function editar_b(){
		var id_banco = $("#id").val();
		var codigo_b = $("#cod_banco_edit").val();
		var nombre_b = $("#nombre_banco_edit").val();

		var datos = new FormData($("#editar")[0]);
		if (codigo_b == '') {
			document.getElementById("codigo_b").focus();
		}else if(nombre_b == ''){
			document.getElementById("nombre_b").focus();
		}else {
			event.preventDefault();
			swal.fire({
				title: 'Modificar?',
				text: '¿Esta seguro de Modificar este registro?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				cancelButtonText: 'Cancelar',
				confirmButtonText: '¡Si, guardar!'
			}).then((result) => {
				if (result.value == true) {
					event.preventDefault();
					var datos = new FormData($("#editar")[0]);
					//var base_urls =window.location.origin+'/asnc/index.php/Certificaciones/editar_b';
					var base_urls = '/index.php/Certificacion/editar_b';
					$.ajax({
						url: base_urls,
						method:'post',
						data: {id_banco: id_banco,
							codigo_b: codigo_b,
							nombre_b: nombre_b
						},
					dataType:'json',
						success: function(response){
							if(response != '') {
								swal.fire({
									title: 'Modificación Exitosa',
									type: 'success',
									showCancelButton: false,
									confirmButtonColor: '#3085d6',
									confirmButtonText: 'Ok'
								}).then((result) => {
									if (result.value == true){
										location.reload();
									}
								});
							}
						}
					})
				}
			});
		}
	}
	//ELIMINAR
	function eliminar_b(id){
		event.preventDefault();
		swal.fire({
			title: '¿Seguro que desea Deshabilitar el Contratista?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancelar',
			confirmButtonText: '¡Si, guardar!'
		}).then((result) => {
			if (result.value == true) {
				var id_exonerado = id
				//var base_url =window.location.origin+'/asnc/index.php/Certificaciones/eliminar_b';
				var base_url = '/index.php/Certificacion/eliminar_b';

				$.ajax({
					url:base_url,
					method: 'post',
					data:{
						id_exonerado: id_exonerado
					},
					dataType: 'json',
					success: function(response){
						if(response == 1) {
							swal.fire({
								title: 'Deshabilitar Exitosa',
								type: 'success',
								showCancelButton: false,
								confirmButtonColor: '#3085d6',
								confirmButtonText: 'Ok'
							}).then((result) => {
								if (result.value == true) {
									location.reload();
								}
							});
						}
					}
				})
			}
		});
	}
//////////////////////////////////////////////cargos
//CRUD cargo
	function registrar_carg(){
		var tarifa = $("#tarifa").val();
		var nombre = $("#nombre").val();
        

		if (tarifa == '') {
			document.getElementById("tarifa").focus();
		}else if(nombre == ''){
			document.getElementById("nombre").focus();
		}         
        else {
			event.preventDefault();
			swal.fire({
				title: '¿Registrar?',
				text: '¿Esta seguro de Guardar?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				cancelButtonText: 'Cancelar',
				confirmButtonText: '¡Si, guardar!'
			}).then((result) => {
				if (result.value == true) {
					event.preventDefault();
					var datos = new FormData($("#guardar_cargo")[0]);
					//var base_url =window.location.origin+'/caribia/index.php/Comensales/registrar_carg';
					var base_url = '/index.php/Comensales/registrar_carg';
					$.ajax({
						url:base_url,
						method: 'POST',
						data: datos,
						contentType: false,
						processData: false,
						success: function(response){
							if(response != '') {
								swal.fire({
									title: 'Registro Exitoso',
									type: 'success',
									showCancelButton: false,
									confirmButtonColor: '#3085d6',
									confirmButtonText: 'Ok'
								}).then((result) => {
									if (result.value == true){
										location.reload();
									}
								});
							}
						}
					})
				}
			});
		}
	}
	//BUSCAR BANCO PARA EDITAR
	function modal_ver_cargo(id){
		var id_exonerado = id;
		//var base_url =window.location.origin+'/caribia/index.php/Comensales/consulta_cargos';
		var base_url = '/index.php/Comensales/consulta_cargos';
		$.ajax({
			url: base_url,
			method:'post',
			data: {id_exonerado: id_exonerado},
			dataType:'json',

			success: function(response){
				$('#id').val(response['id_exonerado']);
				$('#cod_banco_edit').val(response['rif']);
				$('#nombre_banco_edit').val(response['descripcion']);
			}
		});
	}
	//EDITAR BANCO
	function editar_cargo(){
		var id_banco = $("#id").val();
		var codigo_b = $("#cod_banco_edit").val();
		var nombre_b = $("#nombre_banco_edit").val();

		var datos = new FormData($("#editar")[0]);
		if (codigo_b == '') {
			document.getElementById("codigo_b").focus();
		}else if(nombre_b == ''){
			document.getElementById("nombre_b").focus();
		}else {
			event.preventDefault();
			swal.fire({
				title: 'Modificar?',
				text: '¿Esta seguro de Modificar este registro?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				cancelButtonText: 'Cancelar',
				confirmButtonText: '¡Si, guardar!'
			}).then((result) => {
				if (result.value == true) {
					event.preventDefault();
					var datos = new FormData($("#editar")[0]);
					//var base_url =window.location.origin+'/caribia/index.php/Comensales/editar_cargos';
					var base_url = '/index.php/Comensales/editar_cargos';
					$.ajax({
						url: base_urls,
						method:'post',
						data: {id_banco: id_banco,
							codigo_b: codigo_b,
							nombre_b: nombre_b
						},
					dataType:'json',
						success: function(response){
							if(response != '') {
								swal.fire({
									title: 'Modificación Exitosa',
									type: 'success',
									showCancelButton: false,
									confirmButtonColor: '#3085d6',
									confirmButtonText: 'Ok'
								}).then((result) => {
									if (result.value == true){
										location.reload();
									}
								});
							}
						}
					})
				}
			});
		}
	}
	//ELIMINAR
	function eliminar_cargo(id){
		event.preventDefault();
		swal.fire({
			title: '¿Seguro que desea Deshabilitar el Contratista?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancelar',
			confirmButtonText: '¡Si, guardar!'
		}).then((result) => {
			if (result.value == true) {
				var id_exonerado = id
				//var base_url =window.location.origin+'/caribia/index.php/Comensales/eliminar_cargos';
					var base_url = '/index.php/Comensales/eliminar_cargos';
				$.ajax({
					url:base_url,
					method: 'post',
					data:{
						id_exonerado: id_exonerado
					},
					dataType: 'json',
					success: function(response){
						if(response == 1) {
							swal.fire({
								title: 'Deshabilitar Exitosa',
								type: 'success',
								showCancelButton: false,
								confirmButtonColor: '#3085d6',
								confirmButtonText: 'Ok'
							}).then((result) => {
								if (result.value == true) {
									location.reload();
								}
							});
						}
					}
				})
			}
		});
	}
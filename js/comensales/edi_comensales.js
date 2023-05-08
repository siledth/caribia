//BUSCAR BANCO PARA EDITAR
function modal_ver_comensal(id){
    var id_comensales = id;
    var base_url =window.location.origin+'/caribia/index.php/Comensales/edi';
    //var base_url = '/index.php/Comensales/consulta_cargos';
    $.ajax({
        url: base_url,
        method:'post',
        data: {id_comensales: id_comensales},
        dataType:'json',

        success: function(response){
            $('#id').val(response['id_comensales']);
            $('#nombre_edit').val(response['nombre']);
            $('#cedula_edit').val(response['cedula']);
            $('#id_cargo_edit').val(response['id_cargo']);
            $('#id_und_adscripcion_edit').val(response['id_und_adscripcion']);

        }
    });
}
function editar_comanesales() {
    var id_comensales = $("#id").val();
    var cedula = $("#cedula_edit").val();
    var nombre = $("#nombre_edit").val();
    var id_cargo = $("#id_cargo_edit").val();
    var id_und_adscripcion = $("#id_und_adscripcion_edit").val();

    var datos = new FormData($("#editar")[0]);
    if (id_comensales == '') {
        document.getElementById("id_comensales").focus();
    } else if (cedula == '') {
        document.getElementById("cedula_edit").focus();
    } else {
        event.preventDefault();
        swal.fire({
            title: 'Autorizar?',
            text: '¿Esta seguro de Esta Autorización?',
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
                var base_urls = window.location.origin + '/caribia/index.php/Comensales/editar_comanesales';
                //var base_urls = '/index.php/Certificacion/editar_b';
                $.ajax({
                    url: base_urls,
                    method: 'post',
                    data: {
                        id_comensales: id_comensales,
                        cedula: cedula,
                        nombre: nombre,
                        id_cargo: id_cargo,
                        id_und_adscripcion: id_und_adscripcion

                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response != '') {
                            swal.fire({
                                title: 'Modificación Exitosa',
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
}
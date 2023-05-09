// function modal_ver(id) {
//     var autorizado = id;
//     var base_url = window.location.origin + '/caribia/index.php/Comensales/consulta_autoriza';
//     // var base_url = '/index.php/Certificacion/consulta_b';
//     $.ajax({
//         url: base_url,
//         method: 'post',
//         data: { autorizado: autorizado },
//         dataType: 'json',

//         success: function (response) {
//             $('#id').val(response['cedula']);
//             $('#edt_autorizado').val(response['autorizado']);

//         }
//     });
// }
// esto es facilitador
function modal_ver(id){
    var id_comensales = id;
    var base_url = window.location.origin + '/caribia/index.php/Comensales/consulta_autoriza';
   // var base_url = '/index.php/Certificacion/consulta_facilitadores';
    $.ajax({
        url: base_url,
        method:'post',
        data: {id_comensales: id_comensales},
        dataType:'json',

        success: function(response){
            $('#id_comensales').val(response['id_comensales']);
            $('#cedula').val(response['cedula']);
            $('#edt_autorizado').val(response['autorizado']);
            $('#nombre').val(response['nombre']);
            
          
           
        }
    });
}


function editar_b() {
    var cedula = $("#id_comensales").val();
    var autorizado = $("#edt_autorizado").val();
    var observacion = $("#Observación_edit").val();

    var datos = new FormData($("#editar")[0]);
    if (cedula == '') {
        document.getElementById("cedula").focus();
    } else if (autorizado == '') {
        document.getElementById("edt_autorizado").focus();
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
                var base_urls = window.location.origin + '/caribia/index.php/Comensales/editar_autoriza';
                //var base_urls = '/index.php/Certificacion/editar_b';
                $.ajax({
                    url: base_urls,
                    method: 'post',
                    data: {
                        cedula: cedula,
                        autorizado: autorizado,
                        observacion: observacion
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
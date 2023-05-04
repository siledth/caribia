$('#comensales').on('select2:select', function (e) {
    var comensales = e.params.data['id'];
    //var base_url =window.location.origin+'/caribia/index.php/Comedor/listar_info';
    var base_url = '/index.php/Comedor/listar_info';
//llenan los datos 
    $.ajax({
        url: base_url,
        method:'post',
        data: {comensales: comensales},
        dataType:'json',

        success: function(response){
            $("#id_und_adscripcion").val(response['descrp']);
            $("#id_cargo").val(response['cargo']);
            $("#id_cargos").val(response['id_cargo']);
            $("#tarifa").val(response['tarifa']);
            $("#autorizado").val(response['autorizado']);
            
           
       var tipo_pago = $("#id_cargos").val();
                if (tipo_pago == "1") {
                    $("#invitados").show();
                    var tarifa = $('#tarifa').val();
                    var comer = 1;
                  
                            var calculo = (Number(comer)*Number(tarifa));
                            var totl = parseFloat(calculo).toFixed(2);
                            var total = Intl.NumberFormat("de-DE").format(totl);
                            $('#total').val(total); 
                    
                } else if (tipo_pago == "4") { var t = 0;
                    $('#total').val(t);  }
                        else {
                                $("#invitados").hide();
                                
                            }

                var autorizado = $("#autorizado").val();
                if (autorizado > "0") {
                    $("#autorizados").show();
                    var autorizado = $('#autorizado').val();
                    var comer = 1;
                        
                   
                    var calculo =  (Number(comer)+Number(autorizado));
                    var totl = parseFloat(calculo).toFixed(2);
                    var total = Intl.NumberFormat("de-DE").format(totl);
                    $('#total').val(total);  


                    
                } else {
                    $("#autorizados").hide();
                }
           
                
                
           
        }
    });
});


function calcular_bienes(){
    var invitado = $('#invitado').val();
    var tarifa = $('#tarifa').val();
    var total = $('#total').val();
    var comer = 1;
      

        var calculo = (Number(comer)+ Number(invitado))*tarifa;
        var totl = parseFloat(calculo).toFixed(2);
        var total = Intl.NumberFormat("de-DE").format(totl);
        $('#total').val(total);
   
}


function guardar_b(){
    var id_comensales = $("#comensales").val();
    var id_und_adscripcion = $("#id_und_adscripcion").val();
    var cargo = $("#id_cargo").val();
    var tarifa = $("#tarifa").val();
    var total = $("#total").val();
    var invitado = $("#invitado").val();
    var autorizado = $("#autorizado").val();
    var fecha = $("#fecha").val();

    if (id_comensales == '') {
        document.getElementById("comensales").focus();
    }else if(id_und_adscripcion == ''){
        document.getElementById("id_und_adscripcion").focus();
    }
     else if(cargo == ''){
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
                //var base_url =window.location.origin+'/caribia/index.php/Comedor/registrar_comedor';
                var base_url = '/index.php/Comedor/registrar_comedor';
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
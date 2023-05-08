$('#comensales').on('select2:select', function (e) {
    var comensales = e.params.data['id'];
    var base_url = window.location.origin + '/caribia/index.php/Comedor/listar_info';
    //var base_url = '/index.php/Comedor/listar_info';
    //llenan los datos 
    $.ajax({
        url: base_url,
        method: 'post',
        data: { comensales: comensales },
        dataType: 'json',

        success: function (response) {
            $("#id_und_adscripcion").val(response['descrp']);
            $("#id_cargo").val(response['cargo']);
            $("#id_cargos").val(response['id_cargo']);
            $("#tarifa").val(response['tarifa']);
            $("#autorizado").val(response['autorizado']);

            var cargo = $("#id_cargos").val();
            if (cargo == "1") {
                $("#invitados").show();
                var tarifa = $('#tarifa').val();
                var comer = 1;

                var calculo = (Number(comer) * Number(tarifa));
                var totl = parseFloat(calculo).toFixed(2);
                var total = Intl.NumberFormat("de-DE").format(totl);
                $('#total').val(total);
                

                $('#total_comida').val(comer);

            } else if (cargo == "4") {
                $("#invitados").hide();
                var total_comi = $('#autorizado').val();;
                var comer = 1;

                var comida = (Number(comer) + Number(total_comi));
                var tot1 = parseFloat(comida).toFixed(2);
                var total2 = Intl.NumberFormat("de-DE").format(tot1);
                $('#total_comida').val(total2);
                var costo1 = 0;

                $('#total').val(costo1);
            }
            else {

                $("#autorizados").show();
                $("#invitados").hide();
                var autorizado = $("#autorizado").val();
               
                var comer = 1;

                var autorizad = (Number(comer) + Number(autorizado));
                var totau = parseFloat(autorizad).toFixed(2);
                var totalau2 = Intl.NumberFormat("de-DE").format(totau);
                $('#total_comida').val(totalau2);
                
                var tarifa = $('#tarifa').val();
                var calculo = (Number(totalau2)* Number(tarifa));
                var totl = parseFloat(calculo).toFixed(2);
                var total = Intl.NumberFormat("de-DE").format(totl);
                $('#total').val(total);

            }

            // var autorizado = $("#autorizado").val();
            // if (autorizado > "0") {



            //     $("#autorizados").show();
            //     var autorizado = $('#autorizado').val();
            //     var comer = 1;


            //     var calculo =  (Number(comer)+Number(autorizado));
            //     var totl = parseFloat(calculo).toFixed(2);
            //     var total = Intl.NumberFormat("de-DE").format(totl);
            //     $('#total').val(total);  



            // } else {
            //     $("#autorizados").hide();
            // }




        }
    });
});


function calcular_bienes(){
    var invitado = $('#invitado').val();
    var tarifa = $('#tarifa').val();
    var total = $('#total').val();
    var comer = 1;
    var cargo = $("#id_cargos").val();
    if (cargo == "1") {
        $("#invitados").show();
        var tarifa = $('#tarifa').val();
        var comer = 1;

        var calculo = (Number(comer)+ Number(invitado))*tarifa;
        var totl = parseFloat(calculo).toFixed(2);
        var total = Intl.NumberFormat("de-DE").format(totl);
        $('#total').val(total);

        var comida_entregada = (Number(comer) + Number(invitado));
                var totau = parseFloat(comida_entregada).toFixed(2);
                var total_comida = Intl.NumberFormat("de-DE").format(totau);
                $('#total_comida').val(total_comida);

    }




       

}


function guardar_b() {
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
    } else if (id_und_adscripcion == '') {
        document.getElementById("id_und_adscripcion").focus();
    }
    else if (cargo == '') {
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
                var base_url = window.location.origin + '/caribia/index.php/Comedor/registrar_comedor';
                //var base_url = '/index.php/Comedor/registrar_comedor';
                $.ajax({
                    url: base_url,
                    method: 'POST',
                    data: datos,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response != '') {
                            swal.fire({
                                title: 'Registro Exitoso',
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
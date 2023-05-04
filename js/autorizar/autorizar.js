$('#comensales').on('select2:select', function (e) {
    var comensales = e.params.data['id'];
    var base_url =window.location.origin+'/caribia/index.php/Comedor/autorizar';
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
            
  
                
                
           
        }
    });
});
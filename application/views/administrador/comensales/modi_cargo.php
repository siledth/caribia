<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-1 mb-3">
                <a class="btn btn-circle waves-effect  waves-circle waves-float btn-primary"
                    href="javascript:history.back()"> Volver</a>
            </div>
       
        </div>
        <div class="row" id="imp1">
            <div class="panel panel-inverse">
                <div class="panel-body">
                  <form action="<?=base_url()?>index.php/Comensales/modi_comensales1" class="form-horizontal"
                        data-parsley-validate="true" name="demo-form" method="POST">
                    <div class="row">
                        
                        <div class="form-group col-1">

                        </div>
                        <div class="col-1"></div>
                        <div class="col-10 mt-2">
                            <div class="card card-outline-danger text-center bg-white">
                           
                            </div>
                        </div>

                        <?php foreach($ver_comensales as $ver):?><?php endforeach;?>
                            
                           
                            <div class="form-group mt-3 col-6">
                                <label>Nombre y Apellido</label><br>
                                <input type="hidden" id="id_comensales" name="id_comensales" value="<?=$ver['id_comensales']?>" class="form-control">
                                <input type="text" id="nombre" name="nombre" value="<?=$ver['nombre']?>" class="form-control">
                            </div>
                            <div class="form-group mt-3 col-3">
                                <label>Cedula</label><br>
                                <input type="text" id="cedula" name="cedula" value="<?=$ver['cedula']?>" class="form-control">
                            </div>
                            <div class="col-6 mt-3 form-group" >
                                 <label>Cargo<b style="color:red">*</b></label><br>
                                <select style="width: 100%;"  name="id_cargo" id="id_cargo" class="default-select2 form-control">
                                    <option value="<?=$ver['id_cargo']?>"><?=$ver['cargo']?></option>
                                    <?php foreach ($cargo as $data): ?>
                                    <option value="<?=$data['id_cargo']?>"><?=$data['nombre']?></option>
                                    <?php endforeach; ?>
                                </select>
                                
                            </div>
                            <div class="col-6 mt-3 form-group" >
                                 <label>Unidad Adscripcion<b style="color:red">*</b></label><br>
                                <select style="width: 100%;"  name="id_und_adscripcion" id="id_und_adscripcion" class="default-select2 form-control">
                                    <option value="<?=$ver['id_und_adscripcion']?>"><?=$ver['und']?></option>
                                    <?php foreach ($cargo as $data): ?>
                                    <option value="<?=$data['id_cargo']?>"><?=$data['nombre']?></option>
                                    <?php endforeach; ?>
                                </select>
                                
                            </div>
                          
                            
                         
                        
                        
                       
                       


                        <div class="col-4"></div>

                   

                      
                    </div>
                    <div class="row text-center mt-3">
                            <div class="col-6">
                            <button class="btn btn-circle waves-effect btn-lg waves-circle waves-float btn-primary" type="submit" id="btn_guardar" name="button" >Guardar</button>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-circle waves-effect btn-lg waves-circle waves-float btn-primary"
                                    href="javascript:history.back()"> Volver</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function printDiv(nombreDiv) {
    var contenido = document.getElementById('imp1').innerHTML;
    var contenidoOriginal = document.body.innerHTML;

    document.body.innerHTML = contenido;

    window.print();

    document.body.innerHTML = contenidoOriginal;
}
</script>
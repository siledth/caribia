<div class="sidebar-bg"></div>
<div id="content" class="content">
    <h2>Registro de comensales</h2>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <form class="form-horizontal" id="guardar_ba" data-parsley-validate="true" method="POST"
                    enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Cedula <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input class="form-control" onkeypress="may(this);" type="text" name="cedula"
                                    id="cedula" placeholder="XXXX">
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label>Nombre y Apellido <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input class="form-control" onkeypress="may(this);" type="text" name="nombre"
                                    id="nombre" placeholder="Datos del Comensal">
                            </div>

                            <div class="form-group col-6">
                                <label>Unidad de Adscripción <b title="Campo Obligatorio"
                                        style="color:red">*</b></label>
                                <select class="default-select2 form-control" name="id_und_adscripcion"
                                    id="id_und_adscripcion">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($adscrito as $data): ?>
                                    <option value="<?=$data['id_und_adscripcion']?>"><?=$data['nombre']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label> Señeccione Cargo <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <select class="default-select2 form-control" name="id_cargo" id="id_cargo">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($cargo as $data): ?>
                                    <option value="<?=$data['id_cargo']?>"><?=$data['nombre']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="form-group col 12 text-center">
                        <button type="button" onclick="guardar_b();" id="guardar" name="guardar"
                            class="btn btn-primary mb-3">Guardar</button>
                    </div>
                    </from>
            </div>

            <div class="col-lg-12">
                        <div class="panel panel-inverse">
                            <div class="panel-heading"></div>
                            
                            <table id="data-table-default" data-order='[[ 1, "asc" ]]'
                            class="table table-bordered table-hover">
                                    <thead style="background:#01cdb2">
                                        <tr style="text-align:center">
                                            <th style="color:white;">Cedula</th>
                                            <th style="color:white;">Nombre y Apellido</th>
                                            <th style="color:white;">Unidad de Adscripción</th>
                                          
                                            <th style="color:white;">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($comensales as $data):?>
                                        <tr class="odd gradeX" style="text-align:center">
                                            <td><?=$data['id_comensales']?> </td>
                                            <td><?=$data['nombre']?> </td>
                                            <td><?=$data['descrip']?> </td>
                                            
                                                                                    
                                            <td class="center">
                                            <a class="button" href="<?php echo base_url() ?>index.php/Comensales/comensal_editar?id=<?php echo $data['id_comensales'];?>">
                                                            <i title="Ver Modificar" class="fas fa-lg fa-fw  fa-edit" style="color: midnightblue;"></i>
                                                        <a />
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
        </div>
    </div>

    <script src="<?=base_url()?>js/comensales/comensales.js"></script>
    <script src="<?=base_url()?>js/comensales/edi_comensales.js"></script>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar comensales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" data-sortable-id="form-validation-1">
                    <form class="form-horizontal" id="editar" data-parsley-validate="true" method="POST"
                        enctype="multipart/form-data">
                        <div class="row">
                        <div class="form-group col-2">
                                <label>id</label>
                                <input class="form-control" type="text" name="id" id="id" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label>Cedula</label>
                                <input class="form-control" type="number" name="cedula_edit" id="cedula_edit" >
                            </div>
                           
                            <div class="form-group col-4">
                                <label>Nombre y Apellido</label>
                                <input class="form-control" type="text" onkeypress="return valideKey(event);"
                                    name="nombre_edit" id="nombre_edit">
                            </div>
                          
                            <div class="form-group col-8">
                                <label>Cargo </label>
                                <input type="text" class="form-control" onkeypress="may(this);" id="id_cargo_edit"
                                    name="id_cargo_edit">
                            </div>
                            <div class="form-group col-8">
                                <label>Unidad de Adscripción </label>
                                <input type="text" class="form-control" onkeypress="may(this);" id="id_und_adscripcion_edit"
                                    name="id_und_adscripcion_edit">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary"
                        data-dismiss="modal">Cerrar</button>
                    <button type="button" onclick="editar_comanesales();" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
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
                                            <td><?=$data['cedula']?> </td>
                                            <td><?=$data['nombre']?> </td>
                                            <td><?=$data['descrip']?> </td>
                                            
                                                                                    
                                            <td class="center">
                                           
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar comensaless</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" data-sortable-id="form-validation-1">
                    <form class="form-horizontal" id="editar" data-parsley-validate="true" method="POST"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-4">
                                <label>ID</label>
                                <input class="form-control" type="text" name="id" id="id" readonly>
                            </div>
                            <div class="col-8"></div>
                            <div class="form-group col-4">
                                <label>Rif</label>
                                <input class="form-control" type="text" onkeypress="return valideKey(event);"
                                    name="cod_banco_edit" id="cod_banco_edit">
                            </div>
                            <div class="form-group col-8">
                                <label>Nombre </label>
                                <input type="text" class="form-control" onkeypress="may(this);" id="nombre_banco_edit"
                                    name="nombre_banco_edit">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary"
                        data-dismiss="modal">Cerrar</button>
                    <button type="button" onclick="editar_b();" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
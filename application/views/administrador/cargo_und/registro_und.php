<div class="sidebar-bg"></div>
<div id="content" class="content">
    <h2>Registro de Unidad de Adscripción</h2>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <form class="form-horizontal" id="guardar_cargo" data-parsley-validate="true" method="POST"
                    enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="row">
                            
                            <div class="form-group col-6">
                                <label>Descripción <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input class="form-control" onkeypress="may(this);" type="text" name="nombre"
                                    id="nombre" placeholder="nombre del cargo">
                            </div>

                            <div class="form-group col-6">
                                <label>Tarifa <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input class="form-control" onkeypress="may(this);" type="number" name="tarifa"
                                    id="tarifa">
                            </div>


                        </div>
                    </div>
                    <div class="form-group col 12 text-center">
                        <button type="button" onclick="registrar_carg();" id="guardar" name="guardar"
                            class="btn btn-primary mb-3">Guardar</button>
                    </div>
                    </from>
            </div>

            <div class="col-lg-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading"></div>

                    <table id="data-table-default" data-order='[[ 1, "asc" ]]' class="table table-bordered table-hover">
                        <thead style="background:#01cdb2">
                            <tr style="text-align:center">
                                <th style="color:white;">Descripción</th>
                                
                                <th style="color:white;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($cargo as $data):?>
                            <tr class="odd gradeX" style="text-align:center">
                                <td><?=$data['nombre']?> </td>
                               

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
                <h5 class="modal-title" id="exampleModalLabel">Editar Cargo</h5>
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
                            <label>Descripción</label>
                            <input class="form-control" type="text" onkeypress="return valideKey(event);"
                                name="nombre_edit" id="nombre_edit">
                        </div>
                        <div class="form-group col-8">
                            <label>Tarifa </label>
                            <input type="text" class="form-control" onkeypress="may(this);" id="tarifa_edit"
                                name="tarifa_edit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary"
                    data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="editar_cargo();" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<div class="sidebar-bg"></div>
<div id="content" class="content">
    <h2>Ingresar Apoyo / Autorización</h2>
    <div class="row">
        <div class="col-lg-12">
            

            <div class="col-lg-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading"></div>

                    <table id="data-table-default" data-order='[[ 1, "asc" ]]' class="table table-bordered table-hover">
                        <thead style="background:#01cdb2">
                            <tr style="text-align:center">
                                <th style="color:white;">Datos</th>
                                <th style="color:white;">Autorizado</th>
                                

                                <th style="color:white;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($comensales as $data):?>
                            <tr class="odd gradeX" style="text-align:center">
                                <td><?=$data['cedula']?> <?=$data['nombre']?></td>
                                <td><?=$data['autorizado']?> </td>


                                <td class="center">
                                <a class="button">
                                        <i title="Agregar" onclick="modal_ver(<?php echo $data['cedula']?>);" data-toggle="modal" data-target="#exampleModal" class="fas fa-lg fa-fw fa-edit" style="color:green"></i>
                                    <a/>
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

<script src="<?=base_url()?>js/autorizar/autorizar.js"></script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar autorización</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" data-sortable-id="form-validation-1">
                <form class="form-horizontal" id="editar" data-parsley-validate="true" method="POST"
                    enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-4">
                            <label>Cedula</label>
                            <input class="form-control" type="text" name="id" id="id" readonly>
                        </div>
                        <div class="col-8"></div>
                        <div class="form-group col-4">
                            <label>Cantidad de Comidas</label>
                            <input class="form-control" type="number" onkeypress="return valideKey(event);"
                                name="edt_autorizado" id="edt_autorizado">
                        </div>
                        <div class="form-group col-8">
                            <label>Observación </label>
                            <input type="text" class="form-control" onkeypress="may(this);" id="Observación_edit"
                                name="Observación_edit">
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
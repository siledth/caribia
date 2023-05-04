<div class="sidebar-bg"></div>
<div id="content" class="content">
    <h2>Registro Comidas Entregadas</h2>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <form class="form-horizontal" id="guardar_ba" data-parsley-validate="true" method="POST"
                    enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="row">
                           
                            <div class="form-group col-6">
                                <label>Selecciona Comensal <b title="Campo Obligatorio"
                                        style="color:red">*</b></label>
                                        <select style="width: 100%;" onclick="trae_inf();" id="comensales" name="comensales"
                                    class="default-select2">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($comensales as $data): ?>
                                    <option value="<?=$data['id_comensales']?>"><?=$data['comensales']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label>Unidad de Adscripción <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="id_und_adscripcion" id="id_und_adscripcion" class="form-control" readonly>
                            </div>
                         
                            
                            <div class="form-group col-6" id="autorizados" >
                                <label> Comida Autorizada <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="number" name="autorizado" id="autorizado" class="form-control"  readonly >

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
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($comedor as $data):?>
                                        <tr class="odd gradeX" style="text-align:center">
                                            
                                            <td><?=$data['cedula']?> </td>
                                            <td><?=$data['descrp']?> </td>
                                            <td> <?=$data['und_adscripcion']?></td>
                                            
                                            
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

   
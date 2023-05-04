<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
		<div class="col-lg-12">
			<div class="panel panel-inverse" data-sortable-id="form-validation-1">
				<div class="panel-heading">
					<h4 class="panel-title">Registro de Entes</h4>
				</div>
                <div class="panel-body">
                    <form action="<?=base_url()?>index.php/configuracion/save_ente" method="POST" class="form-horizontal">
                        <div class="row">
                            <div class="form-group col-7">
                                <label>Ente</label>
                                <input type="text" name="ente" class="form-control <?php echo form_error('ente') ? 'is-invalid':'' ; ?>" placeholder="Nombre" value="<?php echo set_value('ente'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('ente'); ?>
                                </div>
                            </div>
                            <div class="form-group col-5">
                                <label>Organo Perteneciente</label>
                                    <select id="id_organo" name="id_organo"  class="default-select2 form-control">
                                        <option>Seleccione</option>
                                        <?php foreach ($organismos as $data): ?>
                                            <option value="<?=$data['id_organoente']?>"><?=$data['descripcion']?></option>
                                        <?php endforeach; ?>
                                    </select>
                            </div>
                            <div class="form-group col-3">
                                <label>Código ONAPRE</label>
                                <input type="text" name="cod_onapre" class="form-control <?php echo form_error('cod_onapre') ? 'is-invalid':'' ; ?>" placeholder="Código" value="<?php echo set_value('cod_onapre'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('cod_onapre'); ?>
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label>Siglas del Ente</label>
                                <input type="text" name="siglas" class="form-control <?php echo form_error('siglas') ? 'is-invalid':'' ; ?>" placeholder="Código" value="<?php echo set_value('siglas'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('siglas'); ?>
                                </div>
                            </div>
                            <div class="col-3">
                                <label>Rif del Ente</label>
                                <div class="row">
                                    <div class="col-4">
                                        <select id="tipo_rif" name="tipo_rif" class="default-select2 form-control">
                                            <?php foreach ($tipo_rif as $data): ?>
                                                <option value="<?=$data['id_rif']?>/<?=$data['desc_rif']?>" ><?=$data['desc_rif']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-8">
                                        <input type="number" name="rif" class="form-control <?php echo form_error('rif') ? 'is-invalid':'' ; ?>" placeholder="Código" value="<?php echo set_value('rif'); ?>">
                                        <div class="invalid-feedback">
                                            <?php echo form_error('rif'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 form-group">
                                <label>Clasificación</label>
                                <select id="id_clasificacion" name="id_clasificacion" class="default-select2 form-control">
                                    <option>Seleccione</option>
                                        <?php foreach ($clasificacion as $data): ?>
                                            <option value="<?=$data['id_clasificacion']?>"><?=$data['desc_clasificacion']?></option>
                                        <?php endforeach; ?>
                                    </select>

                            </div>
                            <div class="col-3 form-group">
								<label>Teléfono Local</label>
								<input type="text" class="form-control" name="tel_local" id="tel_local" placeholder="(999) 999-9999" />
								</div>
                            <div class="col-3 form-group">
								<label>Teléfono Local 2</label>
								<input type="text" class="form-control" name="tel_local_2" id="tel_local_2" placeholder="(999) 999-9999" />
								</div>
                            <div class="col-3 form-group">
								<label>Teléfono Móvil</label>
								<input type="text" class="form-control" name="tel_movil" id="tel_movil" placeholder="(999) 999-9999" />
								</div>
                            <div class="col-3 form-group">
								<label>Teléfono Móvil 2</label>
								<input type="text" class="form-control" name="tel_movil_2" id="tel_movil_2" placeholder="(999) 999-9999" />
							</div>
                            <div class="form-group col-6">
                                <label>Página Web</label>
                                <input type="text" name="pag_web" class="form-control <?php echo form_error('pag_web') ? 'is-invalid':'' ; ?>" placeholder="Nombre" value="<?php echo set_value('pag_web'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('pag_web'); ?>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Correo Electronico</label>
                                <input type="email" name="email" class="form-control <?php echo form_error('email') ? 'is-invalid':'' ; ?>" placeholder="Nombre" value="<?php echo set_value('email'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('email'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
    					<ul class="nav nav-tabs" style="background: #080808;">
    						<li class="nav-items">
    							<a href="#direccion_fiscal" data-toggle="tab" class="nav-link active">
    								<span class="d-sm-none">Tab 1</span>
    								<span class="d-sm-block d-none">Dirección Fiscal</span>
    							</a>
    						</li>
    						<li class="nav-items">
    							<a href="#datos-legales" data-toggle="tab" class="nav-link">
    								<span class="d-sm-none">Tab 2</span>
    								<span class="d-sm-block d-none">Datos Legales</span>
    							</a>
    						</li>
    					</ul>
    					<div class="tab-content">
                        <div class="tab-pane fade active show" id="direccion_fiscal">
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Estado</label>
                                        <select class="form-control" name="id_estado_n" id="id_estado_n" onclick="llenar_municipio();listar_ciudades();">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($estados as $data): ?>
                                        <option value="<?=$data['id']?>"><?=$data['descedo']?></option>
                                    <?php endforeach; ?>
                                </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Municipio</label>
                                        <select class="form-control" name="id_municipio_n" id="id_municipio_n" onclick="llenar_parroquia();">
                                    <option value="0">Seleccione</option>
                                </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Parroquia</label>
                                        <select class="form-control" name="id_parroquia_n" id="id_parroquia_n" >
                                    <option value="0">Seleccione</option>
                                </select>
                                    </div>
                                    <div class="form-group col-12">
    									<label>Dirección</label>
    									<textarea class="form-control" id="direccion_fiscal" name="direccion_fiscal" rows="3" cols="125"></textarea>
								    </div>
                                </div>
    						</div>
    						<div class="tab-pane fade" id="datos-legales">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Gaceta Oficial</label>
                                        <input type="text" name="gaceta_oficial" class="form-control <?php echo form_error('gaceta_oficial') ? 'is-invalid':'' ; ?>"  value="<?php echo set_value('gaceta_oficial'); ?>">
                                        <div class="invalid-feedback">
                                            <?php echo form_error('gaceta_oficial'); ?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label>Fecha de Gaceta</label>
    										<input type="date" class="form-control" name="fecha_gaceta" placeholder="Seleccionar Fecha" />
                                    </div>
                                </div>
    						</div>
    					</div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success" style="color: black;">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($this->session->flashdata('sa-success2')) { ?>
    <div hidden id="sa-success2"> <?= $this->session->flashdata('sa-success2') ?> </div>
<?php } ?>
<script src="<?=base_url()?>/js/eval_desempenio/registro.js"></script>

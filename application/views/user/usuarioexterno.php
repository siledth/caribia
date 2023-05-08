<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <div class="panel-heading">
                    <h4 class="panel-title">Registro de Usuarios </h4>
                </div>
                <div class="panel-body">
                    <form action="<?=base_url()?>index.php/User/savedante" class="form-horizontal"
                        data-parsley-validate="true" name="demo-form" method="POST">
                        <div class="row">
                            <div class="form-group col-3">
                                <label>Perfil <b title="Campo Obligatorio" style="color:red">*</b></label>

                                <select
                                        class="default-select2 form-control <?php  echo form_error('perfil') ? 'is-invalid' : ''; ?>"
                                        id="perfil" name="perfil">
                                        <option value="none" <?php // echo set_select('perfil', 'none', true);?>>-
                                            Seleccione -</option>

                                        <?php foreach ($ver_perfil as $data): ?>

                                        <option value="<?=$data['id_perfil']?>"><?=$data['nombrep']?> </option>
                                        <?php endforeach; ?>
                                    </select>
                            
                                <div class="invalid-feedback">
                                    <?php echo form_error('perfil'); ?>
                                </div>
                            </div>
                            
                            <div class="form-group col-6">
                                <label>Nombre completo <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="nombrefun" onkeyup="mayusculas(this);"
                                    class="form-control  <?php echo form_error('nombrefun') ? 'is-invalid' : ''; ?>"
                                    placeholder="Nombre completo" onKeyUp="mayus(this);"
                                    value="<?php echo set_value('nombrefun'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('nombrefun'); ?>
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label>Cédula de Identidad <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="cedula" name="cedula"
                                    placeholder="ingrese la Cédula sin punto ni coma"
                                    class="form-control  <?php echo form_error('cedula') ? 'is-invalid' : ''; ?>"
                                    value="<?php echo set_value('cedula'); ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('cedula'); ?>
                                </div>
                            </div>
                           
                            <div class="form-group col-6">
                                <label>Correo electronico <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="usuario"
                                    class="form-control <?php echo form_error('usuario') ? 'is-invalid' : '';?>"
                                    placeholder="usuario completo" value="<?php echo set_value('usuario');?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('usuario'); ?>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputPassword1">Contraseña <b title="Campo Obligatorio"
                                        style="color:red">*</b></label>
                                <input type="password" name="password"
                                    class="form-control <?php echo form_error('password') ? 'is-invalid':'' ; ?>"
                                    placeholder="Contraseña" value="<?php echo set_value('password'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('password'); ?>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputPassword1">Repite la contraseña <b title="Campo Obligatorio"
                                        style="color:red">*</b></label>
                                <input type="password" name="repeatPassord"
                                    class="form-control <?php echo form_error('repeatPassord') ? 'is-invalid':'' ; ?>"
                                    placeholder="Contraseña" value="">
                                <div class="invalid-feedback">
                                    <?php echo form_error('repeatPassord'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col 12 text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($this->session->flashdata('sa-error')) { ?>
<div hidden id="success"> <?= $this->session->flashdata('success') ?> </div>
<?php } ?>
<script type="text/javascript">
function mayusculas(e) {
    e.value = e.value.toUpperCase();
}
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
<?php if($this->session->flashdata("success")): ?>

Swal.fire({
    icon: 'success',
    title: 'Guardado Con exito',
    text: '<?php echo $this->session->flashdata("success"); ?>',
});
<?php endif; ?>
</script>
<script src="<?=base_url()?>/js/contratista/contratista.js"></script>
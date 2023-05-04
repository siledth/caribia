<div id="page-loader" class="fade show"><span class="spinner"></span></div>
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <div id="header" class="header navbar-default">
        <div class="navbar-header">
            <a href="." class="navbar-brand"><span class="navbar-logo"><i style="color:blue"
                        class="fas fa-briefcase"></i></span> <b>Ciudad Caribia</b> </a>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <ul class="navbar-nav navbar-right">
            <li></li>
            <li class="dropdown"></li>
            <li class="dropdown navbar-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?= base_url() ?>Plantilla/admin/assets/img/user/user-13.jpg" alt="" />
                    <span class="d-none d-md-inline"><?= $this->session->userdata('nombre') ?></span>
                    <b class="caret"></b>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?= base_url() ?>index.php/login/logout" class="dropdown-item">Cerrar Sesión</a>
                    <a href="<?= base_url() ?>index.php/login/v_camb_clave" class="dropdown-item">Cambio de
                        Contraseña</a>
                    <a href="<?= base_url() ?>index.php/perfilinstitucional" class="dropdown-item">Perfil
                        Intitucional</a>

                </div>
            </li>
        </ul>
    </div>

    <div id="sidebar" class="sidebar">
        <div data-scrollbar="true" data-height="100%">
            <ul class="nav">
                <li class="nav-profile">
                    <a href="javascript:;" data-toggle="nav-profile">
                        <div class="cover with-shadow"></div>
                        <div class="image text-center ml-5">
                            <img src="<?= base_url() ?>Plantilla/admin/assets/img/user/user-13.jpg" alt="" />
                        </div>
                        <div class="info ml-5">
                            <b class=""></b>
                            <?= $this->session->userdata('nombre') ?>
                            <small>Bienvenido</small>
                        </div>
                    </a>
                </li>
                <!-- <li>
                        <ul class="nav nav-profile">
                                <li><a href="javascript:;"><i class="ion-ios-cog"></i> Settings</a></li>
                                <li><a href="javascript:;"><i class="ion-ios-share-alt"></i> Send Feedback</a></li>
                                <li><a href="javascript:;"><i class="ion-ios-help"></i> Helps</a></li>
                        </ul>
                </li> -->
            </ul>
            <ul class="nav">
                <li class="nav-header">Navegador</li>
                <?php if (($this->session->userdata('menu_rnce') == 1)) : ?>



                </li>
                <?php endif; ?>

                <?php if (($this->session->userdata('menu_certi') == 1)) : ?>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret"></b>
                        <i class="fas fa-paste fa-lg" style="background:blue;"></i>
                        <span>Administrador</span>
                    </a>
                    <ul class="sub-menu">
                        <li class="has-sub">
                            <a href="javascript:;">
                            </a>
                            <?php if (($this->session->userdata('certificacion') == 1)) : ?>
                        <li class="has-sub">
                        <li>
                            <a href="<?= base_url() ?>index.php/Comensales/registrar_comensales"><i
                                    class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i>
                                - Registro de Comensales
                            </a>
                        </li>
                       
                        <li>
                        </li>
                        <?php endif; ?>
                        <?php if (($this->session->userdata('certi_externo') == 1)) : ?>
                        <li class="has-sub">
                        <li>
                            <a href="<?= base_url() ?>index.php/Comensales/registrar_apoyo"><i
                                    class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i>
                                - Apoyo
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>index.php/Comensales/registrar_cargos"><i
                                    class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i>
                                - Cargos
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>index.php/Comensales/registrar_und"><i
                                    class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i>
                                - Unidad de Adscripción
                            </a>
                        </li>


                        <?php endif; ?>
                        <?php if (($this->session->userdata('certificacion') == 1)) : ?>

                        <!-- <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                Reportes
                            </a>
                            <ul class="sub-menu">

                                <li><a href="<?= base_url() ?>index.php/certificacion/Consulta_certificacion"><i
                                            class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> General </a>
                                </li>

                                <li><a href="<?= base_url() ?>index.php/certificacion/fecha_vencimiento"><i
                                            class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i>Fecha de vencimiento </a>
                                </li>
                                <li><a href="<?= base_url() ?>index.php/certificacion/status"><i
                                            class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i>Estatus </a>
                                </li>

                            </ul>
                        </li> -->
                        <?php endif; ?>
                </li>

            </ul>

            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-paste fa-lg" style="background:blue;"></i>
                    <span>Comedor</span>
                </a>
                <ul class="sub-menu">
                    <li class="has-sub">
                        <a href="javascript:;">
                        </a>
                        <?php if (($this->session->userdata('certificacion') == 1)) : ?>
                    <li class="has-sub">
                    <li>
                        <a href="<?= base_url() ?>index.php/Comedor/registrar_comidas"><i
                                class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i>
                            - Registro de Comidas
                        </a>
                    </li>



                </ul>


            </li>

            <?php endif; ?>



            <?php endif; ?>
            <?php if (($this->session->userdata('ver_conf') == 1)) : ?>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="ion-gear-b fa-spin" style="background:blue;"></i>
                    <span>Configuración</span>
                </a>

                <ul class="sub-menu">


                    <?php endif; ?>

                    

                    <?php if (($this->session->userdata('ver_user') == 1)) : ?>
                   

                </ul>
            </li>

            <?php endif; ?>

            <li class="mt-5"><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                        class="ion-ios-arrow-back"></i> <span>Cerrar Navegador</span></a></li>
            </ul>
        </div>
    </div>
    <div class="sidebar-bg"></div>
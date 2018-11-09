<div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>

                        <a href="<?php echo site_url('Kucing')?>"> <i class="menu-icon fa  fa-folder-open"></i>Data Kucing </a>
                        <a href="<?php echo site_url('Penyakit')?>"> <i class="menu-icon fa fa-heart"></i>Data Penyakit </a>
                        <a href="<?php echo site_url('Gejala')?>"> <i class="menu-icon fa fa-frown-o"></i>Data gejala </a>
                        <a href="<?php echo site_url('Diagnosis')?>"> <i class="menu-icon fa fa-meh-o"></i>Data diagnosis </a>
                        <a href="<?php echo site_url('User')?>"> <i class="menu-icon fa ti-user"></i>Management User </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                    <a href="<?php echo base_url('index.php/Login'); ?>">Logout</a>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
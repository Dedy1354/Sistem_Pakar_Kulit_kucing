<?php 
	$this->load->view('template/header');
 ?>

 <?php 
 	$this->load->view('template/sidebar');
  ?>

 <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data penyakit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
		              <div class="col-lg-12">

                    <div class="card">
                      <div class="card-header"><strong>Penyakit</strong><small> Form</small></div>
                      <div class="card-body card-block">
                      	<form method="post" class="form-horizontal">

                        <div class="form-group">
                        	<label for="user" class=" form-control-label">Nama Penyakit</label>
						  	           <input type="nama" required="required" title="Masukkan Nama Penyakit" placeholder="Input Data Nama Penyakit" class="form-control" name="NAMA_PENYAKIT" value="<?=isset($default['NAMA_PENYAKIT'])? $default['NAMA_PENYAKIT'] : ""?>" oninvalid="this.setCustomValidity('Nama Penyakit tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>

                         <div class="form-group">
                        	<label for="user" class=" form-control-label">Keterangan Penyakit</label>
							           <input type="text" reqiured="required" title="Masukkan Keterangan Penyakit" placeholder="Input Data keterangan Penyakit" class="form-control" name="KET_PENYAKIT" value="<?= isset($default['KET_PENYAKIT'])? $default['KET_PENYAKIT']: ""?>" oninvalid="this.setCustomValidity('Keterangan Penyakit tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                         <center>
							               <button name="tombol_submit" class="btn btn-primary">Simpan</button>
						            </center>
					             </form>
                      </div>
                    </div>
                  </div>


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
                            <li class="active">Data Solusi</li>
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
                      <div class="card-header"><strong>Solusi</strong><small> Form</small></div>
                      <div class="card-body card-block">
                      	<form method="post" class="form-horizontal">

                        <div class="form-group">
                            <label for="" class=" form-control-label">Kode Penyakit</label>
                           <select title="pilih penyakit" class="form-control" name="KODE_PENYAKIT" value="<?=isset($default['KODE_PENYAKIT'])? $default['KODE_PENYAKIT'] : ""?>" >
                            <option value="">--pilih kategori Penyakit--</option>
                            <?php foreach ($tampil_penyakit as $lihat_penyakit) {
                            ?>
                            <option value='<?= $lihat_penyakit->KODE_PENYAKIT ?>'><?= $lihat_penyakit->NAMA_PENYAKIT ?></option>
                            <?php } ?>
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="" class=" form-control-label">Jenis Solusi</label>
                            <input type="text" required="required" title="Masukan Solusi" placeholder="Input Data Jenis Solusi"  class="form-control" name="JENIS_SOLUSI" value="<?=isset($default['JENIS_SOLUSI'])? $default['JENIS_SOLUSI'] : ""?>">
                        </div>

                        <div class="form-group">
                            <label for="" class=" form-control-label">Keterangan Solosi</label>
                            <textarea type="text" required="required" title="Masukkan Keterangan solusi" placeholder="Input Data Keterangan Solosi"  class="form-control" name="KET_SOLUSI" value="<?=isset($default['KET_SOLUSI'])? $default['KET_SOLUSI'] : ""?>">
                            </textarea>
                        </div>
                         
                         <center>
							<button name="tombol_submit" class="btn btn-primary">
								Simpan
							</button>
						</center>
					</form>
                      </div>
                    </div>
                  </div>


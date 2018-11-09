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
                    <li class="active">Data Diagnosis</li>
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
          <div class="card-header"><strong>Diagnosis</strong><small> Form</small></div>
          <div class="card-body card-block">
            <form method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/Admin/insert_diagnosis">
              <div class="form-group">
                <label for="" class=" form-control-label">Jenis Kucing</label>
                <select title="pilih kucing" class="form-control" required="required" name="KODE_KUCING" value="<?=isset($default['KODE_KUCING'])? $default['KODE_KUCING'] : ""?>" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                  <option value="">--pilih Jenis Kucing--</option>
                  <?php foreach ($tampil_kucing as $lihat_kucing) {
                  ?>
                  <option value='<?= $lihat_kucing->KODE_KUCING ?>'><?= $lihat_kucing->NAMA_KUCING ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label for="user" class=" form-control-label">Tanggal Diagnosi</label oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                <input type="date" required="required" title="Masukkan Tanggal Diagnosi" class="form-control" name="TGL_DIAGNOSIS" value="<?=isset($default['TGL_DIAGNOSIS'])? $default['TGL_DIAGNOSIS'] : ""?>">
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
    </div>
  </div>
</div>


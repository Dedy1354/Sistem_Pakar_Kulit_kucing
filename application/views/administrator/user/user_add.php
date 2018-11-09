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
                            <li class="active">Data user</li>
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
                      <div class="card-header"><strong>user</strong><small> Form</small></div>
                      <div class="card-body card-block">
                    
                      	<form method="post" class="form-horizontal">

                         <div class="form-group">
                        	<label for="user" class=" form-control-label">User Name</label>
							<input type="text"  placeholder="Input Data UserName"  required="required" title="Masukkan UserName!" class="form-control" name="USERNAME" value="<?= isset($default['USERNAME'])? $default['USERNAME']: ""?>" oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>

                        <div class="form-group">
                        	<label for="user" class=" form-control-label">Password</label>
							<input type="text" placeholder="Input Data Password" required="required" title="Masukkan Password" class="form-control" name="PASSWORD" value="<?=isset($default['PASSWORD'])? $default['PASSWORD']: "" ?>" oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>

                        <div class="form-group">
                            <label class="Form-control-label">Level User</label>
                            <select name="LEVEL_USER" class="form-control" required="required" title="Masukkan Level User" oninvalid="this.setCustomValidity('Pilih level')" oninput="setCustomValidity('')">
                            <option value="admin">Admin</option>
                            <option value="pasien">Pasien</option>                          
                            </select>
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


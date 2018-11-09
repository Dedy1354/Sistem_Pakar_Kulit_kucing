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
                            <li class="active">Data kucing</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                         <div class="col-md-12">
                           <div class="card">
                            <div class="card-header">
                             <strong class="card-title">Data Penyakit</strong>
                               </div>
                                 <div class="card-body">
                                 	
                                  <a href="Penyakit/add_penyakit" class="btn btn-primary"><i class="fa fa-plus-square-o"></i>Tambah Data Penyakit</a><br><br>
                                  <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                          <thead>
                                            <tr>
                                              <th>No</th>
                                              <th>NAMA PENYAKIT</th>
                                              <th>KET PENYAKIT</th>
                                              <th></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <!-- ISI DATA AKAN MUNCUL DISINI -->
                                            <?php
                                            $no = 1; //untuk menampilkan no
                                            foreach($list_penyakit as $row){
                                              echo "
                                              <tr>
                                                <td>$no</td>
                                                <td>$row[NAMA_PENYAKIT]</td>
                                                <td>$row[KET_PENYAKIT]</td>
                                                <td>
                                                  <a href='Penyakit/edit_penyakit/$row[KODE_PENYAKIT]' class='btn btn-sm btn-info'><span class='ti-pencil-alt'></span></a>
                                                  <a onclick='return konfirmasi()' href='Penyakit/delete_penyakit/$row[KODE_PENYAKIT]' class='btn btn-sm btn-danger'><span class='ti-trash'></span></a>
                                                </td>
                                              </tr>
                                              ";
                                              $no++;
                                            }
                                            ?>
                                          </tbody>
                                        </table>


                                        </div>
                                    </div>
                                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
<script type="text/javascript" language="JavaScript">
                    function konfirmasi()
                    {
                    tanya = confirm("Anda Yakin Akan Menghapus Data ?");
                    if (tanya == true) return true;
                    else return false;
                    }
                </script>

    </div><!-- /#right-panel -->


<?php 
$this->load->view('template/footer');
 ?>


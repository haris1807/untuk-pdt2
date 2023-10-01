<?php
require 'koneksi.php';
require 'look.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Zakat</title>
        <link href="css/boostrap.css" rel="stylesheet" />
        <link href="css/select2.css" rel="stylesheet" /> 
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="../css/morph.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script>
        function checkOption(obj) {
            var input = document.getElementById("input");
            input.disabled = obj.value == "uang";
            var inputs = document.getElementById("inputs");
            inputs.disabled = obj.value == "beras";
        }
        </script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"> Data Muzakki</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
           <!-- Navbar-->
           <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="setting.php">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                    <div class="nav">
                          
                          <div class="sb-sidenav-menu-heading">Zakat</div>
                              <a class="nav-link" href="index.php">
                              Home
                              <a class="nav-link" href="MasterMuzakki.php">
                              Master Data Muzakki
                              <a class="nav-link" href="MasterMustahik.php">
                              Master Data Kategori Mustahik
                              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                              Zakat Fitrah
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                              <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                  <nav class="sb-sidenav-menu-nested nav">
                                      <a class="nav-link" href="Pengumpulan.php">Pengumpulan Zakat Fitrah</a>
                                      <a class="nav-link" href="Distribusi.php">Distribusi Zakat fitrah warga</a>
                                      <a class="nav-link" href="Distribusi3.php">Distribusi Zakat fitrah mustahik</a>
                                  </nav>
                              </div>


                              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                              Laporan
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                              <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                  <a class="nav-link collapsed" href="Laporan1.php">Laporan Pengumpulan Zakat Fitrah</a>
                                  <a class="nav-link collapsed" href="Laporan2.php">Laporan Distribusi Zakat Fitrah</a>
                              </nav>
                              </div>
                              <a class="nav-link" href="logout.php">
                              logout
                              
                          </a>
                        
                      </div>
                  </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                     
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Pengumpulan Zakat</h1>
                        
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                          <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" onclick="location.href='pengumpulan.php'">
                                Tambahkan Data
                            </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>id Zakat</th>
                                                <th>nama</th>
                                                 <th>Jumlah Tanggungan</th>
                                                 <th>Jenis Pembayaran</th>
                                               <th>Jumlah Tanggungan yang dibayar</th>
                                               <th>Bayar Beras</th>
                                               <th>Bayar Uang</th>
                                               <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                            $datauser = mysqli_query($koneksi, "select * from bayarzakat");
                                            while($data= mysqli_fetch_array($datauser)){
                                               $idz = $data['id_zakat'];
                                               $namakk = $data['nama_KK'];
                                               $jml = $data['jumlah_tanggungan'];
                                               $jns = $data['jenis_bayar'];
                                               $jml2 = $data['jumlah_tanggunganyangdibayar'];
                                               $byr = $data['bayar_beras'];
                                               $byr2 = $data['bayar_uang'];

                                            
                                            ?>
                                            <tr>
                                                <td><?=$idz;?></td>
                                                <td><?=$namakk;?></td>
                                                <td><?=$jml;?></td>
                                                <td><?=$jns;?></td>
                                                <td><?=$jml2;?></td>
                                                <td><?=$byr;?></td>
                                                <td><?=$byr2;?></td>
                                                <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idz;?>">
                                                Edit
                                                
                                                <br>
                                                </button>
                                                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?=$idz;?>">
                                                Hapus
                                                <br>
                                                </button>
                                                </td>
                                            </tr>
                                              <!-- Edit Modal -->
                                              <div class="modal fade" id="edit<?=$idz;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit data bayar zakat</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method = "post">
                                                    <div class="modal-body">
                                                        <input type ="hidden" name ="id_zakat" value = "<?=$idz;?>" class= "form-control">
                                                        <label>nama Kepala Keluarga</label>
                                                        <input type="text" name="nama_KK" value = "<?=$namakk;?>" class= "form-control" required>
                                                        <br>
                                                        <label>Jumlah Tanggungan</label>
                                                        <input type= "text" name="jml1" value = "<?=$jml;?>" class= "form-control" required>
                                                        <br>
                                                        <label>Jenis Pembayaran</label>
                                                        <input type="text" name="jns" value = "<?=$jns;?>" class= "form-control" required>
                                                        <br>
                                                        <label>Jumlah Tanggungan yang Dibayar</label>
                                                        <input type="text" name="jml2" value = "<?=$jml2;?>" class= "form-control" required>
                                                        <br>
                                                        <label>Jumlah beras yang dibayarkan</label>
                                                        <input type="text" name="byr" value = "<?=$byr;?>" class= "form-control" required>
                                                        <br>
                                                        <label>Jumlah uang yang dibayarkan</label>
                                                        <input type="text" name="byr2" value = "<?=$byr2;?>" class= "form-control" required>
                                                        <br>
                                                    <button type ="submit" class="btn btn-primary" name="editk">Edit</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                            </div>
                                            </div>
                                            
                                           
                                             <!-- Hapus Modal -->
                                             <div class="modal fade" id="hapus<?=$idz;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Hapus data Muzakki</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method = "post">
                                                    <div class="modal-body">
                                                        Apakah anda ingin menghapus data <?=$namakk?>
                                                        <input type = "hidden" name ="id_zakat" value = "<?=$idz;?>">
                                                        <br>
                                                        <br>
                                                    <button type ="submit" class="btn btn-danger" name="hapusk">Hapus</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                            </div>
                                            </div>
                                            
                                            <?php
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        
    </body>
       
        </form>
      </div>
    </div>
  </div>
</html>

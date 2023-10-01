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
        <link rel="stylesheet" href="./css/morph.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script>
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
                        <h1 class="mt-4" style = "text-align:center;">Distribusi Zakat Fitrah Lainnya</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                          <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" onclick="location.href='Distribusi4.php';">
                                View data distribusi zakat fitrah lainnya
                            </button>
                            </div>
                            
            <form method = "post" enctype="multipart/form-data">
            <label><i>Keterangan : Dimohon untuk mengisi data secara berurutan.</i></label><br>
            <label style = "margin-top :50px;">nama penerima distribusi</label>
            <input type= "text" name = "nama_KK"  placeholder = "Masukkan Nama Mustahik Lainnya" class= "form-control js-select2" required>
            <br>
            <label>Kategori</label>
            <select name="kategori" id = "kat"  onchange = "update()" placeholder="pilih kategori" class= "form-control" required>
            <option selected hidden disabled> Pilih Kategori </option>
            <option value ="Amilin">Amilin</option>
            <option value ="Fisabilillah(Ustad)">Fisabilillah(ustad)</option>
            <option value ="Fisabilillah(Santri)">Fisabilillah(Santri)</option>
            <option value ="Mualaf">Mualaf</option>
            <option value ="Ibnu Sabil">Ibnu Sabil</option>
            </select>
            <br>
            <label>Hak beras Yang didapat</label>
            <input type="text" name="bayar" id="input" placeholder= ".....Kg" class= "form-control" required>
            <br>

            <br>
            <button type ="submit" class="btn btn-primary" name="distribusikan2">Submit</button>
            

            </form>  
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <!-- Select2 -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
            <script type="text/javascript">
                    function update() {
                        var val = $('#kat').val();
                       
                        console.log(val);
                       
                            if (val == 'Amilin'){
                            var a1 = 10 + ' ' + 'Kg';
                            document.getElementById('input').value = a1;
                      
                            }


                            if (val == 'Ibnu Sabil' || val == 'Mualaf'){
                                var a1 = 5 + ' ' + 'Kg';
                                document.getElementById('input').value = a1;
                                
                            }

                            if (val == 'Fisabilillah(Ustad)' || val == 'Fisabilillah(Santri)'){
                                var a1 = 3 + ' ' + 'Kg';
                                document.getElementById('input').value = a1;
    
                            } 

                            
                        
                    }
		</script>                    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
</html>

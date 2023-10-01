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
                        <h1 class="mt-4" style = "text-align:center;">Laporan Distribusi Zakat Lainnya</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                          <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" onclick="window.print();return false;";">
                                Print/download Laporan Distribusi Zakat Fitrah Lainnya
                            </button>
                            </div>
                            
            
            <?php
                $datauser = mysqli_query($koneksi, "select count(*) as total from mustahik_warga where kategori = 'mampu'");
                while($data= mysqli_fetch_array($datauser)){
                    $idm = $data['total'];
                }
                $datauser2 = mysqli_query($koneksi, "select sum(hak) as total from mustahik_warga where kategori = 'mampu'");
                while($data= mysqli_fetch_array($datauser2)){
                    $idm2 = $data['total'];
                }

                $datauser3 = mysqli_query($koneksi, "select count(*) as total from mustahik_warga where kategori = 'Fakir'");
                while($data= mysqli_fetch_array($datauser3)){
                    $idm3 = $data['total'];
                }
                $datauser4 = mysqli_query($koneksi, "select sum(hak) as total from mustahik_warga where kategori = 'Fakir'");
                while($data= mysqli_fetch_array($datauser4)){
                    $idm4 = $data['total'];
                }

                $datauser5 = mysqli_query($koneksi, "select count(*) as total from mustahik_warga where kategori = 'miskin'");
                while($data= mysqli_fetch_array($datauser5)){
                    $idm5 = $data['total'];
                }
                $datauser6 = mysqli_query($koneksi, "select sum(hak) as total from mustahik_warga where kategori = 'miskin'");
                while($data= mysqli_fetch_array($datauser6)){
                    $idm6 = $data['total'];
                }

                //asdas
                $datause = mysqli_query($koneksi, "select count(*) as total from mustahik_lainnya where kategori = 'Ibnu Sabil'");
                while($data= mysqli_fetch_array($datause)){
                    $ida = $data['total'];
                }
                $datause2 = mysqli_query($koneksi, "select sum(hak) as total from mustahik_lainnya where kategori = 'Ibnu Sabil'");
                while($data= mysqli_fetch_array($datause2)){
                    $ida2 = $data['total'];
                }

                $datause3 = mysqli_query($koneksi, "select count(*) as total from mustahik_lainnya where kategori = 'Amilin'");
                while($data= mysqli_fetch_array($datause3)){
                    $ida3 = $data['total'];
                }
                $datause4 = mysqli_query($koneksi, "select sum(hak) as total from mustahik_lainnya where kategori = 'Amilin'");
                while($data= mysqli_fetch_array($datause4)){
                    $ida4 = $data['total'];
                }

                $datause5 = mysqli_query($koneksi, "select count(*) as total from mustahik_lainnya where kategori = 'Mualaf'");
                while($data= mysqli_fetch_array($datause5)){
                    $ida5 = $data['total'];
                }
                $datause6 = mysqli_query($koneksi, "select sum(hak) as total from mustahik_lainnya where kategori = 'Mualaf'");
                while($data= mysqli_fetch_array($datause6)){
                    $ida6 = $data['total'];
                }

                $datause7 = mysqli_query($koneksi, "select count(*) as total from mustahik_lainnya where kategori = 'Fisabilillah(Ustad)'");
                while($data= mysqli_fetch_array($datause7)){
                    $ida7 = $data['total'];
                }
                $datause8 = mysqli_query($koneksi, "select sum(hak) as total from mustahik_lainnya where kategori = 'Fisabilillah(Ustad)'");
                while($data= mysqli_fetch_array($datause8)){
                    $ida8 = $data['total'];
                }

                $datause9 = mysqli_query($koneksi, "select count(*) as total from mustahik_lainnya where kategori = 'Fisabilillah(Santri)'");
                while($data= mysqli_fetch_array($datause9)){
                    $ida9 = $data['total'];
                }
                $datause10 = mysqli_query($koneksi, "select sum(hak) as total from mustahik_lainnya where kategori = 'Fisabilillah(Santri)'");
                while($data= mysqli_fetch_array($datause10)){
                    $ida10 = $data['total'];
                }



                
            ?>

            <input type = "hidden" id = "jumkk" value = "<?=$idm;?>">
            <input type = "hidden" id = "jumber" value = "<?=$idm2;?>">
            <input type = "hidden" id = "jumkk2" value = "<?=$idm3;?>">
            <input type = "hidden" id = "jumber2" value = "<?=$idm4;?>">
            <input type = "hidden" id = "jumkk3" value = "<?=$idm5;?>">
            <input type = "hidden" id = "jumber3" value = "<?=$idm6;?>">

            <input type = "hidden" id = "jumk" value = "<?=$ida;?>">
            <input type = "hidden" id = "jumbe" value = "<?=$ida2;?>">
            <input type = "hidden" id = "jumk2" value = "<?=$ida3;?>">
            <input type = "hidden" id = "jumbe2" value = "<?=$ida4;?>">
            <input type = "hidden" id = "jumk3" value = "<?=$ida5;?>">
            <input type = "hidden" id = "jumbe3" value = "<?=$ida6;?>">
            <input type = "hidden" id = "jumk4" value = "<?=$ida7;?>">
            <input type = "hidden" id = "jumbe4" value = "<?=$ida8;?>">
            <input type = "hidden" id = "jumk5" value = "<?=$ida9;?>">
            <input type = "hidden" id = "jumbe5" value = "<?=$ida10;?>">


            
            <label>Kategori</label>
            <select name="kategori" id = "kat"  onchange = "update()" placeholder="pilih kategori" class= "form-control" required>
            <option selected hidden disabled> Pilih Kategori </option>
            <option value ="Fakir">Fakir</option>
            <option value ="miskin">Miskin</option>
            <option value ="Mampu">Mampu</option>
            <option value ="Ibnu Sabil">Ibnu Sabil</option>
            <option value ="Mualaf">Mualaf</option>
            <option value ="Fi Sabilillah(ustad)">Fi Sabilillah (ustad)</option>
            <option value ="Fi Sabilillah(santri)">Fi Sabilillah (santri)</option>
            <option value ="Amilin">Amilin</option>
            </select>
            <br>
            <h2><b>A. Distribusi Ke Mustahik Warga</b></h2>
            <table  id="dataTable" width="100%" cellspacing="0">
            <tr>
            <td style = "width : 300px; ">Kategori Mustahik </td><td style = "width : 50px;">:</td><td id = "katm">Masukkan Kategori Untuk Melihat Laporan</td>
            </tr>
            <tr>
            <td style = "width : 300px; ">Hak beras </td><td style = "width : 50px;">:</td><td id = "hakm">Masukkan Kategori Untuk Melihat Laporan</td>
            </tr>
            <tr>
            <td style = "width : 300px; ">Jumlah Kepala Keluarga </td><td style = "width : 50px;">:</td><td id = "jumm">Masukkan Kategori Untuk Melihat Laporan</td>
            </tr>
            <tr>
            <td style = "width : 300px; ">Total Beras </td><td style = "width : 50px;">:</td><td id = "totm">Masukkan Kategori Untuk Melihat Laporan</td>
            </tr>

            </table>
            <br>
            <br>
            <br>
            <h2><b>B. Distribusi Ke Mustahik Lainnya</b></h2>
            <table  id="dataTable" width="100%" cellspacing="0">
            <tr>
            <td style = "width : 300px; ">Kategori Mustahik </td><td style = "width : 50px;">:</td><td id = "katmm">Masukkan Kategori Untuk Melihat Laporan</td>
            </tr>
            <tr>
            <td style = "width : 300px; ">Hak beras </td><td style = "width : 50px;">:</td><td id = "hakmm">Masukkan Kategori Untuk Melihat Laporan</td>
            </tr>
            <tr>
            <td style = "width : 300px; ">Jumlah Kepala Keluarga </td><td style = "width : 50px;">:</td><td id = "jummm">Masukkan Kategori Untuk Melihat Laporan</td>
            </tr>
            <tr>
            <td style = "width : 300px; ">Total Beras </td><td style = "width : 50px;">:</td><td id = "totmm">Masukkan Kategori Untuk Melihat Laporan</td>
            </tr>

            </table>
        
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <!-- Select2 -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
            <script type="text/javascript">
                    function update() {
                        
                        var val = $('#kat').val();
                        var totalberas = $('#jumber').val();
                        var totalkk = $('#jumkk').val();
                        var totalberas2 = $('#jumber2').val();
                        var totalkk2 = $('#jumkk2').val();
                        var totalberas3 = $('#jumber3').val();
                        var totalkk3 = $('#jumkk3').val();


                        var totalbera = $('#jumbe').val();
                        var totalk = $('#jumk').val();
                        var totalbera2 = $('#jumbe2').val();
                        var totalk2 = $('#jumk2').val();
                        var totalbera3 = $('#jumbe3').val();
                        var totalk3 = $('#jumk3').val();
                        var totalbera4 = $('#jumbe4').val();
                        var totalk4 = $('#jumk4').val();
                        var totalbera5 = $('#jumbe5').val();
                        var totalk5 = $('#jumk5').val();

                            if (val == 'Mampu'){
                                katm.innerText = "Mampu";
                                hakm.innerText = "3 kg";
                                jumm.innerText = totalkk;
                                totm.innerText = totalberas + ' ' + 'Kg';

                                katmm.innerText = "Mampu";
                                hakmm.innerText = "3 kg";
                                jummm.innerText = "0";
                                totmm.innerText = '0 Kg';
                            }

                            if (val == 'Fakir'){
                                katm.innerText = "Fakir";
                                hakm.innerText = "20 kg";
                                jumm.innerText = totalkk2;
                                totm.innerText = totalberas2 + ' ' + 'Kg';

                                katmm.innerText = "Fakir";
                                hakmm.innerText = "20 kg";
                                jummm.innerText = "0";
                                totmm.innerText = "0 Kg";
                            }

                            if (val == 'miskin'){
                                katm.innerText = "Miskin";
                                hakm.innerText = "8 kg";
                                jumm.innerText = totalkk3;
                                totm.innerText = totalberas3 + ' ' + 'Kg';

                                katmm.innerText = "Miskin";
                                hakmm.innerText = "8 kg";
                                jummm.innerText = "0";
                                totmm.innerText = "0 Kg";
                            }

                            if (val == 'Ibnu Sabil'){
                                katm.innerText = "Ibnu Sabil";
                                hakm.innerText = "5 kg";
                                jumm.innerText = "0";
                                totm.innerText = "0 Kg";

                                katmm.innerText = "Ibnu Sabil";
                                hakmm.innerText = "5 kg";
                                jummm.innerText = totalk;
                                totmm.innerText = totalbera + ' ' + 'Kg';
                            }

                            if (val == 'Amilin'){
                                katm.innerText = "Amilin";
                                hakm.innerText = "10 kg";
                                jumm.innerText = "0";
                                totm.innerText = "0 Kg";

                                katmm.innerText = "Amilin";
                                hakmm.innerText = "10 kg";
                                jummm.innerText = totalk2;
                                totmm.innerText = totalbera2 + ' ' + 'Kg';
                            }

                            if (val == 'Mualaf'){
                                katm.innerText = "Mualaf";
                                hakm.innerText = "5 kg";
                                jumm.innerText = "0";
                                totm.innerText = "0 Kg";

                                katmm.innerText = "Mualaf";
                                hakmm.innerText = "5 kg";
                                jummm.innerText = totalk3;
                                totmm.innerText = totalbera3 + ' ' + 'Kg';
                            }

                            if (val == 'Fi Sabilillah(ustad)'){
                                katm.innerText = "Fi Sabilillah(ustad)";
                                hakm.innerText = "3 kg";
                                jumm.innerText = "0";
                                totm.innerText = "0 Kg";

                                katmm.innerText = "Fi Sabilillah(ustad)";
                                hakmm.innerText = "3 kg";
                                jummm.innerText = totalk4;
                                totmm.innerText = totalbera4 + ' ' + 'Kg';
                            }

                            if (val == 'Fi Sabilillah(santri)'){
                                katm.innerText = "Fi Sabilillah(santri)";
                                hakm.innerText = "3 kg";
                                jumm.innerText = "0";
                                totm.innerText = "0 Kg";

                                katmm.innerText = "Fi Sabilillah(santri)";
                                hakmm.innerText = "3 kg";
                                jummm.innerText = totalk5;
                                totmm.innerText = totalbera5 + ' ' + 'Kg';
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


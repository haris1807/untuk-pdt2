<?php
session_start();
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'zakatfitrah';
$koneksi = mysqli_connect($host,$user,$password,$db);

// Check connection
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
   } 
   
   //login
   if (isset($_POST['login'])){
       $username = $_POST['username'];
       $password = $_POST['password'];
       
       $login = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password' or email='$username' AND password='$password'");
       $cek = mysqli_num_rows($login);
       $data= mysqli_fetch_array($login);
   
       if($cek == 1){
               $_SESSION['username']= $data['username'];
               $_SESSION['password']= $data['password'];
               $_SESSION['nama']= $data['nama'];
               $_SESSION['id_user']= $data['id_user'];
               $_SESSION['level']= $data['level'];
               header("location:index.php");
       }else{
       echo '
       <script>
       alert("Username atau password salah!");
       window.location="login.php";
       </script>
       ';
   }
   }


//Register
if (isset($_POST['register'])){
    $email = $_POST['email'];
    $username = $_POST ['username'];
    $password = $_POST ['password'];
    $password2 = $_POST ['password2'];
    $cekdata = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' or email='$email'");
    $cek = mysqli_num_rows($cekdata);
    if ($cek == 1){
        echo'
        <script>
        alert("Username atau email telah digunakan!");
        window.location="about.php";
        </script>
            ';
    }else{
    if ($password != $password2){
        echo'
                    <script>
                    alert("Password berbeda!!");
                    window.location="register.php";
                    </script>
                    ';
    }else{
        $adduser = mysqli_query($koneksi,"insert into user ( email, username, password) values ('$email', '$username', '$password')");
        if($adduser){
        echo'
        <script>
        alert("Berhasil Registrasi!!");
        window.location="login.php";
        </script>
        ';
        }else{
            echo'
                    <script>
                    alert("Gagal Registrasi!!");
                    window.location="register.php";
                    </script>
                    ';
        }
    }
}
}

// Fungsi dari MasterMuzakki.php
//Tambahkan data
if (isset($_POST['tambahkan'])){
   $nama = $_POST['nama_muzakki'];
   $jml = $_POST['jml'];
   $ket = $_POST['ket'];
  

            $datasewakan2 = mysqli_query($koneksi,"insert into muzakki (nama_muzakki, jumlah_tanggungan, keterangan) values('$nama','$jml','$ket')");
            if($datasewakan2){
                echo'
                <script>
                alert("Berhasil menambahkan data!!");
                window.location="MasterMuzakki.php";
                </script>
                ';
                
            }else{
                
                echo'
                <script>
                alert("Gagal menambahkan data!!");
                window.location="MasterMuzakki.php";
                </script>
                ';
            }
        }

//hapus muzakki
if (isset($_POST['hapusdata'])){
    $idm = $_POST['id_muzakki'];
    $delete = mysqli_query($koneksi, "delete from muzakki where id_muzakki='$idm'");
    if($delete){
        echo'
         <script>
         alert("Berhasil hapus data!!");
         window.location="MasterMuzakki.php";
         </script>
         ';
        }else{
            
            echo'
                <script>
                alert("Gagal hapus data!!");
                window.location="MasterMuzakki.php";
                </script>
                ';
        }
}

//edit muzakki
if (isset($_POST['updatedata'])){
    $idm = $_POST['id_muzakki'];
    $nama = $_POST['nama_muzakki'];
    $jml = $_POST['jml'];
    $ket = $_POST['jenis'];

    $edit = mysqli_query($koneksi, "update muzakki set nama_muzakki = '$nama', keterangan = '$ket', jumlah_tanggungan='$jml' where id_muzakki='$idm'");
    if($edit){
        echo'
        <script>
        alert("Berhasil update profile!!");
        window.location="MasterMuzakki.php";
        </script>
        ';
        }else{
            echo'
            <script>
            alert("Gagal update!!");
            window.location="MasterMuzakki.php";
            </script>
            ';
        }
}




//Fungsi dari Master Mustahik
//Tambahkan data kategori
if (isset($_POST['tambahkan2'])){
    $kategori = $_POST['kategori'];
    $hak = $_POST['hak'];
   
             $datasewakan2 = mysqli_query($koneksi,"insert into kategori_mustahik (nama_kategori, jumlah_hak) values('$kategori','$hak')");
             if($datasewakan2){
                echo'
                <script>
                alert("Berhasil menambahkan data!!");
                window.location="MasterMustahik.php";
                </script>
                ';
                
             }else{
                 
                echo'
                <script>
                alert("Gagal menambahkan data!!");
                window.location="MasterMustahik.php";
                </script>
                ';
             }
         }
 
//hapus kategori
 if (isset($_POST['hapusdata2'])){
     $idm = $_POST['id_kategori'];
     $delete = mysqli_query($koneksi, "delete from kategori_mustahik where id_kategori='$idm'");
     if($delete){
        echo'
         <script>
         alert("Berhasil hapus data!!");
         window.location="MasterMustahik.php";
         </script>
         ';
         }else{
             
            echo'
            <script>
            alert("Gagal Menghapus!!");
            window.location="MasterMustahik.php";
            </script>
            ';
            }
 }
 
 //edit kategori
 if (isset($_POST['updatedata2'])){
    $idm = $_POST['id_kategori'];
    $kategori = $_POST['kategori'];
    $hak = $_POST['hak'];
 
     $edit = mysqli_query($koneksi, "update kategori_mustahik set nama_kategori = '$kategori', jumlah_hak ='$hak' where id_kategori='$idm'");
     if($edit){
         echo'
         <script>
         alert("Berhasil update profile!!");
         window.location="MasterMustahik.php";
         </script>
         ';
         }else{
             echo'
             <script>
             alert("Gagal update!!");
             window.location="index.php";
             </script>
             ';
         }
 }


 //Fungsi Pengumpulan.php & pengumpulan2.php
 //Tambahkan data bayar zakat
if (isset($_POST['tambahkanzakat'])){
    $namaKK = $_POST['nama_KK'];
    $jml = $_POST['jumlah1'];
    $jns = $_POST['jenis'];
    $jml2 = $_POST['jumlah2'];
    $byr = $_POST['bayar'];
    $byr2 = $_POST['bayar2'];
    if ($byr == null){
        $datasewakan2 = mysqli_query($koneksi,"insert into bayarzakat (nama_KK, jumlah_tanggungan, jenis_bayar,jumlah_tanggunganyangdibayar, bayar_beras, bayar_uang) values('$namaKK','$jml','$jns','$jml2','0 Kg','$byr2')");
             if($datasewakan2){
                echo'
                <script>
                alert("Berhasil menambahkan data!!");
                window.location="pengumpulan2.php";
                </script>
                ';
             }else{
                 
                echo'
                <script>
                alert("Gagal menambahkan data!!");
                window.location="index.php";
                </script>
                ';
             }
            }

    if ($byr2 == null){
        $datasewakan2 = mysqli_query($koneksi,"insert into bayarzakat (nama_KK, jumlah_tanggungan, jenis_bayar,jumlah_tanggunganyangdibayar, bayar_beras, bayar_uang) values('$namaKK','$jml','$jns','$jml2','$byr','Rp. 0')");
                if($datasewakan2){
                    echo'
                <script>
                alert("Berhasil menambahkan data!!");
                window.location="pengumpulan2.php";
                </script>
                ';
                }else{
                    
                    echo'
                    <script>
                    alert("Gagal menambahkan data!!");
                    window.location="index.php";
                    </script>
                    ';
                }
            }

         }

//edit data bayar zakat
if (isset($_POST['editk'])){
    $idz = $_POST['id_zakat'];
    $namaKK = $_POST['nama_KK'];
    $jml = $_POST['jml1'];
    $jns = $_POST['jns'];
    $jml2 = $_POST['jml2'];
    $byr = $_POST['byr'];
    $byr2 = $_POST['byr2'];

    $edit = mysqli_query($koneksi, "update bayarzakat set nama_KK = '$namaKK', jumlah_tanggungan = '$jml', jenis_bayar = '$jns', jumlah_tanggunganyangdibayar = '$jml2', bayar_beras = '$byr', bayar_uang ='$byr2' where id_zakat='$idz'");
    if($edit){
        echo'
        <script>
        alert("Berhasil update data!!");
        window.location="Pengumpulan2.php";
        </script>
        ';
        }else{
            echo'
            <script>
            alert("Gagal update data!!");
            window.location="Pengumpulan2.php";
            </script>
            ';
        }


}

if (isset($_POST['hapusk'])){
    $idz = $_POST['id_zakat'];
    $delete = mysqli_query($koneksi, "delete from bayarzakat where id_zakat= '$idz'");
    if($delete){
       echo'
        <script>
        alert("Berhasil hapus data!!");
        window.location="Pengumpulan2.php";
        </script>
        ';
        }else{
            
           echo'
           <script>
           alert("Gagal Menghapus!!");
           window.location="Pengumpulan2.php";
           </script>
           ';
           }
}



// Fungsi Distribusi.php & Distribusi2.php
if (isset($_POST['distribusikan1'])){
    $namaKK = $_POST['nama_KK'];
    $kat = $_POST['kategori'];
    $byr = $_POST['bayar'];
        $datasewakan2 = mysqli_query($koneksi,"insert into mustahik_warga (nama, kategori, hak) values('$namaKK','$kat','$byr')");
             if($datasewakan2){
                echo'
                <script>
                alert("Berhasil menambahkan data!!");
                window.location="Distribusi2.php";
                </script>
                ';
                 
             }else{
                echo'
                <script>
                alert("Gagal menambahkan data!!");
                window.location="Distribusi2.php";
                </script>
                ';
                 
             }
            
            
        }

//hapus data distribusi warga
if (isset($_POST['hadis1'])){
        $idz = $_POST['id_mustahikwarga'];
        $delete = mysqli_query($koneksi, "delete from mustahik_warga where id_mustahikwarga= '$idz'");
        if($delete){
            echo'
            <script>
            alert("Berhasil hapus data!!");
            window.location="Distribusi2.php";
            </script>
            ';
            }else{
                
                echo'
                <script>
                alert("Gagal Menghapus!!");
                window.location="Distribusi2.php";
                </script>
                ';
                }
    }

 //edit data distribusi warga
 if (isset($_POST['edis1'])){
    $idm = $_POST['iddis'];
    $nama = $_POST['nama_KK'];
    $jml = $_POST['jml1'];
    $jns = $_POST['jns'];
 
     $edit = mysqli_query($koneksi, "update mustahik_warga set kategori = '$jml', nama ='$nama', hak = '$jns' where id_mustahikwarga='$idm'");
     if($edit){
         echo'
         <script>
         alert("Berhasil update profile!!");
         window.location="Distribusi2.php";
         </script>
         ';
         }else{
             echo'
             <script>
             alert("Gagal update!!");
             window.location="Distribusi2.php";
             </script>
             ';
         }
 }


// Fungsi Distribusi3.php & Distribusi2.php
if (isset($_POST['distribusikan2'])){
    $namaKK = $_POST['nama_KK'];
    $kat = $_POST['kategori'];
    $byr = $_POST['bayar'];
        $datasewakan2 = mysqli_query($koneksi,"insert into mustahik_lainnya (nama, kategori, hak) values('$namaKK','$kat','$byr')");
             if($datasewakan2){
                echo'
                <script>
                alert("Berhasil menambahkan data!!");
                window.location="Distribusi4.php";
                </script>
                ';
             }else{
                 
                echo'
                <script>
                alert("Gagal menambahkan data!!");
                window.location="Distribusi4.php";
                </script>
                ';
             }
            
            
        }

//edit data distribusi lainnya
 if (isset($_POST['eddis2'])){
    $idm = $_POST['iddis2'];
    $nama = $_POST['nama_KK'];
    $jml = $_POST['jml1'];
    $jns = $_POST['jns'];
 
     $edit = mysqli_query($koneksi, "update mustahik_lainnya set kategori = '$jml', nama ='$nama', hak = '$jns' where id_mustahiklainnya='$idm'");
     if($edit){
         echo'
         <script>
         alert("Berhasil update profile!!");
         window.location="Distribusi4.php";
         </script>
         ';
         }else{
             echo'
             <script>
             alert("Gagal update!!");
             window.location="Distribusi4.php";
             </script>
             ';
         }
 }

 //hapus data distribusi lainnya
if (isset($_POST['hadis2'])){
    $idz = $_POST['iddis2'];
    $delete = mysqli_query($koneksi, "delete from mustahik_lainnya where id_mustahiklainnya= '$idz'");
    if($delete){
        echo'
        <script>
        alert("Berhasil hapus data!!");
        window.location="Distribusi4.php";
        </script>
        ';
        }else{
            
            echo'
            <script>
            alert("Gagal Menghapus!!");
            window.location="Distribusi4.php";
            </script>
            ';
            }
}
 
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Using Select2</title>
        <script type="text/javascript">
			function update() {
				var select = document.getElementById('jml2');

                var a = $('#jml2').val();
                var a1 = a * 2.5 + ' ' + 'Kg';
                document.getElementById('input').value = a1;
                console.log(a);
                var b = $('#jml2').val();
                var a2 = 'Rp.' + ' ' + b * 15000;
				document.getElementById('inputs').value = a2;
			}
		</script>
      </head>
	<body>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?=$idm?>">
            Tambahkan Data
            </button>
            <?php
            $host = 'localhost';
            $user = 'root';
            $password = 'mysql';
            $db = 'zakatfitrah';
            $koneksi = mysqli_connect($host,$user,$password,$db);
            $datauser = mysqli_query($koneksi, "select * from muzakki");
            while($data= mysqli_fetch_array($datauser)){
                $idm = $data['id_muzakki'];
                $nm = $data['nama_muzakki'];
                $jml = $data['jumlah_tanggungan'];
                $ket = $data['keterangan'];
            
            ?>
              <!-- The Modal -->
              <div class="modal fade" id="myModal<?=$idm?>">
                <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Tambahkan Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    
                    <form method = "post" enctype="multipart/form-data">
                    <div class="modal-body">

                    <label>nama Kepala Keluarga</label>
                    <input type = "text" name = "nama_KK"  class= "form-control" value= "<?=$nm;?>" required>
                    <br>
                    <label>Jumlah Tanggungan</label>
                    <input type="number" name="jumlah1" value = "<?=$jml;?>" class= "form-control" required>
                    <br>
                    <label>Jenis Pembayaran</label>
                    <select name="jenis" placeholder="pilih kategori" id = "pilih" class= "form-control" onChange="checkOption(this)" required>
                    <option label> pilih </option>
                    <option value ="beras">beras</option>
                    <option value ="uang">uang</option>
                    </select>
                    <br>
                    <label>Jumlah Tanggungan yang dibayar</label>
                    <select name="jumlah2" class= "form-control" id = "jml2" onchange="update()" required>
                    <option label> pilih </option>
                    <option value ="1">1 orang</option>
                    <option value ="2">2 orang</option>
                    <option value ="3">3 orang</option>
                    <option value ="4">4 orang</option>
                    <option value ="5">5 orang</option>
                    <option value ="6">6 orang</option>
                    <option value ="7">7 orang</option>
                    <option value ="8">8 orang</option>
                    <option value ="9">9 orang</option>
                    <option value ="10">10 orang</option>
                    </select>
                    <br>
                    <label>Bayar beras</label>
                    <input type="text" name="bayar" id="input" class= "form-control" required>
                    <br>
                    <label>Bayar Uang</label>
                    <input type="text" name="bayar2" id = "inputs" class= "form-control" required>
                    <br>
                
                    <br>
                    <button type ="submit" class="btn btn-primary" name="tambahkanzakat">Submit</button>
                    
                
                    </form>
                </div>
                </div>
            </div>
            <?php
                                            }
?>


        
        <form method = "post" enctype="multipart/form-data"></form>
        <select name="jumlah2" class= "form-control" id = "jml2" onchange="update()" required>
            <option label> pilih </option>
            <option value ="1">1 orang</option>
            <option value ="2">2 orang</option>
            <option value ="3">3 orang</option>
            <option value ="4">4 orang</option>
            <option value ="5">5 orang</option>
            <option value ="6">6 orang</option>
            <option value ="7">7 orang</option>
            <option value ="8">8 orang</option>
            <option value ="9">9 orang</option>
            <option value ="10">10 orang</option>
            </select>
            <br>
            <label>Bayar beras</label>
            <input type="text" name="bayar" id="input" class= "form-control" required>
            <br>
            <label>Bayar Uang</label>
            <input type="text" name="bayar2" id = "inputs" class= "form-control" required>
            <br>
        </form>
  

		
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script>
          $("#jml2").select2({
            tags: true
            });
        </script>
	</body>
</html>
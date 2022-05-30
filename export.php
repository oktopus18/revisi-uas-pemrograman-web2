<?php

require 'config/database.php';
?>
<html>
<head>
  <title>Restoran | Print</title>
  <link rel="shortcut icon" href="assets/img/favicon.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Restoran</h2>
			<h4>(Inventory)</h4>
				<div class="data-tables datatable-dark">
					
                <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">ID Transaksi</th>
                <th class="center">Tanggal</th>
                <th class="center">Nama Pelanggan</th>
                <th class="center">Daftar Paket</th>
                <th class="center">No.hp</th>
                <th class="center">Biaya</th>
                <th></th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel transaksi
            $query = mysqli_query($mysqli, "SELECT * FROM is_transaksi as a INNER JOIN is_paket as b
                                            ON a.paket=b.id_paket
                                            ORDER BY a.id_transaksi DESC")
                                            or die('Ada kesalahan pada query tampil Transaksi: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              $t_transaksi       = $data['tanggal'];
              $exp               = explode('-',$t_transaksi);
              $tanggal_transaksi = $exp[2]."-".$exp[1]."-".$exp[0];

              // menampilkan isi tabel dari database ke tabel di aplikasi
            ?>

            <tr>
                <td><?=$no++;?></td>
                <td><?php echo $data ['id_transaksi'];?></td>
                <td><?php echo ($tanggal_transaksi);?></td>
                <td><?php echo $data['nama_pelanggan'];?></td>
                <td><?php echo $data['daftar_paket'];?></td>
                <td><?php echo $data['no_hp'];?></td>
                <td><?php echo $data['paket'];?></td>
                <td><?php echo $data['harga']?></td>
            </tr>
              </div>

            <?php 
            };
            ?>
            
            </tbody>
          </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#dataTables1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>
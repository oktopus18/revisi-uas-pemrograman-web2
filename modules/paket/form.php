<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i style="margin-right:7px" class="fa fa-edit"></i> Input Data Paket
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=paket"> Paket </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/paket/proses.php?act=insert" method="POST">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Restoran</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_restoran" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Daftar Paket</label>
                <div class="col-sm-5">
                  <select class="form-control" name="daftar_paket" required>
                  <?php
                      $query_paket = mysqli_query($mysqli, "SELECT * FROM is_paket ORDER BY id_paket ASC")
                                                            or die('Ada kesalahan pada query tampil paket: '.mysqli_error($mysqli));
                      while ($data_paket = mysqli_fetch_assoc($query_paket)) {
                        echo"<option value=\"$data_paket[id_paket]\"> $data_paket[daftar_paket] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Harga</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" id="biaya" name="biaya" value="<?php echo format_rupiah($data['harga']); ?>" readonly>
                  </div>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=paket" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel paket
      $query = mysqli_query($mysqli, "SELECT * FROM is_paket WHERE id_paket='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil data paket : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i style="margin-right:7px" class="fa fa-edit"></i> Ubah Data Paket
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=paket"> Paket </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/paket/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <input type="hidden" name="id_paket" value="<?php echo $data['id_paket']; ?>">

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Restoran</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_restoran" autocomplete="off" value="<?php echo $data['nama_restoran']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Daftar Paket</label>
                <div class="col-sm-5">
                  <select class="form-control" name="daftar_paket" required>
                    <?php
                      $query_paket = mysqli_query($mysqli, "SELECT * FROM is_paket ORDER BY id_paket ASC")
                                                            or die('Ada kesalahan pada query tampil paket: '.mysqli_error($mysqli));
                      while ($data_paket = mysqli_fetch_assoc($query_paket)) {
                        echo"<option value=\"$data_paket[id_paket]\"> $data_paket[daftar_paket] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Harga</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" id="biaya" name="biaya" value="<?php echo format_rupiah($data['harga']); ?>" readonly>
                  </div>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-1 col-sm-11">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=paket" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>
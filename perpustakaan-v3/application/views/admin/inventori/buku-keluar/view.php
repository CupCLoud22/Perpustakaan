<link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Data Buku Keluar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Buku Keluar</h3>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('alert') ?>
          <a href="<?php echo site_url('admin/inventori/add_bkeluar') ?>" class="btn btn-success btn-sm btn-flat" style="margin-bottom:10px;"><i class="fa fa-plus"></i> Buku Keluar</a>
          <div class="table-responsive">
            <table id="tables" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Tanggal</th><th>Judul</th><th>Jumlah</th><th>Keterangan</th><th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach ($bkeluar->result_array() as $k) {
                ?>
                <tr>
                  <td><?php echo tgl_short($k['tgl_bkeluar']) ?></td>
                  <td><?php echo $k['judul'] ?></td>
                  <td><?php echo $k['jml_bkeluar'] ?></td>
                  <td><?php echo $k['ket_bkeluar'] ?></td>
                  <td>
                    <a href="<?php echo site_url('admin/inventori/delete_bmasuk/'.$k['id_bkeluar']) ?>" title="Hapus" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Yakin ingin hapus ?')"><i class="fa fa-remove"></i></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

          <h4>Catatan :</h4>
            <ol>
              <li>Halaman inventori buku keluar ini digunakan saat ada buku perpustakaan yang hilang atau rusak atau apaun itu, yang menyebabkan buku tersebut tidak dianggap stok buku lagi di perpustakaan</li>
            </ol>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    $("#tables").DataTable();
  })
</script>
  <!-- DataTables -->
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
        <li class="active">Data Pengembalian Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pengembalian Buku</h3>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('alert') ?>
          <a href="<?php echo site_url('admin/pengembalian/add') ?>" class="btn btn-success btn-sm btn-flat" style="margin-bottom:10px;"><i class="fa fa-plus"></i> Data Pengembalian</a>
          <div class="table-responsive">
            <table id="dtpengembalian" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Tgl Kembali</th><th width="150px">ID Peminjaman</th><th>Nama Peminjam</th><th>Tgl Pinjam</th><th>Jatuh Tempo</th><th>Denda</th><th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach($pengembalian->result_array() as $k) {
                ?>
                <tr>
                  <td><?php echo tgl_short($k['tgl_pengembalian']) ?></td>
                  <td><?php echo $k['id_peminjaman'] ?></td>
                  <td><?php echo $k['nm_anggota'] ?></td>
                  <td><?php echo tgl_short($k['tgl_pinjam']) ?></td>
                  <td><?php echo tgl_short($k['tgl_kembali']) ?></td>
                  <td>Rp. <?php echo number_format($k['denda'], 0, ',', '.') ?></td>
                  <td>
                    <a href="<?php echo site_url('admin/pengembalian/delete/'.$k['id_pengembalian']) ?>" title="Hapus" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Yakin ingin hapus ?')"><i class="fa fa-remove"></i></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- DataTables -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    $("#dtpengembalian").DataTable();
  })
</script>
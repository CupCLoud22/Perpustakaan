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
        <li class="active">Data Request Buku Masuk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Request Buku Masuk</h3>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('alert') ?>
          <a href="<?php echo site_url('admin/bkmasuk/add') ?>" class="btn btn-success btn-sm btn-flat" style="margin-bottom:10px;"><i class="fa fa-plus"></i>  Request Buku</a> <a href="<?php echo site_url('admin/bkmasuk/cl_bkmasuk') ?>" target="_blank" class="btn btn-default btn-sm btn-flat" style="margin-bottom:10px;"><i class="fa fa-print"></i> Cetak Laporan</a>
          <div class="table-responsive">
            <table id="tables" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Judul Buku</th><th>Supplier</th><th>Harga Buku</th><th>Jumlah Buku</th><th>Total Harga</th><th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach ($bkmasuk->result_array() as $k) {
                ?>
                <tr>
                  <td><?php echo $k['judul'] ?></td>
                  <td><?php echo $k['supplier'] ?></td>
                  <td>Rp. <?php echo number_format ($k['harga']) ?></td>
                  <td><?php echo $k['jumlah'] ?></td>
                  <td>Rp. <?php echo number_format ($k['harga']*$k['jumlah'])?></td>
                  <td>
                    <!--<a href="<?php echo site_url('admin/bkmasuk/edit/'.$k['id_bkmasuk']) ?>" title="Edit" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit"></i></a>-->
                    <a href="<?php echo site_url('admin/bkmasuk/delete/'.$k['id_bkmasuk']) ?>" title="Hapus" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Yakin ingin hapus ?')"><i class="fa fa-remove"></i></a>
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
    $("#tables").DataTable();
  })
</script>

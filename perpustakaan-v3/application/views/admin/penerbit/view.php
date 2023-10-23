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
        <li class="active">Data Penerbit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Penerbit</h3>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('alert') ?>
          <a href="<?php echo site_url('admin/penerbit/add') ?>" class="btn btn-success btn-sm btn-flat" style="margin-bottom:10px;"><i class="fa fa-plus"></i> Data Penerbit</a>
          <div class="table-responsive">
            <table id="dtsiswa" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="100px">ID</th><th>penerbit</th><th width="100px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach ($penerbit->result_array() as $k) {
                ?>
                <tr>
                  <td><?php echo $k['id_penerbit'] ?></td>
                  <td><?php echo $k['nm_penerbit'] ?></td>
                  <td>
                    <a href="<?php echo site_url('admin/penerbit/edit/'.$k['id_penerbit']) ?>" title="Edit" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo site_url('admin/penerbit/delete/'.$k['id_penerbit']) ?>" title="Hapus" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Yakin ingin hapus ?')"><i class="fa fa-remove"></i></a>
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
    $("#dtsiswa").DataTable();
  })
</script>
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
        <li class="active">Data Program Studi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Program Studi</h3>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('alert') ?>
          <a href="<?php echo site_url('admin/prodi/add') ?>" class="btn btn-success btn-sm btn-flat" style="margin-bottom:10px;"><i class="fa fa-plus"></i> Data Program Studi</a>
          <div class="table-responsive">
            <table id="dtsiswa" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Program Studi</th><th width="100px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach ($prodi->result_array() as $k) {
                ?>
                <tr>
                  <td><?php echo $k['nm_prodi'] ?></td>
                  <td>
                    <a href="<?php echo site_url('admin/prodi/edit/'.$k['id_prodi']) ?>" title="Edit" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo site_url('admin/prodi/delete/'.$k['id_prodi']) ?>" title="Hapus" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Yakin ingin hapus ?')"><i class="fa fa-remove"></i></a>
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
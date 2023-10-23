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
        <li class="active">Data Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pengguna</h3>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('alert') ?>
          <a href="<?php echo site_url('admin/pengguna/add') ?>" class="btn btn-success btn-sm btn-flat" style="margin-bottom:10px;"><i class="fa fa-plus"></i> Data Pengguna</a>
          <div class="table-responsive">
            <table id="tables" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama</th><th>Email</th><th>Status</th><th>Level</th><th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach ($pengguna->result_array() as $k) {
                ?>
                <tr>
                  <td><?php echo $k['nm_admin'] ?></td>
                  <td><?php echo $k['email_admin'] ?></td>
                  <td><?php echo $k['status_admin'] ?></td>
                  <td><?php echo $k['role'] ?></td>
                  <td>
                    <a href="<?php echo site_url('admin/pengguna/edit/'.$k['id_admin']) ?>" title="Edit" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo site_url('admin/pengguna/delete/'.$k['id_admin']) ?>" title="Hapus" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Yakin ingin hapus ?')"><i class="fa fa-remove"></i></a>
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
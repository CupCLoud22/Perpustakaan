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
        <li class="active">Data Anggota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Anggota</h3>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('alert') ?>
          <!-- <a href="<?php echo site_url('admin/anggota/add') ?>" class="btn btn-success btn-sm btn-flat" style="margin-bottom:10px;"><i class="fa fa-plus"></i> Data Anggota</a> -->
          <div class="table-responsive">
            <table id="tables" class="table table-bordered table-striped">
              <thead>
                <tr>
                   <th width="100px">NIM</th><th>Prodi</th><th>Smt</th><th>Nama</th><th width="100px">Jenis Kelamin</th><th>Alamat</th><th>Email</th><th>No Hp</th><th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach($anggota->result_array() as $k) {
                ?>
                <tr>
                  <td><?php echo $k['id_anggota'] ?></td>
                  <td><?php echo $k['nm_prodi'] ?></td>
                  <td><?php echo $k['smt_anggota'] ?></td>
                  <td><?php echo $k['nm_anggota'] ?></td>
                  <td><?php echo $k['jk_anggota'] ?></td>
                  <td><?php echo $k['almt_anggota'] ?></td>
                  <td><?php echo $k['email_anggota'] ?></td>
                  <td><?php echo $k['hp_anggota'] ?></td>
                  <td>
                    <a href="<?php echo site_url('admin/anggota/edit/'.$k['id_anggota']) ?>" title="Edit" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo site_url('admin/anggota/delete/'.$k['id_anggota']) ?>" title="Hapus" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Yakin ingin hapus ?')"><i class="fa fa-remove"></i></a>
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
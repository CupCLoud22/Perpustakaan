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
        <li class="active">Data Peminjaman Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Peminjaman Buku</h3>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('alert') ?>
          <a href="<?php echo site_url('admin/peminjaman/add') ?>" class="btn btn-success btn-sm btn-flat" style="margin-bottom:10px;"><i class="fa fa-plus"></i> Data Peminjaman</a>
          <a href="<?php echo site_url('admin/peminjaman') ?>" class="btn btn-default btn-sm btn-flat" style="margin-bottom:10px;"><i class="fa fa-refresh"></i> Refresh</a>
          <div class="table-responsive">
            <table id="dtpeminjaman" class="table table-bordered table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>ID Pinjam</th><th>Tgl Pinjam</th><th>Nama Peminjam</th><th>Jatuh Tempo</th><th>Status</th><th>Katerangan</th><th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach($buku->result_array() as $k) {
                    $tgl1 = new DateTime(date('Y-m-d'));
                    $tgl2 = new DateTime($k['tgl_kembali']);
                    if($tgl1 > $tgl2){
                      $selisih = $tgl2->diff($tgl1);
                      $hari = '<span class="text-danger">'.$selisih->days.' hari</span>';
                    }else{
                      $hari = '0 hari';
                    }
                    if($k['status'] == 'Menunggu Verifikasi'){
                      $label = 'label-warning';
                    }elseif($k['status'] == 'Pinjam'){
                      $label = 'label-danger';
                    }elseif($k['status'] == 'Kembali'){
                      $label = 'label-info';
                    }
                ?>
                <tr>
                  <td><?php echo $k['id_peminjaman'] ?></td>
                  <td><?php echo tgl_short($k['tgl_pinjam']) ?></td>
                  <td><?php echo $k['nm_anggota'] ?></td>
                  <td><?php echo tgl_short($k['tgl_kembali']) ?></td>
                  <td><label class="label <?php echo $label ?>"><?php echo $k['status'] ?></label></td>
                  <td><?php echo $k['keterangan'] ?></td>
                  <td>
                    <a href="<?php echo site_url('admin/peminjaman/detail/'.$k['id_peminjaman']) ?>" title="Detail" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-eye"></i></a>
                    <?php if($this->session->userdata('role_id') == 1){ ?>
                    <a href="<?php echo site_url('admin/peminjaman/delete/'.$k['id_peminjaman']) ?>" title="Hapus" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Yakin ingin hapus ?')"><i class="fa fa-remove"></i></a>
                  <?php } ?>
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
    $("#dtpeminjaman").DataTable();
  })
</script>
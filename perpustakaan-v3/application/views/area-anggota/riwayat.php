 <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Content Wrapper. Contains page content -->
<div id="bread">
  <div class="container">
    <p>Beranda / Area Anggota</p>
  </div>
</div>
<section id="boxTerbaru">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3">
          <?php $this->load->view('area-anggota/menu_anggota') ?>
        </div>
        <div class="col-md-9 col-sm-9">
          <div class="panel panel-default">
            <div class="panel-heading">Riwayat Peminjaman Buku Anda</div>
            <div class="panel-body">
              <?php echo $this->session->flashdata('alert') ?>
              <div class="table-responsive">
                <table id="dtpeminjaman" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th>ID Pinjam</th><th>Tgl Pinjam</th><th>Jatuh Tempo</th><th>Terlambat</th><th>Status</th><th>Katerangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      foreach($riwayat->result_array() as $k) {
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
                      <td><a href="<?php echo site_url('area_anggota/detailriwayat/'.$k['id_peminjaman']) ?>"><?php echo $k['id_peminjaman'] ?></a></td>
                      <td><?php echo tgl_short($k['tgl_pinjam']) ?></td>
                      <td><?php echo tgl_short($k['tgl_kembali']) ?></td>
                      <td><?php echo $hari ?></td>
                      <td><label class="label <?php echo $label ?>"><?php echo $k['status'] ?></label></td>
                      <td><?php echo $k['keterangan'] ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    $("#dtpeminjaman").DataTable();
  })
</script>
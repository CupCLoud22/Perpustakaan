<link href="<?php echo base_url() ?>assets/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" />
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Form Peminjaman Buku</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <?php echo form_open('admin/peminjaman/add', array('class' => 'form-horizontal')); ?>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Peminjaman Buku</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-sm-4 control-label">ID Peminjaman</label>
                  <div class="col-sm-8">
                    <input type="text" name="id" class="form-control" value="<?php echo $id ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Tgl Pinjam</label>
                  <div class="col-sm-8">
                    <input type="text" name="tglp" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Tgl Kembali</label>
                  <div class="col-sm-8">
                    <input type="text" name="tglk" class="form-control" value="<?php echo date('Y-m-d', strtotime('+' . $sp->maks_lama_pinjam . ' days', strtotime(date('Y-m-d')))) ?>" readonly>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Anggota</label>
                  <div class="col-sm-8">
                    <select class="form-control select2" name="id_anggota">
                      <option value="">-- Pilih --</option>
                      <?php
                      foreach ($anggota->result() as $k) {
                      ?>
                        <option value="<?php echo $k->id_anggota ?>" <?php echo (set_value('id_anggota') == $k->id_anggota) ? 'selected' : ''; ?>><?php echo $k->nm_anggota . ' - ' . $k->id_anggota ?></option>
                      <?php } ?>
                    </select>
                    <small class="text-danger"><?php echo form_error('id_anggota') ?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Keterangan</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <hr style="border-color:#ddd;">
            <!-- /.row -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="col-sm-5">
                    <div class="input-group input-group-sm">
                      <select id="kdbuku" class="select2">
                        <option value="">Pilih Buku</option>
                        <?php foreach ($buku->result_array() as $b) { ?>
                          <option value="<?php echo $b['id_buku'] ?>"><?php echo $b['judul'] . ' [' . $b['isbn'] . ']' ?></option>
                        <?php } ?>
                      </select>
                      <!-- <input type="text" class="form-control" id="kdbuku" placeholder="Kode Buku"> -->
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-flat" id="btn-ok">OK!</button>
                      </span>
                    </div>
                    <small class="text-danger" id="errBuku"></small>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered" style="width:100%">
                <thead class="bg-success">
                  <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Qty</th>
                    <th>Hapus</th>
                  </tr>
                </thead>
                <tbody id="isi"></tbody>
              </table>
            </div>

          </div>
          <div class="box-footer">
            <button type="button" onclick="window.location='<?php echo site_url('admin/peminjaman') ?>'" class="btn btn-default btn-sm btn-flat"><i class="fa fa-remove"></i> Batal</button>
            <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-refresh"></i> Proses Transaksi</button>
          </div>
        </div>
        <!-- /.box -->
        <?php echo form_close(); ?>
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="<?php echo base_url() ?>assets/bower_components/select2/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $("body").on('click', '.hps', function() {
      $(this).parents('tr').remove();
    });

    $(".select2").select2();

    $("#btn-ok").click(function() {
      var id = $("#kdbuku").val();
      $.ajax({
        url: "<?php echo site_url('admin/peminjaman/get_data_buku') ?>",
        type: "POST",
        dataType: "JSON",
        data: {
          id: id
        },
        success: function(res) {
          if (res.stat == false) {
            $("#errBuku").html('Buku tidak ditemukan!');
          } else {
            $("#kdbuku").val('').trigger('change');
            var audio = new Audio('<?php echo base_url() ?>assets/webcodecamjs/audio/beep.mp3');
            audio.play();
            var html = '<tr>' +
              '<td>' + res.d.id_buku + '<input type="hidden" name="baris[]"></td>' +
              '<td>' + res.d.judul + '<input type="hidden" name="buku[]" value="' + res.d.id_buku + '"></td>' +
              '<td><input type="number" name="qty[]" class="form-control" value="1" style="width:60px;"></td>' +
              '<td><button type="button" class="btn btn-danger btn-sm hps"><i class="fa fa-remove"></i></button></td>' +
              '</tr>';
            $('#isi').append(html);
          }
        }
      });
    })
  });
</script>
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
        <li class="active">Form Pengembalian Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
        <div class="row">
          <div class="col-md-12">
            <?php echo form_open('admin/pengembalian/add', array('class' => 'form-horizontal'));?>
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Form Pengembalian Buku</h3>
              </div>
              <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID Pinjam/Anggota</label>
                    <div class="col-sm-4">
                      <select class="form-control select2" id="idPinjam" name="idpinjam">
                        <option value="">-- Pilih --</option>
                        <?php 
                          foreach($pinjam->result() as $k){
                        ?>
                          <option value="<?php echo $k->id_peminjaman ?>" <?php echo (set_value('idpinjam') == $k->id_peminjaman)? 'selected' : ''; ?>><?php echo $k->id_peminjaman.' - '.$k->nm_anggota ?></option>
                        <?php } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('idpinjam') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tgl Pinjam</label>
                    <div class="col-sm-3">
                      <input type="text" name="tglp" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tgl Kembali</label>
                    <div class="col-sm-3">
                      <input type="text" name="tglk" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Terlambat</label>
                    <div class="col-sm-2">
                      <input type="text" id="telat" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Denda (Rp)</label>
                    <div class="col-sm-2">
                      <input type="text" name="denda" id="denda" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">List Buku</label>
                    <div class="col-sm-10">
                      <div class="table-responsive">
                        <table class="table">
                          <thead class="bg-success">
                            <tr>
                              <th>No</th><th>ID Buku</th><th>Judul</th><th>ISBN</th><th>Pengarang</th><th>Qty</th>
                            </tr>
                          </thead>
                          <tbody id="dtBukuPinjam"></tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <button type="button" onclick="window.location='<?php echo site_url('admin/pengembalian') ?>'" class="btn btn-default btn-sm btn-flat"><i class="fa fa-remove"></i> Batal</button>
                      <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check"></i> Proses Transaksi</button>
                    </div>
                  </div>
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
  $(document).ready(function(){
    $("#idPinjam").change(function(){
      var id = $(this).val();
       $.ajax({
        url: "<?php echo site_url('admin/pengembalian/get_denda') ?>",
        type: "POST",
        dataType: "JSON",
        data: { id:id },
        success:function(res){
          $("[name='tglp']").val(res.tglp);
          $("[name='tglk']").val(res.tglk);
          $("#telat").val(res.telat + ' Hari');
          $("#denda").val(res.denda);
        }
      })

      $.ajax({
        url: "<?php echo site_url('admin/pengembalian/tampil_buku_pinjam') ?>",
        type: "POST",
        data: { id:id },
        success:function(res){
          $("#dtBukuPinjam").html(res);
        }
      })
    });

    $(".select2").select2();
  })
  </script>

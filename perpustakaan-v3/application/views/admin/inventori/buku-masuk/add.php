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
        <li class="active">Tambah Buku Masuk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Buku Masuk</h3>
        </div>
        <div class="box-body">
                <?php echo form_open('admin/inventori/add_bmasuk', array('class' => 'form-horizontal')); ?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Buku</label>
                    <div class="col-sm-4">
                      <select class="form-control buku select2" name="buku">
                            <option value="">-- Pilih --</option>
                            <?php 
                              foreach($buku->result() as $b){
                            ?>
                            <option value="<?php echo $b->id_buku ?>" <?php echo (set_value('buku') == $b->id_buku)? 'selected' : ''; ?>><?php echo $b->judul ?></option>
                            <?php } ?>
                          </select>
                          <small class="text-danger"><?php echo form_error('buku') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Asal Buku</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="asal" placeholder="Asal Buku" value="<?php echo set_value('asal') ?>">
                      <small class="text-danger"><?php echo form_error('asal') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jumlah Masuk</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control" name="jml" placeholder="Jumlah Masuk" value="<?php echo set_value('jml') ?>">
                      <small class="text-danger"><?php echo form_error('jml') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" name="keterangan" placeholder="Keterangan"><?php echo set_value('keterangan') ?></textarea>
                      <small class="text-danger"><?php echo form_error('keterangan') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <button type="button" onclick="window.location='<?php echo site_url('admin/inventori') ?>'" class="btn btn-default btn-sm btn-flat"><i class="fa fa-remove"></i> Batal</button>
                      <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check"></i> Submit</button>
                    </div>
                  </div>
                <?php echo form_close(); ?>
            <h4>Catatan :</h4>
            <ol>
              <li>Jika data buku yang akan diinput tidak ada di dalam list buku di atas, maka lakukan input data master buku terlebih dahulu di menu data master buku.</li>
            </ol>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="<?php echo base_url() ?>assets/bower_components/select2/dist/js/select2.min.js"></script>
  <script>
  $(document).ready(function(){
    $(".select2").select2();
  })
  </script>
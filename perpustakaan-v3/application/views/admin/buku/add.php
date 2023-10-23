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
        <li class="active">Tambah Data Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Buku</h3>
        </div>
        <div class="box-body">
            <?php echo $this->session->flashdata('alert') ?>
                <?php echo form_open('admin/buku/add', array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kategori</label>
                    <div class="col-sm-4">
                      <select class="form-control select2" name="kategori">
                        <option value="">-- Pilih --</option>
                        <?php 
                          foreach($kategori->result() as $k){
                        ?>
                          <option value="<?php echo $k->id_kategori ?>" <?php echo (set_value('kategori') == $k->id_kategori)? 'selected' : ''; ?>><?php echo $k->nm_kategori ?></option>
                        <?php } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('kategori') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Judul</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="judul" placeholder="Judul Buku" value="<?php echo set_value('judul') ?>">
                      <small class="text-danger"><?php echo form_error('judul') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">ISBN</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="isbn" placeholder="ISBN" value="<?php echo set_value('isbn') ?>">
                      <small class="text-danger"><?php echo form_error('isbn') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Pengarang</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="pengarang" placeholder="Nama Pengarang" value="<?php echo set_value('pengarang') ?>">
                      <small class="text-danger"><?php echo form_error('pengarang') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Halaman</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="hal" placeholder="Jumlah Halaman" value="<?php echo set_value('hal') ?>">
                      <small class="text-danger"><?php echo form_error('hal') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jumlah</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="jml" placeholder="Jumlah Buku" value="<?php echo set_value('jml') ?>">
                      <small class="text-danger"><?php echo form_error('jml') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Thn Terbit</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="thn" placeholder="Tahun Terbit" value="<?php echo set_value('thn') ?>">
                      <small class="text-danger"><?php echo form_error('thn') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Sinopsis</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" name="sinopsis" placeholder="Sinopsis"><?php echo set_value('sinopsis') ?></textarea>
                      <small class="text-danger"><?php echo form_error('sinopsis') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Penerbit</label>
                    <div class="col-sm-5">
                      <select class="form-control select2" name="penerbit">
                        <option value="">-- Pilih --</option>
                        <?php 
                          foreach($penerbit->result() as $p){
                        ?>
                          <option value="<?php echo $p->id_penerbit ?>" <?php echo (set_value('penerbit') == $p->id_penerbit)? 'selected' : ''; ?>><?php echo $p->nm_penerbit ?></option>
                        <?php } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('penerbit') ?></small>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Rak</label>
                    <div class="col-sm-5">
                      <select class="form-control select2" name="rak">
                        <option value="">-- Pilih --</option>
                        <?php 
                          foreach($rak->result() as $r){
                        ?>
                          <option value="<?php echo $r->id_rak ?>" <?php echo (set_value('rak') == $r->id_rak)? 'selected' : ''; ?>><?php echo $r->nm_rak.' ['.$r->ket_rak.']'; ?></option>
                        <?php } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('rak') ?></small>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Gambar</label>
                    <div class="col-sm-5">
                      <input type="file" class="form-control" name="gbuku">
                      <small>Format file yang diizinkan : gif, jpg, png, jpeg</small>
                      <small class="text-danger"><?php echo form_error('gbuku') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">E-Book</label>
                    <div class="col-sm-5">
                      <input type="file" class="form-control" name="ebook">
                      <small>Format file yang diizinkan : pdf</small>
                      <small class="text-danger"><?php echo form_error('ebook') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <button type="button" onclick="window.location='<?php echo site_url('admin/buku') ?>'" class="btn btn-default btn-sm btn-flat"><i class="fa fa-remove"></i> Batal</button>
                      <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check"></i> Submit</button>
                    </div>
                  </div>
                <?php echo form_close(); ?>
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
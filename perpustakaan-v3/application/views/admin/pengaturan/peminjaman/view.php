<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Peminjaman</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Peminjaman</h3>
        </div>
        <div class="box-body">
                <?php echo form_open('admin/sp', array('class' => 'form-horizontal')); ?>
                  <input type="hidden" name="id" value="<?php echo $s->sp_id ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Maks. Lama Pinjam* </label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="lama" placeholder="Maks. Lama Pinjam" value="<?php echo $s->maks_lama_pinjam ?>">
                      <small class="text-danger"><?php echo form_error('lama') ?></small>
                    </div>
                  </div>
                 <!--  <div class="form-group">
                    <label class="col-sm-2 control-label">Maks. Buku Pinjam</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="banyak" placeholder="Maks. Buku Pinjam" value="<?php echo $s->maks_buku_pinjam ?>">
                      <small class="text-danger"><?php echo form_error('banyak') ?></small>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Denda</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="denda" placeholder="Denda" value="<?php echo $s->sp_denda ?>">
                      <small class="text-danger"><?php echo form_error('denda') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check"></i> Submit</button>
                    </div>
                  </div>
                  <label>* jumlah hari maksimal peminjaman buku </label>
                <?php echo form_close(); ?><br>
                <?php echo $this->session->flashdata('alert') ?>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
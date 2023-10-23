<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo site_url('menu') ?>">Data Menu</a></li>
        <li class="active">Edit Sub Menu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Sub Menu</h3>
        </div>
        <div class="box-body">
                <?php echo form_open('admin/menu/edit_sub/'.$b->sub_menu_id.'/'.$this->uri->segment(5), array('class' => 'form-horizontal')); ?>
                  <input type="hidden" name="id" value="<?php echo $b->sub_menu_id ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Sub Menu</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="menu" placeholder="Nama Sub Menu" value="<?php echo $b->sub_menu_name ?>">
                      <small class="text-danger"><?php echo form_error('menu') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">URL</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="url" placeholder="URL" value="<?php echo $b->sub_menu_url ?>">
                      <small class="text-danger"><?php echo form_error('url') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Icon</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="icon" placeholder="Icon" value="<?php echo $b->sub_menu_icon ?>">
                      <small class="text-danger"><?php echo form_error('icon') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Sort</label>
                    <div class="col-sm-2">
                      <input type="number" class="form-control" name="numb" min="1" placeholder="Sort" value="<?php echo $b->sub_menu_numb ?>">
                      <small class="text-danger"><?php echo form_error('numb') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <button type="button" onclick="window.location='<?php echo site_url('admin/menu/sub_menu/'.$this->uri->segment('5')) ?>'" class="btn btn-default btn-sm btn-flat"><i class="fa fa-remove"></i> Batal</button>
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
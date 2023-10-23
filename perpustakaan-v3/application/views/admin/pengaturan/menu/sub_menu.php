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
        <li class="active">Data Sub Menu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-5">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Sub Menu</h3>
            </div>
            <div class="box-body">
              <?php echo $this->session->flashdata('alert') ?>
              <?php echo form_open('admin/menu/sub_menu/'.$this->uri->segment(4), array('class' => 'form-horizontal')); ?>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Sub Menu</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="menu" placeholder="Nama Sub Menu" value="<?php echo set_value('menu') ?>">
                      <small class="text-danger"><?php echo form_error('menu') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">URL</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="url" placeholder="URL" value="<?php echo set_value('url') ?>">
                      <small class="text-danger"><?php echo form_error('url') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Icon</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="icon" placeholder="Icon" value="<?php echo set_value('icon') ?>">
                      <small class="text-danger"><?php echo form_error('icon') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Sort</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" name="numb" min="1" placeholder="Sort" value="<?php echo set_value('numb') ?>">
                      <small class="text-danger"><?php echo form_error('numb') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                      <button type="button" onclick="window.location='<?php echo site_url('admin/menu') ?>'" class="btn btn-default btn-sm btn-flat"><i class="fa fa-remove"></i> Batal</button>
                      <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check"></i> Submit</button>
                    </div>
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>

        <div class="col-md-7">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Sub Menu</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="dtmenu" class="table table-bordered table-striped" style="width:100%">
                  <thead class="bg-success">
                    <tr>
                      <th>Sub Menu</th><th>URL</th><th>Icon</th><th>Sort</th><th width="150px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      if($sub->num_rows() > 0){
                      foreach($sub->result_array() as $sm){
                    ?>
                    <tr>
                      <td><?php echo $sm['sub_menu_name'] ?></td>
                      <td><?php echo $sm['sub_menu_url'] ?></td>
                      <td><?php echo $sm['sub_menu_icon'] ?></td>
                      <td><?php echo $sm['sub_menu_numb'] ?></td>
                      <td>
                        <a href="<?php echo site_url('admin/menu/edit_sub/'.$sm['sub_menu_id'].'/'.$this->uri->segment('4')) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit"></i> Edit</a>
                        <a href="<?php echo site_url('admin/menu/delete_sub/'.$sm['sub_menu_id'].'/'.$this->uri->segment('4')) ?>" onclick="return confirm('Yakin ingin hapus data ?');" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i> Hapus</a>
                      </td>
                    </tr>
                    <?php }}else{ ?>
                    <tr>
                      <td colspan="5">Tidak ada data</td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Laporan Pengunjung</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Laporan Pengunjung</h3>
        </div>
        <div class="box-body">
          
          <div class="row">
            <div class="col-md-6">
              
              <?php echo form_open('admin/laporan/c_pengunjung', array('class' => 'form-horizontal', 'method' => 'get', 'target' => '_blank')) ?>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Dari Tanggal</label>
                   <div class="col-sm-8">
                            <div class='input-group date datepicker'>
                                    <input type='text' name="tgl1" class="form-control" value="" placeholder="Dari Tanggal..." autocomplete="off" required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                          </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Sampai Tanggal</label>
                  <div class="col-sm-8">
                            <div class='input-group date datepicker'>
                                    <input type='text' name="tgl2" class="form-control" value="" placeholder="Sampai Tanggal..." autocomplete="off" required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                          </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-print"></i> Print</button>
                  </div>
                </div>
              </form>

            </div>
            
          
          </div>

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });
</script>
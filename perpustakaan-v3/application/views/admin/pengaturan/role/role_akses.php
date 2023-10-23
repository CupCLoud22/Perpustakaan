  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo site_url('role') ?>">Data Role</a></li>
        <li class="active">Hak Akses</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Hak Akses <?php echo $role->role ?></h3>
        </div>
        <div class="box-body">
          <div class="row">
          <div class="col-md-6">
            <a href="<?php echo site_url('admin/role') ?>" class="btn btn-default btn-sm btn-flat" style="margin-bottom:5px;"><i class="fa fa-arrow-left"></i> Kembali</a>
            <?php echo $this->session->flashdata('alert') ?>
            <div class="table-responsive">
              <table id="dtrole" class="table table-bordered table-striped" style="width:100%">
                <thead class="bg-success">
                  <tr>
                    <th>Menu</th><th width="70px">Pilih</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach($menu->result_array() as $ra){
                  ?>
                  <tr>
                    <td><?php echo $ra['menu_name'] ?></td>
                    <td><input type="checkbox" class="pilih" data-role="<?php echo $role->role_id ?>" data-menu="<?php echo $ra['menu_id'] ?>" <?php echo cek_role_akses($role->role_id, $ra['menu_id']) ?>></td>
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
  <script>
  $(document).ready(function(){

    $(".pilih").on('click', function(){
      var roleid = $(this).data('role');
      var menuid = $(this).data('menu');
      
      $.ajax({
        url: "<?php echo site_url('admin/role/ubah_role_akses') ?>",
        type : "POST",
        data: {
          roleid : roleid,
          menuid : menuid
        },
        success : function(res){
          document.location.href = "<?php echo site_url('admin/role/role_akses') ?>/" + roleid;
          // console.log(res);
        }
      })
    })

  });
  </script>
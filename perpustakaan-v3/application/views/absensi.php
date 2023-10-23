<div id="bread">
  <div class="container">
    <p>Beranda / Absensi Pengunjung</p>
  </div>
</div>
<section id="boxCariBuku">
    <div class="container">
      <div class="section-title text-center">
        <h3>Absensi Pengunjung</h3>
        <p>Silahakan absen menggunakan ID/NIM Anda</p>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <div class="welcome"></div>
          <form id="formAbsen">
            <div class="form-group">
            <input type="text" class="form-control" name="id" placeholder="ID/NIM">
            <small class="text-danger"><?php echo form_error('id') ?></small>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-user"></i> Absen Pengunjung</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script>

  $(document).ready(function(){

    $("#formAbsen").submit(function(e){
      e.preventDefault();
      $.ajax({
        url:"<?php echo site_url('absensi/absen_pengunjung') ?>",
        type: "POST",
        data: $(this).serialize(),
        dataType: "JSON",
        success:function(data){
          if(data.stat == false){
             $(".welcome").html('<div class="alert alert-danger">Maaf, ID Anda belum terdaftar<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
          }else{
            $("#formAbsen")[0].reset();
             $(".welcome").html('<h3>Selamat Datang, '+data.nm+'</h3>');
            var audio = new Audio('<?php echo base_url() ?>assets/dist/hello.mp3');
            audio.play();
          }
          
        }
      })

    })

  })
</script>
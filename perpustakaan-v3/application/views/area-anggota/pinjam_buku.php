<style type="text/css">
        .scanner-laser{
            position: absolute;
            margin: 40px;
            height: 30px;
            width: 30px;
        }
        .laser-leftTop{
            top: 0;
            left: 0;
            border-top: solid red 5px;
            border-left: solid red 5px;
        }
        .laser-leftBottom{
            bottom: 0;
            left: 0;
            border-bottom: solid red 5px;
            border-left: solid red 5px;
        }
        .laser-rightTop{
            top: 0;
            right: 0;
            border-top: solid red 5px;
            border-right: solid red 5px;
        }
        .laser-rightBottom{
            bottom: 0;
            right: 0;
            border-bottom: solid red 5px;
            border-right: solid red 5px;
        }
        </style>
<div id="bread">
  <div class="container">
    <p>Beranda / Area Anggota</p>
  </div>
</div>
<section id="boxTerbaru">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3">
          <?php $this->load->view('area-anggota/menu_anggota') ?>
        </div>
        <div class="col-md-9 col-sm-9">
          <div class="panel panel-default">
            <div class="panel-heading">Pinjam Buku</div>
            <div class="panel-body">  
              <div class="alert alert-info">
                Untuk mengganti kamera depan atau belakang, silahkan tekan tombol refresh <a href="<?php echo site_url('area_anggota/pinjambuku') ?>" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i> Refresh</a>
                <span class="close" data-dismiss="alert">&times;</span>
              </div>
              <?php echo $this->session->flashdata('alert') ?>
              <form class="form-horizontal" action="<?php echo site_url('area_anggota/prosespinjam') ?>" method="post">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Scan Buku</label>
                  <div class="col-sm-8">
                    <select class="form-control" id="camera-select"></select><br>
                     <div class="well" style="position: relative;display: inline-block;margin-bottom: 0">
                            <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                            <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                        </div><br>
                      <small>Arahkan kamera ke QR Code Buku</small>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kode Buku</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input type="text" class="form-control" name="kdbuku" id="kdbuku" placeholder="Kode Buku">
                      <span class="input-group-btn">
                        <button class="btn btn-info" id="btn-ok" type="button">OK!</button>
                      </span>
                    </div><!-- /input-group -->
                    <small>Masukan kode buku di sini jika QR Code Buku tidak terdeteksi</small>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">List Buku</label>
                  <div class="col-sm-10">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>ID</th><th>Judul</th><th>Qty</th><th>Hapus</th>
                          </tr>
                        </thead>
                        <tbody id="listbuku"></tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="ket" placeholder="Keterangan"></textarea>
                  </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<script type="text/javascript" src="<?php echo base_url() ?>assets/webcodecamjs/js/webcodecamjs.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/webcodecamjs/js/DecoderWorker.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/webcodecamjs/js/qrcodelib.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/webcodecamjs/js/main.js"></script>
  <script type="text/javascript">
    // var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
    // var arg = { resultFunction: function(result) { var aChild = document.createElement('li');
    // aChild[txt] = result.format + ': ' + result.code;
    // document.querySelector('body').appendChild(aChild); } };
    var arg = {
      resultFunction: function(result){
        var id = result.code;
        $.ajax({
          url: "<?php echo site_url('area_anggota/get_detail_buku') ?>/"+id,
          type: "GET",
          dataType: "JSON",
          success:function(res){
            var audio = new Audio('<?php echo base_url() ?>assets/webcodecamjs/audio/beep.mp3');
                audio.play();
            var html = '<tr>'+
                  '<td>'+result.code+'<input type="hidden" name="baris[]"></td>'+
                  '<td>'+res.judul+'<input type="hidden" name="buku[]" value="'+result.code+'"></td>'+
                  '<td><input type="number" name="qty[]" class="form-control" value="1" style="width:60px;"></td>'+
                  '<td><button type="button" class="btn btn-danger btn-sm hps"><i class="fa fa-remove"></i></button></td>'+
                '</tr>';
            $('#listbuku').append(html);
          }
        });
        
      }
    }

     var constraints = {
        video: true,
        facingMode: "environment"
    };

    var decoder = new WebCodeCamJS("canvas").init(arg).buildSelectMenu('#camera-select', 1);

    setTimeout(function(){
          decoder.play();
    }, 50);

    $('body').on('click', '.hps', function(){
      $(this).parents('tr').remove();
    })

    $("#btn-ok").click(function(){
      var id = $("#kdbuku").val();
       $.ajax({
          url: "<?php echo site_url('area_anggota/get_detail_buku') ?>/"+id,
          type: "GET",
          dataType: "JSON",
          success:function(res){
            $("#kdbuku").val('');
            var audio = new Audio('<?php echo base_url() ?>assets/webcodecamjs/audio/beep.mp3');
                audio.play();
            var html = '<tr>'+
                  '<td>'+res.id_buku+'<input type="hidden" name="baris[]"></td>'+
                  '<td>'+res.judul+'<input type="hidden" name="buku[]" value="'+res.id_buku+'"></td>'+
                  '<td><input type="number" name="qty[]" class="form-control" value="1" style="width:60px;"></td>'+
                  '<td><button type="button" class="btn btn-danger btn-sm hps"><i class="fa fa-remove"></i></button></td>'+
                '</tr>';
            $('#listbuku').append(html);
            // alert(res.judul);
          }
        });
    })
</script>
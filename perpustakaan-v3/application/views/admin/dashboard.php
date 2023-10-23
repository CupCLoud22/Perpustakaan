  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="alert alert-info">
        Harap rapihkan kembali buku ke tempatnya saat siswa mengembalikan buku yang telah dipinjam
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Anggota</span>
              <span class="info-box-number"><?php echo $anggota ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-book-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Buku</span>
              <span class="info-box-number"><?php echo $buku ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pengunjung</span>
              <span class="info-box-number"><?php echo $pengunjung ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Peminjaman</span>
              <span class="info-box-number"><?php echo $peminjaman ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- ChartJS -->
<script src="<?php echo base_url() ?>assets/plugins/chartjs/Chart.min.js"></script>
<script>
    $(document).ready(function(){
      showPinjamBuku();

      function showPinjamBuku(){
        $.ajax({
          url : "<?php echo site_url('admin/dashboard/get_pinjam_terakhir') ?>",
          type : "POST",
          success : function (respon){
            $("#dtPeminjaman").html(respon);
          }
        });
      }

      $("#bln").change(function(){
        var bln = $(this).val();
        
        showGrafik(bln);


      })

      showGrafik(0);
      

      function showGrafik(bln){
        var ctx = document.getElementById('myChart').getContext('2d');
        dt_tgl = [];
        dt_ttl = [];

        $.ajax({
        url: "<?php echo site_url('admin/dashboard/get_pengunjung') ?>",
        type: "POST",
        dataType: "JSON",
        data: {bln:bln},
        success:function(data){
          // console.log(data);

          var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.tgl,
                    datasets: [{
                        label: 'Total Pengunjung Perpustakaan',
                        data: data.nilai,
                        borderWidth: 1
                    }]
                },
                options: {
                  responsive: true,
                  title: {
                    display: true,
                    text: 'Statistik'
                  },
                  scales: {
                    xAxes: [{
                      display: true,
                      scaleLabel: {
                        display: true,
                        labelString: 'Tanggal'
                      }
                    }],
                    yAxes: [{
                      display: true,
                      scaleLabel: {
                        display: true,
                        labelString: 'Total Pengunjung'
                      },
                      ticks: {
                        beginAtZero: true
                      }
                    }]
                  }
                    // scales: {
                    //     yAxes: [{
                    //         ticks: {
                    //             beginAtZero: true
                    //         }
                    //     }]
                    // }
                }
            });

        }
      });

      }
      

    });
  </script>
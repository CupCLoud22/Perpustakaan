    <footer>
        <div class="footer-top">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <img src="<?php echo base_url('assets/dist/img/'.$wp->wp_logo) ?>" alt="Logo" width="80%" style="margin-bottom:20px;width:50px;">
                <table>
                  <tr>
                    <td colspan="2"><?php echo $wp->wp_nama ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td> : <?php echo $wp->wp_alamat ?></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-4">
                <h4>Link Terkait</h4>
                <ul>
                  <li><a href="https://stmik-amikbandung.ac.id/" target="_blank">Website Lembaga</a></li>
                  <li><a href="#" target="_blank">Perpustakaan Lembaga</a></li>
                  <li><a href="https://www.perpusnas.go.id/" target="_blank">Perpustakaan Nasional</a></li>
                  <li><a href="#" target="_blank">Library Lembaga</a></li>
                </ul>
              </div>

               <div class="col-md-4">
                <h4>Kontak</h4>
                <table>
                  <tr>
                    <td>Email</td>
                    <td> : <?php echo $wp->wp_email ?></td>
                  </tr>
                  <tr>
                    <td>Telp.</td>
                    <td> : <?php echo $wp->wp_telp ?></td>
                  </tr>
                </table>
              </div>

            </div>
          </div>
          
        </div>
        <div class="footer-bottom text-center">
          <small>Copyright &copy; 2023 - Perpustakaan. All Rights Reserved.</small>
        </div>
    </footer>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/slick/slick/slick.js"></script>
    <script>
      $('.autoplay').slick({
       dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 8,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000
      });
    </script>
  </body>
</html>
<div id="bread">
  <div class="container">
    <p>Beranda / Jurnal</p>
  </div>
</div>
<section id="boxCariBuku">
    <div class="container">
      <div class="section-title text-center">
        <h3>Jurnal</h3>
        <p>Link Jurnal Per Prodi</p>
      </div>
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php 
          $no = 1;
          foreach($prodi->result_array() as $p){
        ?>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $p['id_prodi'] ?>" aria-expanded="true" aria-controls="collapseOne">
                <?php echo $no++.'. Jurnal '.$p['nm_prodi'] ?>
              </a>
            </h4>
          </div>
          <div id="<?php echo $p['id_prodi'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead class="bg-info">
                    <tr>
                      <th width="50px">No</th><th>Link</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $numb = 1;
                      $getJurnal = $this->db->query("SELECT * FROM tb_jurnal WHERE id_prodi = '".$p['id_prodi']."' ORDER BY id_jurnal DESC");
                      if($getJurnal->num_rows() > 0){
                        foreach($getJurnal->result_array() as $j){
                    ?>
                    <tr>
                      <td><?php echo $numb++ ?></td>
                      <td><a href="<?php echo $j['url_jurnal'] ?>" target="_blank"><?php echo $j['nm_jurnal'] ?></a></td>
                    </tr>
                  <?php }}else{ ?>
                    <tr>
                      <td colspan="2">Tidak ada jurnal</td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
      <!-- /.panel-group -->
    </div>
  </section>
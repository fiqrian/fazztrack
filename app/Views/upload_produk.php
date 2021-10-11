<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>

  <div class="container-fluid">
    <!-- data produk -->
    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">TAMBAH PRODUK</a>

    <table class="table table-bordered">
      <tr>
        <th>Nama Barang</th>
        <th>Keterangan</th>
        <th>Harga</th>
        <th>jumlah</th>
        <th>Edit</th>
        <th>hapus</th>
      </tr>

      <?php
      foreach ($produk  as $data) {
        echo "<tr>";
        echo "<td>$data->nama_produk</td>";
        echo "<td>$data->keterangan</td>";
        echo "<td>$data->harga</td>";
        echo "<td>$data->jumlah</td>";
        echo "<td><a href='Home/edit_page/$data->id'><button class='btn btn-primary btn-xs'>Edit</button></a></td>";
        echo "<td><button class='btn btn-danger btn-xs' onclick='produk($data->id)'>Hapus</button> </td>";
        echo "</tr>";
      }
      ?>
    

    </table>


  </div>

  <p id="test"> </p>

  <!-- JS -->
  <script>
    
    function produk(id) {
      document.getElementById("test").innerHTML = "jalan/" + id;
      $('#form_hapus')[0].reset();
      $.ajax({
        url: "<?php echo base_url('Home/Get_id_produk') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          $('[name="id"]').val(data.id);
          $('#modal-default').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Gagal ambil ajax');
        }

      });
    }
    // function edit(id) {
    //   document.getElementById("test").innerHTML = "jalan/" + id;
    //   $('#form_hapus')[0].reset();
    //   $.ajax({
    //     url: "<?php echo base_url('Home/Get_id_produk') ?>/" + id,
    //     type: "GET",
    //     dataType: "JSON",
    //     success: function(data) {
    //       $('[name="id"]').val(data.id);
    //       $('#exampleModalToggle1').modal('show');
    //     },
    //     error: function(jqXHR, textStatus, errorThrown) {
    //       alert('Gagal ambil ajax');
    //     }

    //   });
    // }
  </script>

  <!-- Modal hapus -->
    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to continue?</h4>
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <div class="col-6">
                            <form action="<?php echo base_url('Home/hapus_produk') ?>" id="form_hapus" method="post">
                                <input type="hidden" name="id" value="">
                                <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                NO
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
                            YES
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Modal tambah -->
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Masukan Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php echo form_open('tambah_produk'); ?>
                <?= csrf_field(); ?>
          <div class="form-group">
            <label>Nama Produk</label>
        
            <input type="text" name="nama_produk"  class="form-control">
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
          </div>
          <div class="form-group">
            <label>harga</label>
            <input type="text" name="harga" class="form-control">
          </div>
          <div class="form-group">
            <label>jumlah</label>
            <input type="text" name="jumlah" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary third">Simpan</button>
        </div>
      
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  
  
  <!-- <script src="<?php echo base_url('assets/src/plugins/jquery-steps/jquery.steps.js') ?> "></script>
  <script src="<?php echo base_url('assets/vendors/scripts/steps-setting.js') ?>"></script> -->
  <!-- js -->
  <!-- <script src="<?php echo base_url('assets/vendors/scripts/core.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendors/scripts/script.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendors/scripts/process.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendors/scripts/layout-settings.js') ?>"></script>
  <script src="<?php echo base_url('assets/src/plugins/apexcharts/apexcharts.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/src/plugins/datatables/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/src/plugins/datatables/js/dataTables.responsive.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendors/scripts/dashboard.js') ?>"></script> -->
</body>

<!-- menjalankan ajax $.ajax  -->
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <!-- end -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

</html>
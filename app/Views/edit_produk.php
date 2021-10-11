<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Edit Produk</title>
</head>
<body>
    <div class="main-container">
         <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Form Wali Kelas</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/'); ?>">Data Produk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">edit produk</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
         <?php echo form_open('edit_produk'); ?>
                <?= csrf_field(); ?>
          <div class="form-group">
              <?php foreach($produk as $data) ?>
            <label>Nama Produk</label>
            <input type="hidden" name="id" value="<?php echo $data->id ?>">
            <input type="text" name="nama_produk" value="<?php echo $data->nama_produk ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Keterangan</label>
        
            <input type="text" name="keterangan" value="<?php echo $data->keterangan ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>harga</label>
            <input type="text" name="harga" value="<?php echo $data->harga ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>jumlah</label>
            <input type="text" name="jumlah" value="<?php echo $data->jumlah ?>" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary third">Simpan</button>
        </div>
      
        <?php echo form_close(); ?>
      </div>
    </div>
    
</body>
</html>
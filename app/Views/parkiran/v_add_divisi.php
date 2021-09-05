<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Tambah Kendaraan Kepala Divisi</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Parkiran</li>
                <li class="breadcrumb-item active">Divisi</li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Kendaraan Kepala Divisi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?= base_url() ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="no_plat">Plat Nomor Kendaraan</label>
                    <input type="text" class="form-control" id="no_plat" placeholder="Masukkan plat nomor kendaraan" name="no_plat">
                  </div>
                  <div class="form-group">
                    <label for="nama_pemilik">Nama Pemilik Kendaraan</label>
                    <input type="text" class="form-control" id="nama_pemilik" placeholder="Masukkan nama pemilik kendaraan" name="nama_pemilik">
                  </div>
                  <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" placeholder="Masukkan jabatan" name="jabatan">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>


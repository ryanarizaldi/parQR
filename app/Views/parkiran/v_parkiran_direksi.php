<?= $this->extend('template') ?>
<?= $this->section('content') ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parkiran Direksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Parkiran</li>
              <li class="breadcrumb-item active">Direksi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                      <h3 class="card-title">Daftar Parkiran Direksi</h3>
                      <a href="<?= base_url('direksi/add') ?>" class="btn btn-success"><i class="fas fa-plus  "></i> Tambah Kendaraan</a>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th><b>NO</b></th>
                        <th>Plat Nomor</th>
                        <th>Nama Pemilik</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $num=1; foreach ($direksi as $key):?>
                        <tr>
                            <td><?= $num ?></td>
                            <td><?= $key['no_plat'] ?></td>
                            <td><?= $key['nama_pemilik'] ?></td>
                            <td><?= $key['jabatan'] ?></td>
                            <td>
                                <a href="<?= base_url('direksi/edit/'.$key['no_plat']) ?>" class="btn btn-info"><i class="fas fa-edit"> Edit </i></a>
                                <a href="<?= base_url('Parkiran/deleteCar/'.$key['no_plat'])?>" class="btn btn-danger remove"><i class="fas fa-trash" onclick="asd()"> Hapus </i></a>
                                <a class="btn btn-info " target="_blank" href="<?= base_url('print/'.$key['no_plat']) ?>"><i class="fas fa-print" > Print QR Code </i></a>
                            </td>
                        </tr>
                        <?php $num++ ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
<?= $this->endSection() ?>

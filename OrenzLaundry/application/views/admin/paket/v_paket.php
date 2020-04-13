<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Paket</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Paket</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-6">
        <button class="btn btn-sm btn-ijo mb-2" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Barang</button>
      </div>
      <div class="col-6 text-right">
        <a class="btn btn-sm btn-warning mb-2" href="<?=base_url()?>admin/promo"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Pdf</a>
      </div>
    </div>
    
    <?php echo $this->session->flashdata('pesan');?>
    <div class="row card shadow">
      <div class="col card-body table-responsive">
        <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($paket as $pk ) { ?>
          <tr>
            <td><?=$no++?></td>
            <td><?=$pk->nama_paket?></td>
            <td><?=$pk->harga?></td>
            <td class="text-center">
                <?php if($pk->status == "Aktif"){?>
                <span class="badge badge-pill px-4 badge-warning"><?=$pk->status?></span>
                <?php }else{ ?>
                <span class="badge badge-pill px-4 badge-secondary"><?=$pk->status?></span>
                <?php }?>
              </td>
              <td class="text-center">
                <?php echo anchor('admin/promo/edit/' . $pk->id_paket, '
                <div class="btn btn-primary btn-sm mr-2"><i class="fa fa-edit"></i></div>')?>
                <?php echo anchor('admin/promo/destroy/' . $pk->id_paket, '
                <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?>
              </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form action="<?= base_url() . 'admin/promo/tambah'; ?>" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bolder text-ijo">Tambah Data Paket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="judul_promo">Nama Paket</label>
          <input type="text" name="judul_promo" id="judul_promo" class="form-control" placeholder="Masukkan Judul Pomo . ." aria-describedby="namapaket" maxlength="100">
          <small id="namapaket" class="text-muted">Masukkan Nama Paket tidak lebih dari 100 Karakter</small>
        </div>
        <div class="form-group">
          <label for="nama_jenis_paket">Jenis Paket</label>
            <select name="nama_jenis_paket" id="nama_jenis_paket" class="form-control mb-3" placeholder="Masukkan Jenis Paket . ." aria-describedby="jenispaket">
              <option value="reguler">Reguler</option>
              <option value="exspres">Exspres</option>
              <option value="satuan">Satuan</option>
            </select>
          <small id="jenispaket" class="text-muted">Pilih Jenis Paket yang Anda Perlukan.</small>
        </div>
        <div class="form-group">
          <label for="nama_isi_paket">Isi Paket</label>
            <select name="nama_isi_paket" id="nama_isi_paket" class="form-control mb-3" placeholder="Masukkan Isi Paket . ." aria-describedby="isipaket">
              <option value="cks">CKS (Cuci, Kering, Setrika)</option>
              <option value="ck">CK (Cuci, Kering)</option>
              <option value="s">S (Setrika)</option>
            </select>
          <small id="isipaket" class="text-muted">Pilih isi Paket yang Anda Perlukan.</small>
        </div>
        <div class="form-group">
          <label for="harga">Harga Paket</label><br>
          <input type="text" name="harga" id="harga" class="form-control d-inline w-25" placeholder="Harga . ." aria-describedby="jumlahharga">
          <small id="jumlahharga" class="text-muted">Jumlah Harga</small>
        </div>
        <div class="form-group">
          <label for="nama_isi_paket">Durasi Paket</label>
            <select name="durasi_paket" id="durasi_paket" class="form-control mb-3" placeholder="Masukkan Durasi Paket . ." aria-describedby="durasipaket">
              <option value="3hari">3 Hari</option>
              <option value="7hari">7 Hari</option>
              <option value="1hari">1 Hari</option>
            </select>
          <small id="durasipaket" class="text-muted">Pilih Durasi Paket.</small>
        </div>
        <div class="form-group">
          <label for="nama_barang">Barang</label>
            <select name="nama_barang" id="nama_barang" class="form-control mb-3" placeholder="Masukkan Barang . ." aria-describedby="barang">
              <option value="#"></option>
              <option value="#"></option>
              <option value="#"></option>
            </select>
          <small id="barang" class="text-muted">Barang.</small>
        </div>
        <div class="form-group w-50">
          <label for="status">Status Paket</label>
          <select class="form-control" name="status" id="status">
            <option>Pilih Status Paket :</option>
            <option value="Aktif">Aktif</option>
            <option value="Draft">Draft</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-ijo">Tambah</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->


  <!-- End of Page Wrapper -->
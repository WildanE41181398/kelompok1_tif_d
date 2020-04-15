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
        <a class="btn btn-sm btn-warning mb-2" href="<?=base_url()?>admin/C_paket"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Pdf</a>
      </div>
    </div>
    
    <?php echo $this->session->flashdata('pesan');?>
    <div class="row card shadow">
      <div class="col card-body table-responsive">
        <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th>No</th>
            <th>Id Paket</th>
            <th>Nama Paket</th>
            <th>Nama Barang</th>
            <th>Jenis Paket</th>
            <th>Isi Paket</th>
            <th>Durasi</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Gambar</th>
            <th>Created by</th>
            <th>Created at</th>
            <th>Updated by</th>
            <th>Updated at</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($detail as $pk ) {
        $id = $pk['id_paket'];
            ?>
          <tr>
            <td><?=$no++;?></td>
            <td><?=$id;?></td>
            <td><?=$pk['nama_paket']?></td>
            <td>
                <?php if ($pk['id_barang'] == 'IB000000000001') {
                    echo 'Baju';
                }elseif ($pk['id_barang'] == 'IB000000000002') {
                    echo 'Boneka';
                }else {
                    echo 'Selimut';
                }?>
            </td>
            <td>
                <?php if ($pk['id_jenis_paket'] == 'JP000000000001') {
                    echo 'Regular';
                }elseif ($pk['id_jenis_paket'] == 'JP000000000002') {
                    echo 'Express';
                }else {
                    echo 'Satuan';
                }?>
            </td>
            <td>
                <?php if ($pk['id_isi_paket'] == 'IP000000000001') {
                    echo 'CKS(Cuci, Kering, Setrika)';
                }elseif ($pk['id_isi_paket'] == 'IP000000000002') {
                    echo 'CK(Cuci, Kering)';
                }else {
                    echo 'S(Setrika)';
                }?>
            </td>
            <td>
                <?php if ($pk['id_durasi'] == 'ID000000000001') {
                    echo '2 hari';
                }elseif ($pk['id_durasi'] == 'ID000000000002') {
                    echo '3 hari';
                }else {
                    echo '7 hari';
                }?>
            </td>
            <td><?=$pk['harga']?></td>
            <td class="text-center">
            <?php if ($pk['status'] == 'Aktif') {
                    echo '<span class="badge badge-pill px-4 badge-warning">Aktif</span>';
                }else {
                    echo '<span class="badge badge-pill px-4 badge-secondary">Draft</span>';
                }?>
            </td>
            <td><?=$pk['gambar']?></td>
            <td><?=$pk['created_by']?></td>
            <td><?=$pk['created_at']?></td>
            <td><?=$pk['updated_by']?></td>
            <td><?=$pk['updated_at']?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</footer>
      <!-- End of Footer -->

    </div>
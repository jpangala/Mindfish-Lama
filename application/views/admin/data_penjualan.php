<html>
<head>

</head>
<body>
<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Penjualan</button>
    <table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
        <th>No</th>
        <th>Nomor Penjualan</th>
        <th>Nama Pembeli</th>
        <th>Total Harga</th>
        <th>Tanggal Dibuat</th>
        <th>Tanggal Selesai</th>
        <th>Status</th>
        <th colspan="3">AKSI</th>
        </tr>
    </thead>

        <?php
        $no=1;
        foreach($penjualan as $pjl) : ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $pjl->no_penjualan ?></td>
                <td><?php echo $pjl->nama_pembeli ?></td>
                <td>Rp <?php echo number_format($pjl->total_harga,0,',','.') ?></td>
                <td><?php echo $pjl->tanggal_dibuat ?></td>
                <td><?php echo $pjl->tanggal_selesai ?></td>
                <td><?php echo $pjl->status ?></td>
                <td><?php echo anchor ('admin/data_penjualan/detail/' .$pjl->id, '<div class="btn btn-success btn-sm"><i class="fas fa-info-circle"></i></div>') ?>
                <td><?php echo anchor ('admin/data_pesanan/edit/' .$pjl->id, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
                <td><?php echo anchor('admin/data_pesanan/hapus/' .$pjl->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
            </tr>
        <?php $no++; endforeach; ?>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?php echo base_url().'admin/data_penjualan/no_penjualan';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-group">
                    <label>Nama Pembeli</label>
                    <input type="text" name="nama_pembeli" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Dibuat</label>
                    <input type="datetime-local" name="tanggal_dibuat" class="form-control" required>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
</body>

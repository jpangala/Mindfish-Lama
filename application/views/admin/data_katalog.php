<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Ikan</button>
    <table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
        <th>No</th>
        <th>Nama Ikan</th>
        <th>Jumlah Stok</th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th colspan="3">AKSI</th>
        </tr>
    </thead>

        <?php
        $no=1;
        foreach($ikan as $katalog) : ?>
            <tr>
                <td class="no"><?php echo $no++ ?></td>
                <td style="display:none;" class="id_ikan"><?php echo $katalog->id ?></td>
                <td class="nama_ikan"><?php echo $katalog->nama_ikan ?></td>
                <td class="stok"><?php echo $katalog->stok ?></td>
                <td>Rp <?php echo number_format($katalog->harga,0,',','.'); ?></td>
                <td class="deskripsi"><?php echo $katalog->deskripsi ?></td>
                <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_ikan"><i class="fas fa-edit"></i></button></td>
                <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_ikan"><i class="fas fa-trash"></i></button></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>


<!-- Modal Tambah -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Katalog Ikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?php echo base_url().'admin/data_katalog/tambah_ikan';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label>Nama Ikan</label>
                    <input type="text" name="nama_ikan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jumlah Stok</label>
                    <input type="number" name="jumlahstok" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama Pembudidaya</label>
                    <input type="text" name="nama_pembudidaya" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Input</label>
                    <input type="datetime-local" name="tanggal" class="form-control" required>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit_ikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Ikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?php echo base_url().'admin/data_katalog/edit_ikan';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <input type="text" name="id_ikan" class="form-control id_ikan" hidden>
            </div>
            <div class="form-group">
                    <label>Nama Ikan</label>
                    <input type="text" name="nama_ikan" class="form-control nama_ikan" required>
            </div>
            <div class="form-group">
                    <label>Jumlah Stok</label>
                    <input type="number" name="jumlahstok" class="form-control stok" disabled>
            </div>
            <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control deskripsi" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapus_ikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Ikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form method="POST" action="<?php echo base_url('admin/data_katalog/hapus_ikan'); ?>">
      <div class="form-group">
      <input type="text" name="id_ikan"  class="form-control id_ikan_hapus" hidden>
      <p> Apakah Anda yakin ingin menghapus Data Ikan berikut? </p>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
      <button type="submit" class="btn btn-danger">Ya</button>
      </div>
    </form>
  </div>
</div>
</div>

<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script>
    $('#edit_ikan').on('shown.bs.modal', function (e) {
    var _button = $(e.relatedTarget);
    // console.log(_button, _button.parents("tr"));
    var _row = _button.parents("tr");
    var _nama_ikan = _row.find(".nama_ikan").text();
    var _stok = _row.find(".stok").text();
    var _deskripsi = _row.find(".deskripsi").text();
    var _id_ikan = _row.find(".id_ikan").text();
   


    $(this).find(".nama_ikan").val(_nama_ikan);
    $(this).find(".id_ikan").val(_id_ikan);
    $(this).find(".deskripsi").val(_deskripsi);
    $(this).find(".stok").val(_stok);
    });


    $('#hapus_ikan').on('shown.bs.modal', function (e) {
    var _button = $(e.relatedTarget);
    // console.log(_button, _button.parents("tr"));
    var _row = _button.parents("tr");
    var _id_ikan_hapus = _row.find(".id_ikan").text();

    
    $(this).find(".id_ikan_hapus").val(_id_ikan_hapus);

    });
</script>
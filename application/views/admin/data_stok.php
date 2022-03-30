<?php $this->load->view('templates_admin/header');?>
<?php $this->load->view('templates_admin/sidebar_akun');?>
<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_stok"><i class="fas fa-plus fa-sm"></i> Perubahan Stok</button>
    <table id="tables" class="table table-bordered">
    <thead class="thead-dark">
        <tr>
        <th>No</th>
        <th>No1</th>
        <th>Noo</th>
        <th>Nama Ikan</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>Nama Pembudidaya</th>
        <th>Timestamp</th>
        <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach($stok as $katalog) : ?>
            <tr>
                <td class="no"><?php echo $no++ ?></td>
                <td style="display:none;" class="id_stok"><?php echo $katalog->id ?></td>
                <td style="display:none;" class="id_ikan"><?php echo $katalog->id_ikan ?></td>
                <td class="nama_ikan"><?php echo $katalog->nama_ikan ?></td>
                <td class="stok"><?php echo $katalog->status ?></td>
                <td class="keterangan"><?php echo $katalog->keterangan ?></td>
                <td class="nama_pembudidaya"><?php echo $katalog->nama_pembudidaya ?></td>
                <td class="tanggal"><?php echo $katalog->tanggal ?></td>
                <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_stok"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_stok"><i class="fas fa-trash"></i></button></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_stok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?php echo base_url().'admin/data_katalog/tambah_stok';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label>Nama Ikan</label>
                    <select name="nama_ikan" class="form-control">
                    <?php foreach($ikan as $katalog) : ?>
                    <option value="<?php echo $katalog->id ?>"><?php echo $katalog->nama_ikan ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama Pembudidaya</label>
                    <input type="text" name="nama_pembudidaya" class="form-control" required>
                </div>                
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="datetime-local" name="tanggal" class="form-control" required>
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

<!-- Modal Edit -->
<div class="modal fade" id="edit_stok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?php echo base_url().'admin/data_katalog/edit_stok';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <input type="text" name="id_ikan" class="form-control id_ikan" hidden>
            </div>
            <div class="form-group">
                    <input type="text" name="id_stok" class="form-control id_stok" hidden>
            </div>
            <div class="form-group">
                    <label>Nama Ikan</label>
                    <select name="id_ikan" class="form-control">
                    <?php foreach($ikan as $katalog) : ?>
                    <option value="<?php echo $katalog->id ?>"><?php echo $katalog->nama_ikan ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            <div class="form-group">
                    <label>Stok</label>
                    <input type="text" name="stok" class="form-control stok" required>
            </div>
            <div class="form-group">
                    <label>keterangan</label>
                    <input type="text" name="keterangan" class="form-control keterangan" required>
            </div>
            <div class="form-group">
                    <label>Nama Pembudidaya</label>
                    <input type="text" name="nama_pembudidaya" class="form-control nama_pembudidaya" required>
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

<!-- Modal Hapus -->
<div class="modal fade" id="hapus_stok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form method="POST" action="<?php echo base_url('admin/data_katalog/hapus_stok'); ?>">
        <div class="form-group">
          <input type="text" name="id_stok"  class="form-control id_stok_hapus" hidden>
            <p> Apakah Anda yakin ingin menghapus Data Stok berikut? </p>
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
    $('#edit_stok').on('shown.bs.modal', function (e) {
    var _button = $(e.relatedTarget);
    // console.log(_button, _button.parents("tr"));
    var _row = _button.parents("tr");
    var _nama_ikan = _row.find(".nama_ikan").text();
    var _stok = _row.find(".stok").text();
    var _keterangan = _row.find(".keterangan").text();
    var _nama_pembudidaya = _row.find(".nama_pembudidaya").text();
    var _id_ikan = _row.find(".id_ikan").text();
    var _id_stok = _row.find(".id_stok").text();

    
    $(this).find(".nama_ikan").val(_nama_ikan);
    $(this).find(".nama_pembudidaya").val(_nama_pembudidaya);
    $(this).find(".id_ikan").val(_id_ikan);
    $(this).find(".id_stok").val(_id_stok);
    $(this).find(".keterangan").val(_keterangan);
    $(this).find(".stok").val(_stok);
    });

    $('#hapus_stok').on('shown.bs.modal', function (e) {
    var _button = $(e.relatedTarget);
    // console.log(_button, _button.parents("tr"));
    var _row = _button.parents("tr");
    var _id_stok_hapus = _row.find(".id_stok").text();

    
    $(this).find(".id_stok_hapus").val(_id_stok_hapus);

    });

</script>
<script>
  $(document).ready(function() {
    $('#tables').DataTable({
      "aoColumnDefs": [ { "sClass": "dpass", "aTargets": [ 1,2]} ]

    });
} );
</script>
<?php $this->load->view('templates_admin/footer');?>



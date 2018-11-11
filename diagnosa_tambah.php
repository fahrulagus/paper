<?php if($_POST) include'aksi.php'?>
<!-- Modal -->
<div class="modal fade" id="modal_diagnosa_tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Diagnosa</h4>
      </div>
      
        <?php if($_POST) include'aksi.php'?>        
        <form method="post" enctype="multipart/form-data" action="?m=diagnosa_tambah">
      <div class="modal-body">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" value="<?=$_POST[kode]?>"/ required>
            </div>
            <div class="form-group">
                <label>Nama Diagnosa <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$_POST[nama]?>"/ required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea rows="3" class="form-control" name="keterangan"><?=$_POST[keterangan]?></textarea>
            </div>
            <div class="form-group">
                <label>Cara Pengendalian</label>
                <textarea rows="7" class="form-control" name="pengendalian"><?=$_POST[pengendalian]?></textarea>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input class="form-control" type="file" name="gambar" value="<?=$_POST[gambar]?>"/>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-arrow-left"> Batal</button>
        <button type="submit" class="btn btn-primary"><span class="fa fa-save"> Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>
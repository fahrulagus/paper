<?php if($_POST) include 'aksi.php'; ?>
<!-- Modal -->
<div class="modal fade" id="modal_relasi_tambah" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Relasi</h4>
      </div>
      
        <?php if($_POST) include'aksi.php'?>
        <form method="post" enctype="multipart/form-data" action="?m=relasi_tambah">
      <div class="modal-body">
            <div class="form-group">
                <label>Diagnosa <span class="text-danger">*</span></label>
                <select class="form-control select2" name="kode_diagnosa" style="width: 100%;" required>
                    <option value=""></option>
                    <?=CF_get_diagnosa_option($_POST[kode_diagnosa])?>
                </select>
            </div>
            <div class="form-group">
                <label>Gejala <span class="text-danger">*</span></label>
                <select class="form-control select2" name="kode_gejala" style="width: 100%;" required>
                    <option value=""></option>
                    <?=CF_get_gejala_option($_POST[kode_gejala])?>
                </select>
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
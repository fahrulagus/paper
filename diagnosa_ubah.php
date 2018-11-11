<?php include('diagnosa_tambah.php');?>

<?php
    $row = $db->get_row("SELECT * FROM tb_diagnosa WHERE kode_diagnosa='$_GET[ID]'"); 
?>
<!-- technology -->
<div class="technology-1">
	<div class="container">
		<div class="col-md-12">
			<div class="business">
				<div class=" blog-grid2">
					<div class="blog-text">
						<h5>Ubah Diagnosa</h5>
                        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=diagnosa_ubah&ID=<?=$row->kode_diagnosa?>">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input required class="form-control" type="text" name="kode" readonly="readonly" value="<?=$row->kode_diagnosa?>"/>
            </div>
            <div class="form-group">
                <label>Nama Diagnosa <span class="text-danger">*</span></label>
                <input required class="form-control" type="text" name="nama" value="<?=$row->nama_diagnosa?>"/>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea rows="5" class="form-control" name="keterangan"><?=$row->keterangan?></textarea>
            </div>
            <div class="form-group">
                <label>Cara Pengendalian</label>
                <textarea rows="7" class="form-control" name="pengendalian"><?=$row->pengendalian?></textarea>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input class="form-control" type="file" name="gambar" value="<?=$_POST[gambar]?>"/>
            </div>
            <div class="page-header">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=diagnosa"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>						

					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<!-- technology-right -->
	</div>
</div>
<!-- technology -->
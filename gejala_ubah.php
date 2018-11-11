<?php
    $row = $db->get_row("SELECT * FROM tb_gejala WHERE kode_gejala='$_GET[ID]'"); 
?>

<!-- technology -->
<div class="technology-1">
	<div class="container">
		<div class="col-md-12">
			<div class="business">
				<div class=" blog-grid2">
					<div class="blog-text">
						<h5>Ubah Gejala</h5>
                        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=gejala_ubah&ID=<?=$row->kode_gejala?>">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" readonly="readonly" value="<?=$row->kode_gejala?>"/ required>
            </div>
            <div class="form-group">
                <label>Nama Gejala <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$row->nama_gejala?>"/ required>
            </div>
            <div class="form-group">
                <label>Bobot<span class="text-danger">*</span></label>
                <input class="form-control" type="number" step="any" name="bobot" value="<?=$row->bobot?>"/ required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=gejala"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
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
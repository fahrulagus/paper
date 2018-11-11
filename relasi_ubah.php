<?php
    $row = $db->get_row("SELECT * FROM tb_relasi WHERE ID='$_GET[ID]'"); 
?>

<!-- technology -->
<div class="technology-1">
	<div class="container">
		<div class="col-md-12">
			<div class="business">
				<div class=" blog-grid2">
					<div class="blog-text">
						<h5>Ubah Relasi</h5>
            <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=relasi_ubah&ID=<?=$row->ID?>">
            <div class="form-group">
                <label>Diagnosa <span class="text-danger">*</span></label>
                <select class="form-control select2" name="kode_diagnosa">
                    <option value=""></option>
                    <?=CF_get_diagnosa_option($row->kode_diagnosa)?>
                </select>
            </div>
            <div class="form-group">
                <label>Gejala <span class="text-danger">*</span></label>
                <select class="form-control select2" name="kode_gejala">
                    <option value=""></option>
                    <?=CF_get_gejala_option($row->kode_gejala)?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=relasi"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
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
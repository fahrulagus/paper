<!-- technology -->
<div class="technology-1">
	<div class="container">
		<div class="col-md-12">
			<div class="business">
				<div class=" blog-grid2">
					<div class="blog-text">
						<h5>Ubah Kata Sandi</h5>
               	<?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=password&act=password_ubah">
        <div class="form-group">
            <label>Kata Sandi Lama <span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="pass1" required/>
        </div>
        <div class="form-group">
            <label>Kata Sandi Baru <span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="pass2" required/>
        </div>
        <div class="form-group">
            <label>Konfirmasi Kata Sandi Baru <span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="pass3" required/>
        </div>
        <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
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
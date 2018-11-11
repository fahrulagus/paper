<!-- technology -->
<div class="technology-1">
	<div class="container">
		<div class="col-md-12">
			<div class="business">
				<div class=" blog-grid2">
					<div class="blog-text">
						<h1>Konsultasi</h1>
                        				<form action="?m=hasil" method="post">
    <input type="hidden" name="m" value="hasil" />
    <div class="panel panel-default">
        <div class="panel-heading">        
            <h7 class="panel-title">Pilih Gejala</h7>
        </div>
        <table id="tabel_konsultasi" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th><center><input type="checkbox" id="checkAll" /></center></th>
                <th>No</th>
                <th>Nama Gejala</th>
            </tr>
        </thead>
        <?php
        $q = esc_field($_GET['q']);
        $rows = $db->get_results("SELECT * FROM tb_gejala ORDER BY kode_gejala");
        $no=1;
        foreach($rows as $row):?>
        <tr>
            <td><center><input type="checkbox" name="gejala[]" value="<?=$row->kode_gejala?>" /></center></td>
            <td><?=$no++?></td>
            <td><?=$row->nama_gejala?></td>
        </tr>
        <?php endforeach;
        ?>
        </table>
        <div class="panel-footer">
            <button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit Diagnosa</button>
        </div>
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
<script>
$(document).ready(function() {
        $('#tabel_konsultasi').DataTable( {
        "ordering": false,
        "pageLength": 10,
        "dom": '<"top"f>rt<"bottom"p><"clear">'
        });
});

$(function(){
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
});
</script>
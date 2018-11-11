<!-- technology -->
<div class="technology-1">
	<div class="container">
		<div class="col-md-12">
			<div class="business">
				<div class=" blog-grid2">
					<div class="blog-text">
						<h5>Relasi</h5>
                        <table id="tabel_relasi" class="table table-bordered table-hover table-striped">
    <thead>
    <tr class="nw">
        <th>No</th>
        <th>Diagnosa</th>
        <th>Gejala</th>
        <th>Bobot</th>
        <th>Aksi</th>
    </tr>
</thead>
<?php
$rows = $db->get_results("SELECT r.ID, r.kode_gejala, d.kode_diagnosa, g.nama_gejala, d.nama_diagnosa, g.bobot
    FROM tb_relasi r INNER JOIN tb_diagnosa d ON d.`kode_diagnosa`=r.`kode_diagnosa` INNER JOIN tb_gejala g ON g.`kode_gejala`=r.`kode_gejala`
    ORDER BY r.kode_diagnosa, r.kode_gejala");
$no=0;

foreach($rows as $row):?>
<tr>
    <td><?=++$no ?></td>
    <td>[<?=$row->kode_diagnosa . '] ' . $row->nama_diagnosa?></td>
    <td>[<?=$row->kode_gejala . '] ' . $row->nama_gejala?></td>
    <td><?=$row->bobot?></td>
    <td class="nw">
        <a class="btn btn-xs btn-warning" href="?m=relasi_ubah&ID=<?=$row->ID?>"><span class="glyphicon glyphicon-edit"></span></a>
        <a class="btn btn-xs btn-danger relasi-hapus" href="aksi.php?act=relasi_hapus&ID=<?=$row->ID?>"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
</tr>
<?php endforeach;
?>
    </table>

					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<!-- technology-right -->
	</div>
</div>
<!-- technology -->
<script>
                            $(document).ready(function() {
                         $('#tabel_relasi').DataTable( {
        "dom": '<"top"f<"relasi_tambah">>rt<"bottom"p><"clear">'
    } );
    $("div.relasi_tambah").html('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_relasi_tambah"><span class="fa fa-plus"> Tambah</button>');
                            });
                             
                             $('.relasi-hapus').click(function (e) {
    var href = $(this).attr('href');
    swal({
      title: "Hapus Data?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
    },
    function (isConfirm){
      if (isConfirm) {
          swal({
              title: "Deleted!",
              text: "Your row has been deleted.",
              type: "success",
              timer: 3000
           });
          window.location.href = href;
      }
    });
    return false;
});
                        </script>
<?php include('relasi_tambah.php');?>
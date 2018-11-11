<!-- technology -->
<div class="technology-1">
	<div class="container">
		<div class="col-md-12">
			<div class="business">
				<div class=" blog-grid2">
					<div class="blog-text">
						<h5>Diagnosa</h5>
    
<table id="tabel_diagnosa" class="table table-bordered table-hover table-striped">
<thead>
    <tr class="nw">
        <th>No</th>
        <th>Kode</th>
        <th>Nama Diagnosa</th>
        <th>Keterangan</th>
        <th>Cara Pengendalian</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>
</thead>

<?php
$rows = $db->get_results("SELECT * FROM tb_diagnosa ORDER BY kode_diagnosa");
$no=0;
foreach($rows as $row):?>

<tr>
    <td><?=++$no ?></td>
    <td><?=$row->kode_diagnosa?></td>
    <td><?=$row->nama_diagnosa?></td>
    <td><?=$row->keterangan?></td>
    <td><?=$row->pengendalian?></td>
    <td><img src="assets/images/diagnosa/<?=$row->gambar?>" width="100px" hight="100px"/></td>
    <td><center>
        <a class="btn btn-xs btn-warning" href="?m=diagnosa_ubah&ID=<?=$row->kode_diagnosa?>"><span class="glyphicon glyphicon-edit"></span></a>
        <a class="btn btn-xs btn-danger diagnosa-hapus" href="aksi.php?act=diagnosa_hapus&ID=<?=$row->kode_diagnosa?>"><span class="glyphicon glyphicon-trash"></span></a>

    </center></td>
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
    $('#tabel_diagnosa').DataTable( {
        "dom": '<"top"f<"diagnosa_tambah">>rt<"bottom"p><"clear">'
    } );    
    $("div.diagnosa_tambah").html('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_diagnosa_tambah"><span class="fa fa-plus"> Tambah</button>');
});
     
$('.diagnosa-hapus').click(function (e) {
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
<?php include('diagnosa_tambah.php');?>
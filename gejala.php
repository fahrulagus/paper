<!-- technology -->
<div class="technology-1">
	<div class="container">
		<div class="col-md-12">
			<div class="business">
				<div class=" blog-grid2">
					<div class="blog-text">
						<h5>Gejala</h5>
    
    <table id="tabel_gejala" class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Gejala</th>
            <th>Bobot</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <?php
    $rows = $db->get_results("SELECT * FROM tb_gejala ORDER BY kode_gejala");
    $no=0;
    foreach($rows as $row):?>
        <tr>
        <td><?=$row->kode_gejala ?></td>
        <td><?=$row->nama_gejala?></td>
        <td><?=$row->bobot?></td>
        <td class="nw">
            <a class="btn btn-xs btn-warning" href="?m=gejala_ubah&ID=<?=$row->kode_gejala?>"><span class="glyphicon glyphicon-edit"></span></a>
            <a class="btn btn-xs btn-danger gejala-hapus" href="aksi.php?act=gejala_hapus&ID=<?=$row->kode_gejala?>"><span class="glyphicon glyphicon-trash"></span></a>
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
                        $('#tabel_gejala').DataTable( {
        "dom": '<"top"f<"gejala_tambah">>rt<"bottom"p><"clear">'
    } );    
    $("div.gejala_tambah").html('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_gejala_tambah"><span class="fa fa-plus"> Tambah</button>');
                            });
                            
                            $('.gejala-hapus').click(function (e) {
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
<?php include('gejala_tambah.php');?>
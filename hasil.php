<!-- technology -->
<div class="technology-1">
	<div class="container">
		<div class="col-md-12">
			<div class="business">
				<div class=" blog-grid2">
					<div class="blog-text">
						<h1>Hasil Diagnosa</h1>
						<?php
                            $selected = (array) $_POST[gejala];
                            if(!$selected):
                                print_msg('Belum ada gejala terpilih. <a href="?m=konsultasi">Kembali</a>'); else: $rows = $db->get_results("SELECT * FROM tb_gejala WHERE kode_gejala IN ('".implode("','", $selected)."')"); ?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h7 class="panel-title">Gejala Terpilih</h7>
							</div>
							<table class="table table-bordered table-hover table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Gejala</th>
							</tr>
							</thead>
							<?php
                                $no=1;
                                foreach($rows as $row):
                            ?>
							<tr>
								<td><?=$no++?></td>
								<td><?=$row->nama_gejala?></td>
							</tr>
							<?php endforeach;?>
                            </table>
						</div>
						<div>
							<button class="btn btn-primary" id="tampil">Tampilkan Perhitungan</button>
							<script>
                                    $("#tampil").click(function(){
                                    $('#tampil1').slideToggle("slow");
                                });
                            </script>
						</div>
						<div id="tampil1" style="display:none">
							<?php
                                $GEJALA = DS_gejala();
                                $DIAGNOSA = DS_diagnosa();  
                                $hasil[] = array(
                                            'arr' => array_keys($DIAGNOSA),
                                            'name' => implode(',', array_keys($DIAGNOSA)), 'value' => 1, );
                                    foreach ($selected as $kode): $new_hasil = array(); $arr_diagnosa = DS_get_diagnosa($kode); 
                            ?>
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h7 class="panel-title"><?=$GEJALA[$kode][nama] .' ( ' . implode(', ', $arr_diagnosa) .' )'?></h7>
								</div>
								<table class="table table-bordered table-hover table-striped">
								<thead>
								<tr>
									<th>#</th>
									<th><?=implode(',', $arr_diagnosa) .' &raquo; ' . $GEJALA[$kode][bobot]?></th>
									<th>&oslash; &raquo; <?=1 - $GEJALA[$kode][bobot]?></th>
								</tr>
								</thead>

								<?php foreach ($hasil as $row): 
                				$arr = array_intersect($row[arr], $arr_diagnosa); 
				                $name =  implode(',', $arr);
				                $value = $row[value] * $GEJALA[$kode][bobot];
				                $new_hasil[] = array(   
                						'arr' =>$arr,
                                        'name' => $name,
                                        'value' => $value, 
                                        ); 
                                $arr2 = array_intersect($row[arr], array_keys($DIAGNOSA)); 
                                $name2 = implode(',', $arr2); $value2 = $row[value] * (1 - $GEJALA[$kode][bobot]); 
                                $new_hasil[] = array( 
		                                'arr' => $arr2, 
		                                'name' => $name2, 
		                                'value' => $value2, 
		                                ); 
                                $hasil = $new_hasil; 
                            	?>
								<tr>
									<td><?=$row[name]?>
										 &raquo; <?=round($row[value], 4)?></td>
									<td><?=$name?>
										 &raquo; <?=round($value, 4)?></td>
									<td><?=$name2?>
										 &raquo; <?=round($value2, 4)?></td>
								</tr>
								<?php endforeach;?>
							</table>
							
							<?php            
				            $unik = array();
				            foreach($hasil as $row){
				                $unik[$row[name]] = $row[arr];
				            }              
				            $new_hasil = DS_hitung($unik, $hasil);
				            $hasil = $new_hasil;
				            ?>

								<div class="panel-body">
									<table class="table table-bordered aw" style="width: 100%">
									<tr>
										<th>Kombinasi Diagnosa</th>
										<th>Nilai</th>
									</tr>
									<?php foreach($hasil as $key =>
									 $val): ?>
									<tr>
										<td><?=$val[name]?></td>
										<td>: <?=round($val[value], 4)?></td>
									</tr>
									<?php endforeach?>
								</table>
							</div>
						</div>
					<?php endforeach; ?>

<form action="?m=konsultasi_cetak" method="post">
<?php   
		function DS_get_best($hasil){
        $num = 0;
        $max = array();
        foreach($hasil as $val){
            if($val[value] > $num){ 
                $num = $val[value];
                $max = $val; } 
        } return $max; 
	}
        $best = DS_get_best($hasil);
        $diags = array();
        foreach($best[arr] as $val){ 
        $diags[] = $DIAGNOSA[$val][nama];
        $diags_kode[] = $DIAGNOSA[$val][kode];} ?>
						</div>
                          
						<p>
							Berdasarkan gejala yang terpilih maka diagnosa paling akurat adalah :
						</p>
						<div class="alert alert-success" role="alert">
							<strong><?=implode(', ', $diags)?></strong>
						</div>
						<h2>Dengan Tingkat Kepercayaan <strong><?=round($best[value] * 100) ?>%</strong>.</h2>
					</div>
                    <?php foreach($diags_kode as $row):?>
                        <input type="hidden" name="diagnosa[]" value="<?=$row?>"></input>
                    <?php endforeach;?>
                    <input type="submit" class="btn btn-warning" value="Cara Pengendalian"></a>
                </form>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<!-- technology-right --></div>
</div>
<!-- technology -->
<?php endif;?>
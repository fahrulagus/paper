<?php
  $selected = (array) $_POST[diagnosa];
  $rows = $db->get_results("SELECT * FROM tb_diagnosa WHERE kode_diagnosa IN ('".implode("','", $selected)."')"); ?>
<!-- technology -->
<div class="technology-1">
	<div class="container">
		<div class="col-md-12">
			<div class="business">
				<div class=" blog-grid2">
					<div class="blog-text">
						<h5>Diagnosa</h5>
                       
                        
                        <?php foreach($rows as $row):?>
                        <div class="alert alert-success" role="alert">
							<strong><?=$row->nama_diagnosa?></strong>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="panel panel-primary">
									<div class="panel-body">
										<center><img src="assets/images/diagnosa/<?=$row->gambar?>" width="100%"></center>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="panel panel-primary">
									<div class="panel-heading">Keterangan</div>
									<div class="panel-body"><?=$row->keterangan?></div>
								</div>
								<div class="panel panel-primary">
									<div class="panel-heading">Pengendalian</div>
									<div class="panel-body"><?=$row->pengendalian?></div>
								</div>
							</div>
						</div>
                        <?php endforeach;?>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<!-- technology-right -->
	</div>
</div>
<!-- technology -->
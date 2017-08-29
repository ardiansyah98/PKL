<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li class="">
								<i class="ace-icon fa fa-home home-icon"></i>
								Home
							</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<br>
								<div class="tabbable">
											<ul class="nav nav-tabs" id="myTab">
												<li class="active">
													<a data-toggle="tab" href="#home">
														Statistik
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#messages">
														Sisa Anggaran
													</a>
												</li>
											</ul>

											<div class="tab-content">
												<div id="home" class="tab-pane fade in active">
														<br><br>
														<center><div style="width:95%" id="chart"></div></center>
												</div>

												<div id="messages" class="tab-pane fade">



												<br>

								<table style="margin-left:2%" id='tableEdit' width="70%">
										<tr>
											<td style="width:15%">Triwulan 1 </td>
											<td style="width:2%">:</td>
											<td style="width:40%"><input style="width:100%" type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="tw1" 
												<?php 
													$t1 = date('Y').'1';
													$total = $this->M_anggaran->cek_jatah($t1);
													$penggunaan = $this->M_anggaran->cek_penggunaan($t1);

													$tot = 0;

													foreach($total->result() as  $t){
														$tot = $t->jatah;
													}


													//Please debug me//

													$value = 0;
													foreach($penggunaan->result() as $res){
														$value = $value + $res->total;
													}

													//---------------//
													
													$total = $tot - $value;

													echo 'value=';
													echo $total;
												?> readonly></td>
												<td><a href="" data-toggle="modal" data-target="#modal_tw1" style="margin-left:2%;">Show Detail</a></td>
										</tr>
										<tr>
											<td style="width:15%">Triwulan 2 </td>
											<td style="width:2%">:</td>
											<td style="width:40%"><input style="width:100%" type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="tw2" <?php 
													$t1 = date('Y').'2';
													$total = $this->M_anggaran->cek_jatah($t1);
													$penggunaan = $this->M_anggaran->cek_penggunaan($t1);

													$tot = 0;

													foreach($total->result() as  $t){
														$tot = $t->jatah;
													}


													//Please debug me//

													$value = 0;
													foreach($penggunaan->result() as $res){
														$value = $value + $res->total;
													}

													//---------------//
													
													$total = $tot - $value;
													
													echo 'value=';
													echo $total;
												?> readonly></td>
												<td><a href="" data-toggle="modal" data-target="#modal_tw2" style="margin-left:2%;">Show Detail</a></td>
										</tr>
										<tr>
											<td style="width:15%">Triwulan 3 </td>
											<td style="width:2%">:</td>
											<td style="width:40%"><input style="width:100%" type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="tw3" <?php 
													$t1 = date('Y').'3';
													$total = $this->M_anggaran->cek_jatah($t1);
													$penggunaan = $this->M_anggaran->cek_penggunaan($t1);

													$tot = 0;

													foreach($total->result() as  $t){
														$tot = $t->jatah;
													}


													//Please debug me//

													$value = 0;
													foreach($penggunaan->result() as $res){
														$value = $value + $res->total;
													}

													//---------------//
													
													$total = $tot - $value;
													
													echo 'value=';
													echo $total;
												?> readonly></td>
												<td><a href="" data-toggle="modal" data-target="#modal_tw3" style="margin-left:2%;">Show Detail</a></td>
										</tr>
										<tr>
											<td style="width:15%">Triwulan 4 </td>
											<td style="width:2%">:</td>
											<td style="width:40%"><input style="width:100%" type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="tw4" <?php 
													$t1 = date('Y').'4';
													$total = $this->M_anggaran->cek_jatah($t1);
													$penggunaan = $this->M_anggaran->cek_penggunaan($t1);

													$tot = 0;

													foreach($total->result() as  $t){
														$tot = $t->jatah;
													}


													//Please debug me//

													$value = 0;
													foreach($penggunaan->result() as $res){
														$value = $value + $res->total;
													}

													//---------------//
													
													$total = $tot - $value;
													
													echo 'value=';
													echo $total;
												?> readonly></td>
												<td><a href="" data-toggle="modal" data-target="#modal_tw4" style="margin-left:2%;">Show Detail</a></td>
										</tr>
									</table>

<div class="modal fade" id="modal_tw1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h5 class="modal-title">Penggunaan Anggaran Tahun <?=date('Y')?> Triwulan 1</h5></center>
        </div>
        <div class="modal-body">
          <table style="width:100%" class="display table table-striped table-hover table_modal">
				<thead>
					<tr>
						<th style="width:5%">No</th>
						<th style="width:5%">Tanggal</th>
						<th style="width:80%">Penggunaan</th>
						<th style="width:15%">Total</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 0;
						$query = $this->M_anggaran->cek_penggunaan(date('Y').'1');
						$result = $query->result();
						foreach ($result as $res) { $i=$i+1; ?>


					<tr>
						<td><?=$i?></td>
						<td><?=$res->waktu?></td>
						<td><?=$res->penggunaan;?></td>
						<td><?=$res->total;?></td>
					</tr>
					 <?php }; ?>
				</tbody>
			</table>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modal_tw2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h5 class="modal-title">Penggunaan Anggaran Tahun <?=date('Y')?> Triwulan 2</h5></center>
        </div>
        <div class="modal-body">
          <table style="width:100%" class="display table table-striped table-hover table_modal">
				<thead>
					<tr>
						<th style="width:5%">No</th>
						<th style="width:5%">Tanggal</th>
						<th style="width:80%">Penggunaan</th>
						<th style="width:15%">Total</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 0;
						$query = $this->M_anggaran->cek_penggunaan(date('Y').'2');
						$result = $query->result();
						foreach ($result as $res) { $i=$i+1; ?>


					<tr>
						<td><?=$i?></td>
						<td><?=$res->waktu?></td>
						<td><?=$res->penggunaan;?></td>
						<td><?=$res->total;?></td>
					</tr>
					 <?php }; ?>
				</tbody>
			</table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal_tw3" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h5 class="modal-title">Penggunaan Anggaran Tahun <?=date('Y')?> Triwulan 3</h5></center>
        </div>
        <div class="modal-body">
          <table style="width:100%" class="display table table-striped table-hover table_modal">
				<thead>
					<tr>
						<th style="width:5%">No</th>
						<th style="width:5%">Tanggal</th>
						<th style="width:80%">Penggunaan</th>
						<th style="width:15%">Total</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 0;
						$query = $this->M_anggaran->cek_penggunaan(date('Y').'3');
						$result = $query->result();
						foreach ($result as $res) { $i=$i+1; ?>


					<tr>
						<td><?=$i?></td>
						<td><?=$res->waktu?></td>
						<td><?=$res->penggunaan;?></td>
						<td><?=$res->total;?></td>
					</tr>
					 <?php }; ?>
				</tbody>
			</table>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modal_tw4" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h5 class="modal-title">Penggunaan Anggaran Tahun <?=date('Y')?> Triwulan 4</h5></center>
        </div>
        <div class="modal-body">
          <table style="width:100%" class="display table table-striped table-hover table_modal">
				<thead>
					<tr>
						<th style="width:5%">No</th>
						<th style="width:5%">Tanggal</th>
						<th style="width:80%">Penggunaan</th>
						<th style="width:15%">Total</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 0;
						$query = $this->M_anggaran->cek_penggunaan(date('Y').'4');
						$result = $query->result();
						foreach ($result as $res) { $i=$i+1; ?>


					<tr>
						<td><?=$i?></td>
						<td><?=$res->waktu?></td>
						<td><?=$res->penggunaan;?></td>
						<td><?=$res->total;?></td>
					</tr>
					 <?php }; ?>
				</tbody>
			</table>
        </div>
      </div>
    </div>
  </div>
												</div>

												
											</div>
										</div>

								<br><br>
									

	
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
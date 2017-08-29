<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li class="">
								<i class="ace-icon fa fa-plus"></i>
								Tambah Penggunaan
							</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<br>
								<div class="alert alert-info alert-dismissable fade in">
								Tambah Penggunaan Anggaran Tahun <?=date('Y')?> Triwulan <?php 
													$m = date('m');
													if($m=='03' || $m=='02' || $m=='01')
														echo '1';
													else if($m=='04' || $m=='05' || $m=='06')
														echo '2';
													else if($m=='07' || $m=='08' || $m=='09')
														echo '3';
													else
														echo '4';?>
								 </div>

								<div style="font-size: 16px;"> Sisa Anggaran Tahun <?=date('Y')?> Triwulan <?php 
													$m = date('m');
													$x = 0;
													if($m=='03' || $m=='02' || $m=='01'){
														$x = '1';
														echo '1 = ';
													}
													else if($m=='04' || $m=='05' || $m=='06'){
														$x ='2';
														echo '2 = ';
													}
													else if($m=='07' || $m=='08' || $m=='09'){
														$x = '3';
														echo '3 = ';
													}
													else{
														$x = '4';
														echo '4 = ';
													}
								
									$t = date('Y').''.$x;
									$total = $this->M_anggaran->cek_jatah($t);
									$penggunaan = $this->M_anggaran->cek_penggunaan($t);

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
									
									$sisa = $tot - $value;
									
									echo $sisa;

								?>
								</div>
								<br><br>
								<form action="<?php echo base_url('index.php/anggaran/input_penggunaan'); ?>" method="GET">
									<table id="tableEdit" width="80%" >
										<tr>
											<td><center>Deskripsi Penggunaan</center></td>
											<td><center>Total Penggunaan</center></td>
											<td></td>
										</tr>
										<tr>
											<td style="width:60%" ><input required style="width:97%" type="text" name="deskripsi"></td>
											<td style="width:20%" ><input required style="width:97%" type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="total" ></td>
											<td><input type="hidden" name='tgl_tambah' value=<?=date('Y-m-d')?>></td>
											<td><input type="hidden" name='tahun' value=<?=date('Y')?>></td>
											<td><input type="hidden" name='triwulan' value=
												<?php 
													$m = date('m');
													if($m=='03' || $m=='02' || $m=='01')
														echo '1';
													else if($m=='04' || $m=='05' || $m=='06')
														echo '2';
													else if($m=='07' || $m=='08' || $m=='09')
														echo '3';
													else
														echo '4';?>
											></td>
											<td style="width:20%"><input class="btn btn-success btn-md" type="submit" value="Tambah"></td>
										</tr>
									</table>
								</form>
 
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
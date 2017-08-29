<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li class="">
								<i class="ace-icon fa fa-check"></i>
								Anggaran Tahunan
							</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<br>
								<div class="alert alert-info alert-dismissable fade in">
								Anggaran Tahun <?=date('Y');?>
								 </div>
								

								 <form action="<?php echo base_url('index.php/anggaran/input_anggaran'); ?>" method="GET">
									<table id='tableEdit' width="60%">
										<tr>
											<td style="width:7%">Triwulan 1 </td>
											<td style="width:1%">:</td>
											<td style="width:52%"><input type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="tw1" 
												<?php 
													$t1 = date('Y').'1';
													$result = $this->M_anggaran->cek_jatah($t1);
													if($result->num_rows() > 0){
														foreach($result->result() as $res){
															echo 'value=';
															echo $res->jatah;
															echo ' readonly';	
														}
													} else  {
														echo '';
													}
												?> required></td>
										</tr>
										<tr>
											<td>Triwulan 2 </td>
											<td>:</td>
											<td>
									<input type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="tw2" <?php 
													$t2 = date('Y').'2';
													$result = $this->M_anggaran->cek_jatah($t2);
													if($result->num_rows() > 0){
														foreach($result->result() as $res){
															echo 'value=';
															echo $res->jatah;
															echo ' readonly';	
														}
													} else  {
														echo '';
													}
												?> required></td>
										</tr>
										<tr>
											<td>Triwulan 3 </td>
											<td>:</td>
											<td>
									<input type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="tw3" <?php 
													$t3 = date('Y').'3';
													$result = $this->M_anggaran->cek_jatah($t3);
													if($result->num_rows() > 0){
														foreach($result->result() as $res){
															echo 'value=';
															echo $res->jatah;
															echo ' readonly';	
														}
													} else  {
														echo '';
													}
												?> required></td>
										</tr>
										<tr>
											<td>Triwulan 4 </td>
											<td>:</td>
											<td>
									<input type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="tw4" <?php 
													$t4 = date('Y').'4';
													$result = $this->M_anggaran->cek_jatah($t4);
													if($result->num_rows() > 0){
														foreach($result->result() as $res){
															echo 'value=';
															echo $res->jatah;
															echo ' readonly';	
														}
													} else  {
														echo '';
													}
												?> required></td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td >
										<input <?php 
													$tahun = date('Y');
													if($this->db->query("SELECT * FROM tbl_anggaran WHERE tahun_tw LIKE '%$tahun%'")->num_rows() == 4)
														echo ' disabled ' ;
													else 
														echo '';
													
												?> 
										style="margin-left: 23%" type='submit' value='Submit'></td>
										</tr>

									</table>

									
								</form>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
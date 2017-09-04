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
									<table id='tableEdit' width="70%">
										<tr>
											<td style="width:15%">Triwulan 1 </td>
											<td style="width:1%">:</td>
											<td style="width:35%"><input style="width:95%" type="text" data-type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="tw1" 
												<?php 
													$t1 = date('Y').'1';
													$result = $this->M_anggaran->cek_jatah($t1);
													if($result->num_rows() > 0){
														foreach($result->result() as $res){
															echo 'value=';
															echo 
															strrev(implode(',',str_split(strrev(strval($res->jatah)),3)));
															echo ' readonly';	
														}
													} else  {
														echo '';
													}
												?> required></td>
												<td><a href="" data-toggle="modal" data-target="#editTW1">Edit</a></td>
										</tr>
										<tr>
											<td>Triwulan 2 </td>
											<td>:</td>
											<td>
									<input style="width:95%" type="text" data-type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="tw2" <?php 
													$t2 = date('Y').'2';
													$result = $this->M_anggaran->cek_jatah($t2);
													if($result->num_rows() > 0){
														foreach($result->result() as $res){
															echo 'value=';
															echo strrev(implode(',',str_split(strrev(strval($res->jatah)),3)));
															echo ' readonly';	
														}
													} else  {
														echo '';
													}
												?> required></td>

												<td><a href="" data-toggle="modal" data-target="#editTW2">Edit</a></td>
										</tr>
										<tr>
											<td>Triwulan 3 </td>
											<td>:</td>
											<td>
									<input style="width:95%" type="text" data-type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="tw3" <?php 
													$t3 = date('Y').'3';
													$result = $this->M_anggaran->cek_jatah($t3);
													if($result->num_rows() > 0){
														foreach($result->result() as $res){
															echo 'value=';
															echo strrev(implode(',',str_split(strrev(strval($res->jatah)),3)));
															echo ' readonly';	
														}
													} else  {
														echo '';
													}
												?> required></td>

												<td><a href="" data-toggle="modal" data-target="#editTW3">Edit</a></td>
										</tr>
										<tr>
											<td>Triwulan 4 </td>
											<td>:</td>
											<td>
									<input style="width:95%" type="text" data-type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="tw4" <?php 
													$t4 = date('Y').'4';
													$result = $this->M_anggaran->cek_jatah($t4);
													if($result->num_rows() > 0){
														foreach($result->result() as $res){
															echo 'value=';
															echo strrev(implode(',',str_split(strrev(strval($res->jatah)),3)));
															echo ' readonly';	
														}
													} else  {
														echo '';
													}
												?> required></td>

												<td><a href="" data-toggle="modal" data-target="#editTW4">Edit</a></td>
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
										style="margin-left: 75%" type='submit' value='Submit'></td>
										</tr>

									</table>

									
								</form>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div id="editTW1" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="smaller lighter blue no-margin">Edit</h3>
						</div>
						<form action="<?php echo base_url('index.php/anggaran/edit_triwulan1'); ?>" method="post">
							<div class="modal-body">
								<center>
								<table style="width:90%">
									<tr>
										<td style="width:35%; margin-right: 3%">Triwulan 1 Lama</td>
										<td style="width:65%">
											<input style="width:98%" type="text" data-type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' <?php 
													$t1 = date('Y').'1';
													$result = $this->M_anggaran->cek_jatah($t1);
													if($result->num_rows() > 0){
														foreach($result->result() as $res){
															echo 'value=';
															echo strrev(implode(',',str_split(strrev(strval($res->jatah)),3)));
														}
													} else  {
														echo '';
													}
												?> readonly>
												<span class="help-inline">
											</span></td>
									</tr>
									<tr><td>&nbsp;</td><td></td><td>&nbsp;</td></tr>
									<tr>
										<td>Triwulan 1 Baru</td>
										<td>
											<input style="width:98%" type="text" name="tw1_baru" data-type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
										</td>
									</tr>
								
								</table>
								</center>
							</div>

							<div class="modal-footer">
								<input type="submit" value="OK" class="btn btn-md btn-success pull-right" />
							</div>
						</form>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>

			<div id="editTW2" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="smaller lighter blue no-margin">Edit</h3>
						</div>
						<form action="<?php echo base_url('index.php/anggaran/edit_triwulan2'); ?>" method="post">
							<div class="modal-body">
								<center>
								<table style="width:90%">
									<tr>
										<td style="width:35%; margin-right: 3%">Triwulan 2 Lama</td>
										<td style="width:65%">
											<input style="width:98%" type="text" data-type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' <?php 
													$t1 = date('Y').'2';
													$result = $this->M_anggaran->cek_jatah($t1);
													if($result->num_rows() > 0){
														foreach($result->result() as $res){
															echo 'value=';
															echo strrev(implode(',',str_split(strrev(strval($res->jatah)),3)));
														}
													} else  {
														echo '';
													}
												?> readonly>
												<span class="help-inline">
											</span></td>
									</tr>
									<tr><td>&nbsp;</td><td></td><td>&nbsp;</td></tr>
									<tr>
										<td>Triwulan 2 Baru</td>
										<td>
											<input style="width:98%" type="text" name="tw2_baru" data-type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
										</td>
									</tr>
								
								</table>
								</center>
							</div>

							<div class="modal-footer">
								<input type="submit" value="OK" class="btn btn-md btn-success pull-right" />
							</div>
						</form>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>

			<div id="editTW3" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="smaller lighter blue no-margin">Edit</h3>
						</div>
						<form action="<?php echo base_url('index.php/anggaran/edit_triwulan3'); ?>" method="post">
							<div class="modal-body">
								<center>
								<table style="width:90%">
									<tr>
										<td style="width:35%; margin-right: 3%">Triwulan 3 Lama</td>
										<td style="width:65%">
											<input style="width:98%" type="text" data-type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' <?php 
													$t1 = date('Y').'3';
													$result = $this->M_anggaran->cek_jatah($t1);
													if($result->num_rows() > 0){
														foreach($result->result() as $res){
															echo 'value=';
															echo strrev(implode(',',str_split(strrev(strval($res->jatah)),3)));
														}
													} else  {
														echo '';
													}
												?> readonly>
												<span class="help-inline">
											</span></td>
									</tr>
									<tr><td>&nbsp;</td><td></td><td>&nbsp;</td></tr>
									<tr>
										<td>Triwulan 3 Baru</td>
										<td>
											<input style="width:98%" type="text" name="tw3_baru" data-type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
										</td>
									</tr>
								
								</table>
								</center>
							</div>

							<div class="modal-footer">
								<input type="submit" value="OK" class="btn btn-md btn-success pull-right" />
							</div>
						</form>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>

			<div id="editTW4" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="smaller lighter blue no-margin">Edit</h3>
						</div>
						<form action="<?php echo base_url('index.php/anggaran/edit_triwulan4'); ?>" method="post">
							<div class="modal-body">
								<center>
								<table style="width:90%">
									<tr>
										<td style="width:35%; margin-right: 3%">Triwulan 4 Lama</td>
										<td style="width:65%">
											<input style="width:98%" type="text" data-type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' <?php 
													$t1 = date('Y').'4';
													$result = $this->M_anggaran->cek_jatah($t1);
													if($result->num_rows() > 0){
														foreach($result->result() as $res){
															echo 'value=';
															echo strrev(implode(',',str_split(strrev(strval($res->jatah)),3)));
														}
													} else  {
														echo '';
													}
												?> readonly>
												<span class="help-inline">
											</span></td>
									</tr>
									<tr><td>&nbsp;</td><td></td><td>&nbsp;</td></tr>
									<tr>
										<td>Triwulan 4 Baru</td>
										<td>
											<input style="width:98%" type="text" name="tw4_baru" data-type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
										</td>
									</tr>
								
								</table>
								</center>
							</div>

							<div class="modal-footer">
								<input type="submit" value="OK" class="btn btn-md btn-success pull-right" />
							</div>
						</form>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>
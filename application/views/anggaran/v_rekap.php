<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li class="">
								<i class="ace-icon fa fa-book"></i>
								Rekapitulasi
							</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<br>
								<div style="margin-bottom: -4%;" class="alert alert-info alert-dismissable fade in">
								    Rekapitulasi Anggaran
								 </div>

								 <table class="display table table-striped table-hover table_detail">
									<thead>
										<tr>
											<th style="width:5%">No</th>
											<th style="width:8%">Tahun</th>
											<th style="width:10%">Anggaran TW 1</th>
											<th style="width:10%">Sisa TW 1</th>
											<th style="width:10%">Anggaran TW 2</th>
											<th style="width:10%">Sisa TW 2</th>
											<th style="width:10%">Anggaran TW 3</th>
											<th style="width:10%">Sisa TW 3</th>
											<th style="width:10%">Anggaran TW 4</th>
											<th style="width:10%">Sisa TW 4</th>
											<th style="width:8%">Detail</th>
											<th style="width:8%">Statistik</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$i = 0;
											
											for($j = 0; $j < 500; $j++) { 
												$year = date('Y')-$j;
												$y1 = $year.'1';
												$y2 = $year.'2';
												$y3 = $year.'3';
												$y4 = $year.'4';

												$tw1 = 0;
												$tw2 = 0;
												$tw3 = 0;
												$tw4 = 0;

												$v1 = 0;
												$v2 = 0;
												$v3 = 0;
												$v4 = 0;

												$query = $this->db->query("SELECT * FROM tbl_anggaran WHERE tahun_tw LIKE '%$year%'");
												if($query->num_rows() == 0){
													return;
												} else {
													$x1 = $this->db->query("SELECT * FROM tbl_anggaran WHERE tahun_tw='$y1'");
													$q1 = $this->db->query("SELECT * FROM tbl_penggunaan_anggaran WHERE tahun_tw='$y1'");

													$x2 = $this->db->query("SELECT * FROM tbl_anggaran WHERE tahun_tw='$y2'");
													$q2 = $this->db->query("SELECT * FROM tbl_penggunaan_anggaran WHERE tahun_tw='$y2'");

													$x3 = $this->db->query("SELECT * FROM tbl_anggaran WHERE tahun_tw='$y3'");
													$q3 = $this->db->query("SELECT * FROM tbl_penggunaan_anggaran WHERE tahun_tw='$y3'");

													$x4 = $this->db->query("SELECT * FROM tbl_anggaran WHERE tahun_tw='$y4'");
													$q4 = $this->db->query("SELECT * FROM tbl_penggunaan_anggaran WHERE tahun_tw='$y4'");

													foreach($x1->result() as $res){
														$tw1 = $res->jatah;		
													}
													foreach($x2->result() as $res){
														$tw2 = $res->jatah;		
													}
													foreach($x3->result() as $res){
														$tw3 = $res->jatah;		
													}
													foreach($x4->result() as $res){
														$tw4 = $res->jatah;		
													}

													foreach($q1->result() as $res){
														$v1 = $v1 + $res->total;
													}
													foreach($q2->result() as $res){
														$v2 = $v2 + $res->total;
													}
													foreach($q3->result() as $res){
														$v3 = $v3 + $res->total;
													}
													foreach($q4->result() as $res){
														$v4 = $v4 + $res->total;
													}
												}


												$i=$i+1;

												?>


										<tr>
											<td><?=$j+1?></td>
											<td><?=$year?></td>
											<td><?=$tw1?></td>
											<td><?=$tw1-$v1?></td>
											<td><?=$tw2?></td>
											<td><?=$tw2-$v2?></td>
											<td><?=$tw3?></td>
											<td><?=$tw3-$v3?></td>
											<td><?=$tw4?></td>
											<td><?=$tw4-$v4?></td>
											<td>
												<a data-toggle="modal" data-target="#detail<?=$year?>" href="">Show Detail</a>

												<div class="modal fade" id="detail<?=$year;?>" role="dialog">
												    <div class="modal-dialog modal-lg">
												      <div class="modal-content">
												        <div class="modal-header">
												          <button type="button" class="close" data-dismiss="modal">&times;</button>
												          <h5 class="modal-title">Penggunaan Anggaran Tahun <?=$year?></h5>
												        </div>
												        <div class="modal-body">
												         	 <table style="width:100%" class="display table table-striped table-hover table_modal">
																<thead>
																	<tr>
																		<th style="width:5%">No</th>
																		<th style="width:3%">Tanggal</th>
																		<th style="width:3%">Triwulan</th>
																		<th style="width:77%">Penggunaan</th>
																		<th style="width:15%">Total</th>
																	</tr>
																</thead>
																<tbody>
																	<?php 
																		$i = 0;
																		$query = $this->db->query("SELECT * FROM tbl_penggunaan_anggaran WHERE tahun_tw LIKE '%$year%'");
																		$result = $query->result();
																		foreach ($result as $res) { $i=$i+1; ?>


																	<tr>
																		<td><?=$i?></td>
																		<td><?=$res->waktu?></td>
																		<td><?php
																			if($res->tahun_tw == $y1)
																				echo '1';
																			else if($res->tahun_tw == $y2)
																				echo '2'; 
																			else if($res->tahun_tw == $y3)
																				echo '3'; 
																			else if($res->tahun_tw == $y4)
																				echo '4'; 
																		?></td>
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


											</td>
											<td><a href="<?php echo base_url('index.php/anggaran/statistik/').$year;?>">Show Statistik</a></td>
										</tr>
										 <?php }; ?>
									</tbody>
								</table>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
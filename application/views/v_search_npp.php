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

									<form class="form-wrapper" action="<?php echo base_url();?>index.php/admin/search_npp" method="post">
									    <input type="text" id="search" placeholder="Search for..." required>
									    <input type="submit" value="Search" id="submit">
									</form>
									<table id="search_npp" class="table table-striped table-hover"">
												<thead>
													<tr>
														<th style="width:3%">No</th>
														<th style="width:5%">NPP</th>
														<th style="width:13%">Nama</th>
														<th style="width:5%">Grade</th>
														<th style="width:7%">Tanggal Tugas</th>
														<th style="width:10%">Job Name</th>
														<th style="width:10%">Position Name</th>
														<th style="width:10%">Organization Name</th>
														<th style="width:8%">Kelompok Jabatan</th>
														<th style="width:8%">Tempat Lahir</th>
														<th style="width:7%">Tanggal Lahir</th>
														<th style="width:5%">Jenis Kelamin</th>
														
													</tr>
												</thead>

												<tbody>

													      <tr>
													      		<td><?= $i ?></td>
													      		<td><?= $res->npp;?></td>
													      		<td><?= $res->nama;?></td>
													      		<td><?= $res->grade;?></td>
													      		<td><?= $res->tgl_tugas;?></td>
													      		<td><?= $res->job_name;?></td>
													      		<td><?= $res->position_name;?></td>
													      		<td><?= $res->org_name;?></td>
													      		<td><?= $res->kel_jabatan;?></td>
													      		<td><?= $res->tempat_lahir;?></td>
													      		<td><?= $res->tgl_lahir;?></td>
													      		<td>
													      			<?php 
													      				if($res->sex == "F")
													      					echo "Perempuan";
													      				else if($res->sex == "M")
													      					echo "Laki-laki";
													      				else
													      					echo "";
													      				?>
													      					
													      		</td>
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
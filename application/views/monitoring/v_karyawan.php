<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li class="">
								<i class="ace-icon fa fa-desktop"></i>
								Data Karyawan
							</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content" style="margin-top: 2%;">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="alert alert-info alert-dismissable fade in">
								    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								    <strong>Info!</strong> Hanya dapat melakukan pencarian menggunakan NPP, Nama, dan Job Name.
								 </div>
								<table id="table_karyawan" class="display table table-striped table-hover">
										<thead>
											<tr>
												<th style="width:3%">No</th>
												<th style="width:5%">NPP</th>
												<th style="width:13%">Nama</th>
												<th style="width:5%">Grade</th>
												<th style="width:7%">Tanggal Tugas</th>
												<th style="width:8%">Job Name</th>
												<th style="width:8%">Position Name</th>
												<th style="width:8%">Organization Name</th>
												<th style="width:8%">Kelompok Jabatan</th>
												<th style="width:8%">Tempat Lahir</th>
												<th style="width:7%">Tanggal Lahir</th>
												<th style="width:5%">Jenis Kelamin</th>
												<th style="width:6%">Aksi</th>
												
											</tr>
										</thead>

										<tbody>
											<?php 
											$i = 0;
											foreach ($result as $res) { ?>
												 <?php $i = $i+1; ?>	
											      <tr valign="middle">
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
											      		<td>
											      		<center>
	<button class="btn btn-success"  data-toggle="modal" data-target="#modalEdit<?php echo $res->id;?>">
        <span class="glyphicon glyphicon-pencil"></span>
    </button>

    <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $res->id;?>">
       <span class="glyphicon glyphicon-trash"></span>        
    </button>
    </center>
    <div class="modal fade" id="modalHapus<?php echo $res->id;?>" role="dialog">
    <div class="modal-dialog" style="max-width: 400px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Anda yakin ingin menghapus data ini?</h6>
        </div>
        <div class="modal-body">
          <center>
	          <a href="<?php echo 'http://localhost/jasamarga/index.php/monitoring/hapus_karyawan/'.$res->id?>" type="button" class="btn btn-primary" style="width:100px">Ya</a> &nbsp;&nbsp;
	          <a type="button" class="btn btn-primary" data-dismiss="modal" style="width:100px;">Tidak</a>
          </center>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modalEdit<?php echo $res->id;?>" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <form action="<?php echo base_url();?>index.php/monitoring/update_karyawan" method="post">
	        <div class="modal-body">
		         	<table id="tableEdit" border="0" style="width: 94%; margin-left: 3%">
		         		<tr>
		         			<th style="width:30%"></th>
		         			<th style="width:5%"></th>
		         			<th style="width:100%"><input name="edit_id" style="width:50%" type="text" hidden value=<?= $res->id ?>></th>
		         		</tr>
		         		<tr>
		         			<td >NPP</td>
		         			<td >:</td>
		         			<td ><input name="edit_npp" style="width:50%" type="text" disabled value=<?= $res->npp ?>></td>
		         		</tr>
		         		<tr>
		         			<td >Nama</td>
		         			<td >:</td>
		         			<td ><input name="edit_nama" style="width:100%" type="text" value=<?= $res->nama ?> ></td>
		         		</tr>
		         		<tr>
		         			<td >Grade</td>
		         			<td >:</td>
		         			<td ><input name="edit_grade" style="width:100%" type="text" value=<?= $res->grade ?> ></td>
		         		</tr>
		         		<tr>
		         			<td >Tanggal Tugas</td>
		         			<td >:</td>
		         			<td ><input name="edit_tgl_tugas" type="date"  style="margin-left:1.1%; width:50%" value=<?= $res->tgl_tugas ?> ></td>
		         		</tr>
		         		<tr>
		         			<td >Job Name</td>
		         			<td >:</td>
		         			<td ><input name="edit_job_name" type="text" style="width:100%" value=<?= $res->job_name ?> ></td>
		         		</tr>
		         		<tr>
		         			<td >Position Name</td>
		         			<td >:</td>
		         			<td ><input name="edit_pos_name" type="text" style="width:100%" value=<?= $res->position_name ?> ></td>
		         		</tr>
		         		<tr>
		         			<td >Organization Name</td>
		         			<td >:</td>
		         			<td ><input name="edit_org_name" type="text" style="width:100%" value=<?= $res->org_name ?> ></td>
		         		</tr>
		         		<tr>
		         			<td >Kelompok Jabatan</td>
		         			<td >:</td>
		         			<td ><input name="edit_kel_jabatan" type="text" style="width:100%" value=<?= $res->kel_jabatan ?> ></td>
		         		</tr>
		         		<tr>
		         			<td >Tempat lahir</td>
		         			<td >:</td>
		         			<td ><input name="edit_tempat_lahir" type="text" style="width:100%" value=<?= $res->tempat_lahir ?> ></td>
		         		</tr>
		         		<tr>
		         			<td >Tanggal Lahir</td>
		         			<td >:</td>
		         			<td ><input name="edit_tgl_lahir" type="date" style="margin-left:1.1%;width:50%" value=<?= $res->tgl_lahir ?> ></td>
		         		</tr>
		         		<tr>
		         			<td >Jenis Kelamin</td>
		         			<td >:</td>
		         			<td >
		         				<select style="width:50%" name="edit_gender">
		         					<option <?php if($res->sex == 'M') echo 'selected'; else echo ''; ?> value="M">Laki-laki</option>
		         					<option <?php if($res->sex == 'F') echo 'selected'; else echo ''; ?> value="F">Perempuan</option>
		         				</select>
		         			</td>
		         		</tr>
		         	</table>
	        </div>
	        <div class="modal-footer">
	        	<button type="submit" class="btn btn-success">
			       <span class="glyphicon glyphicon-floppy-disk"> <a style="font-size: 120%; color: white;">Simpan</a></span>        
			    </button>
	         	
	        </div>
         </form>
      </div>
    </div>
  </div>
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


  

<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li class="">
								<i class="ace-icon fa fa-upload upload-icon"></i>
								Upload Database
							</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form style="margin-top:3%;" action="<?php echo base_url(); ?>index.php/admin/upload_db" method="post" enctype="multipart/form-data">
						            <div class="form-group has-feedback">
						              <label for="file">Upload File</label>
						              <input type="file" name="file">
						              <?php echo form_error('file');?>
						            </div>
						            <div class="row">
						              <div class="col-xs-4">
						                <button type="submit" class="btn btn-success">Upload</button>
						              </div><!-- /.col -->
						            </div>
						        </form>
						        <br>
						        <br>
						        Jika belum memiliki format excel, download <a href="<?php echo base_url('assets/excel/format_file.xlsx'); ?>">di sini</a>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
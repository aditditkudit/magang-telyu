	<!-- Content -->
			<div class="col-md-9">
				<div class="panel panel-default">
					<div classs="panel-heading">
						<h3 class="panel-title">
							<i class="fa fa-file"></i> File</h3>
					</div>
					<!-- <div class="panel-body" id="test">
              <a href="<?php echo base_url() ?>/dashboard/print" type="submit" class="btn btn-info"><i class="fa fa-print"></i>Export to Excel</a>
              <a href="<?php echo base_url() ?>/dashboard/backup" type="submit" class="btn btn-primary"><i class="fa fa-file-zip-o"></i>Backup</a>
              </div> -->
					<div class="panel-body">
						<p>Table File</p>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Date Time</th>
									<th>Nama File</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							if(!empty($list_file)){
								foreach($list_file as $loFile){
							
							?>
								<tr>
									<td>
										<?=$loFile->tgl ?>
									</td>
									<td>
										<?=$loFile->filename ?>
									</td>
									<!-- <td> <a href="unduh" type="submit" class="btn btn-primary">Download</a></td> -->
									<td>
										<?php echo'<a href='.base_url().'file/unduh?id='.$loFile->id.' type="submit" class="btn btn-primary">Download </a>'; ?> </td>
								</tr>
								<?php 
									}
								}  
								?>
							</tbody>
						</table>
						<div class="row">
							<div class="col">
							<?php echo $pagination; ?>
							</div>
						</div>
					</div>
				</div>
			<!--End Content -->	
			</div>
		</div>
	</div>
	<!-- Script JavaScript and others -->
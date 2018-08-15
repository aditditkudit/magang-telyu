	<!-- Content -->
			<div class="col-md-9">
				<div class="panel panel-default">
					<div classs="panel-heading">
						<h3 class="panel-title">
						<i class="fas fa-tachometer-alt"></i> Dashboard</h3>
					</div>
					<div class="panel-body" id="test">
						<div class="Info Alert">
							<?php 
                $this->load->library('session');
                if(empty($this->session->userdata('post_ckbox'))){
                    echo '<div class="alert alert-info" role="alert">';
                    echo '<p>Silahkan ke menu Settings untuk melakukan database mana yang mau dibackup</p>';
                    echo '</div>';
                }else{
                    echo '<div class="alert alert-info" role="alert">';
                    echo '<p>Silahkan klik button backup untuk melakukan backup </p>';
                    echo '</div>';  
                }
              ?>
						</div>
						<a href="<?php echo base_url() ?>dashboard/print" type="submit" class="btn btn-info">
							<i class="fa fa-print"></i>Export to Excel</a>
						<a href="<?php echo base_url() ?>dashboard/backup" type="submit" class="btn btn-primary">
							<i class="fa fa-file-zip-o"></i>Backup</a>
					</div>
					<div class="panel-body">
						<p>Table Log</p>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>DateTime</th>
									<th>Aktivitas</th>
									<th>Status</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							if(!empty($list_todo)) {
								foreach($list_todo as $todo){
							
							?>
								<tr>
									<td>
										<?=$todo->tgl ?>
									</td>
									<td>
										<?=$todo->activity ?>
									</td>
									<td>
										<?=$todo->status ?>
									</td>
									<td>
										<?=$todo->keterangan ?>
									</td>
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
			</div>
		</div>
	</div>
	<!-- Script JavaScript and others -->

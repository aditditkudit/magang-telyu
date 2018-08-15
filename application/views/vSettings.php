	<!-- Content -->
			<div class="col-md-9">
				<div class="panel panel-default">
					<div classs="panel-heading">
						<h3 class="panel-title">
							<i class="fa fa-cog"></i> Setting</h3>
					</div>
					<div class="panel-body">
						<?php
                  $this->load->library('session'); 
                  if (validation_errors()){
                    echo '<div class="alert alert-danger" role="alert">';
                    echo validation_errors();
                    echo '</div>';
                  }
                  if(empty($this->session->userdata('post_ckbox'))){
                    echo '<div class="alert alert-info" role="alert">';
                    echo 'Silahkan dipilih database yang mana mau di backup, lalu tekan button Backup';
                    echo '</div>';
                  }else{
                    echo '<div class="alert alert-info" role="alert">';
                    $dataP = $this->session->userdata('post_ckbox');
                    echo 'Database yang dibackup ialah: ' . '<br>';
                    echo '<ul>';
                    foreach($dataP as $data_ck_box){
                      $qr = $this->db->query('select * from list_database where id_db='.$data_ck_box);
                      foreach ($qr->result() as $row){
                      echo '<li>' . $row->name_database . '</li>';
                      }
                    }
                    echo '</ul>';
                    echo 'Silahkan ke menu Dashboard untuk melakukan Backup <br>';
                    echo '</div>';
                  }
                  ?>
							<div class="form-group">
								<?php
                    echo form_open('cSettings/proses');
                    echo form_label('Database Mana yang Mau Dibackup?', '',$attributes=array() );
                    
                    
                    if(!empty($list_database)){
                      foreach($list_database as $listDB){
                    ?>
									<div class="checkbox">
										<label>

											<?php 
                          //  echo form_checkbox('database_which[]', $listDB->name_database, set_checkbox( << Percobaan pertama
                          //   'database_which', $listDB->name_database));  echo $listDB->name_database ;
                          $data = array(
                              'name' => 'database_which[]',
                              'data-cookie-checkbox' => 'true',
                              'value' => $listDB->id_db,
                              'id' => 'box',
                              'data-cookie-checkbox-key' => 'database_which[]',
                              'data-cookie-checkbox-value' => $listDB->id_db
                          );
                           echo form_checkbox($data); echo $listDB->name_database; 
                            ?>
										</label>
									</div>
									<?php
                        }
                      } ?>

										<div class=submit>
											<?php 
                      $data = array('name' => 'submit', 'type' => 'submit' ,
                                  'value' => 'Backup', 'class' => 'btn btn-primary');
                      echo form_submit($data);
                      echo form_close();
                      ?>
										</div>

							</div>
					</div>
				</div>
			<!--End Content -->	
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.cookie.js"></script>
	<script src="<?php echo base_url() ?>assets/js/cookie-checkbox.js"></script>
	<script>
		$(document).ready(function () {
			enableCookieCheckBox();
		});
	</script>


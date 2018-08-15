<!-- Content -->
<div class="col-md-9">
                <div class="panel panel-default">
                    <div classs="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-plus-square"></i> Add Database</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        if(!empty($data_alert_addDB)){
                            echo '<div class="alert alert-danger" role="alert">';
                            echo '<p>Silahkan Dicek Kembali Konfigurasi Databasenya, Karena terdapat kesalahan</p>';
                            echo '</div>';

                        }
                        if (validation_errors()){
                            echo '<div class="alert alert-danger" role="alert">';
                            echo validation_errors();
                            echo '</div>';
                          } 
                        $this->load->helper('form');
                        $form_attr = array('class' => 'form-horizontal', 'autocomplete' => "off");
                        echo form_open('list_database/process_inputDB', $form_attr);
                        ?>
                        <div class="form-group">
                            <?php
                            $lbl_hostname_attr = array('class' => 'control-label col-sm-2');
                            echo form_label('Hostname', 'hostname', $lbl_hostname_attr);
                            echo '<div class="col-sm-5">';
                            $ipt_hostname_attr = array('class' => 'form-control', 'id' => 'hostname'
                                , 'name' => 'hostname', 'placeholder' => 'Ex: 127.0.0.1',
                                 'maxlength' => '15', 'value' => set_value('hostname'));
                            echo form_input($ipt_hostname_attr);
                            echo '</div>';
                            ?>
                        </div>
                        
                        <div class="form-group">
                            <?php
                            $lbl_username_attr = array('class' => 'control-label col-sm-2');
                            echo form_label('Username', 'username', $lbl_username_attr);
                            echo '<div class="col-sm-5">';
                            $ipt_username_attr = array('class' => 'form-control', 'id' => 'username'
                                , 'name' => 'username', 'placeholder' => 'Ex: Root', 
                                'maxlength' => '50', 'value' => set_value('username'));
                            echo form_input($ipt_username_attr);
                            echo '</div>';
                            ?>
                        </div>

                        <div class="form-group">
                            <?php
                            $lbl_passwd_attr = array('class' => 'control-label col-sm-2');
                            echo form_label('Password', 'password', $lbl_username_attr);
                            echo '<div class="col-sm-5">';
                            $ipt_passwd_attr = array('class' => 'form-control', 'id' => 'password'
                                , 'name' => 'password', 'value' => set_value('password'));
                            echo form_input($ipt_passwd_attr);
                            echo '</div>';
                            ?>
                        </div>

                        <div class="form-group">
                            <?php
                            $lbl_database_attr = array('class' => 'control-label col-sm-2');
                            echo form_label('Database', 'database', $lbl_username_attr);
                            echo '<div class="col-sm-5">';
                            $ipt_database_attr = array('class' => 'form-control', 'id' => 'database'
                                , 'name' => 'database', 'placeholder' => 'Ex: ci-magang',
                                 'maxlength' => '50', 'value' => set_value('database'));
                            echo form_input($ipt_database_attr);
                            echo '</div>';
                            ?>
                        </div>

                        <div class="form-group">
                            <?php
                            $lbl_port_attr = array('class' => 'control-label col-sm-2');
                            echo form_label('Port', 'port', $lbl_port_attr);
                            echo '<div class="col-sm-5">';
                            $ipt_port_attr = array('class' => 'form-control', 'id' => 'port'
                                , 'name' => 'port', 'placeholder' => 'Ex: 3306', 
                                'maxlength' => '4', 'value' => set_value('port'));
                            echo form_input($ipt_port_attr);
                            echo '</div>';
                            ?>
                        </div>

                        <div class="form-group">
                            <?php
                            echo '<div class="col-sm-offset-2 col-sm-5">';
                            $sbmt_attr = array('name' => 'saveDB', 'value' => 'Save', 'class' => 'btn btn-success');
                            echo form_submit($sbmt_attr);
                            echo '</div>';
                            ?>
                        </div>

                        <?php
                        echo form_close();
                        ?>
                        
                    </div>
                </div>
            </div>
            <!--End Content -->
        </div>
    </div>
<!-- Script JavaScript and others -->

<!DOCTYPE html>
<html>
<head>
    <title> Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">HEHE</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="navbar-form navbar-right">
                <a href="<?php echo base_url() ?>/dashboard/logout" type="submit" class="btn btn-success"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
      </div>
    </nav>
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
              <a href="#" class="list-group-item active" style="text-align: center;background-color: black;border-color: black">
                ADMINISTRATOR
              </a>
              <a href="<?php echo base_url() ?>dashboard" class="list-group-item"><i class="fa fa-dashboard"></i> Dashboard</a>
              <a href="<?php echo base_url() ?>file" class="list-group-item"><i class="fa fa-file"></i> File</a>
              <a href="<?php echo base_url() ?>cSettings" class="list-group-item"><i class="fa fa-cog"></i> Setting</a>
              <a href="<?php echo base_url() ?>dashboard/logout" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
              <div classs="panel-heading">
                <h3 class="panel-title"><i class="fa fa-cog"></i> Setting</h3>
              </div>
              <div class="panel-body">
                  <?php 
                  if (validation_errors()){
                    echo '<div class="alert alert-danger" role="alert">';
                    echo validation_errors();
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
                              'value' => $listDB->name_database,
                              'id' => 'box',
                              'data-cookie-checkbox-key' => 'database_which[]',
                              'data-cookie-checkbox-value' => $listDB->name_database
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
        </div>
    </div>
</div>
<!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/jquery.cookie.js"></script>
<script src="<?php echo base_url() ?>assets/cookie-checkbox.js"></script>
<script>
$(document).ready(function() {
  enableCookieCheckBox();
});
</script>
</body>
</html>
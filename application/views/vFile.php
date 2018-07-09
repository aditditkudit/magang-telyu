<!DOCTYPE html>
<html>
<head>
    <title> File</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    

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
                <h3 class="panel-title"><i class="fa fa-file"></i> File</h3>
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
                        <th>Nama File</th>
                      </tr>
                    </thead>
                    <?php 
                      if(!empty($list_file)){
                        foreach($list_file as $loFile){
                      
                    ?>
                    <tbody>
                       <tr>
                          <td> <?=$loFile->filename ?> </td>
                          <!-- <td> <a href="unduh" type="submit" class="btn btn-primary">Download</a></td> -->
                          <td> <?php echo'<a href='.'file/unduh?id='.$loFile->id.' type="submit" class="btn btn-primary">Download </a>'; ?>  </td>
                       </tr>       
                    </tbody>
                          <?php 
                            }
                          }  
                          ?>
                  </table>
              </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
//   $('#test').click(function(e){
//     e.preventDefault();
//     window.location.href = '../';
// });
</script>
</body>
</html>
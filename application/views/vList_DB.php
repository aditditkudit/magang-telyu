<!-- Content -->
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div classs="panel-heading">
                        <h3 class="panel-title">
                        <i class="fa fa-gavel"></i> List Database</h3>
                    </div>
                    <div class="panel-body" id="button-create">
                        <a href="<?php echo base_url() ?>list_database/add_database" type="submit" class="btn btn-info"><i class="fa fa-plus"></i>Create a new Database</a>
                    </div>
                    <div class="panel-body">
                        <p>Table File</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Hostname</th>
                                    <th>Username</th>
                                    <th>Database</th>
                                    <th>Port</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if(!empty($list_DB)){
                                foreach($list_DB as $db_lst){

                            ?>
                                <tr>
                                    <td>
                                        <?=$db_lst->hostname ?>
                                    </td>
                                    <td>
                                        <?=$db_lst->username ?>
                                    </td>
                                    <td>
                                        <?=$db_lst->name_database ?>
                                    </td>
                                    <td>
                                        <?=$db_lst->port ?>
                                    </td>
                                    <td>
                                    <?php
                                     echo'<a href='.'list_database/delete_database/'.$db_lst->id_db.' type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete </a>';
                                     echo'<a href='.'list_database/edit_database/'.$db_lst->id_db.' type="submit" class="btn btn-default"><i class="fas fa-edit"></i> Update </a>';  
                                    ?>
                                    </td>
                                </tr>
                            <?php 
                                }
                            }    
                            ?>    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--End Content -->
        </div>
    </div>
<!-- Script JavaScript and others -->

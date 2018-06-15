<?php 

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header('Content-Disposition: attachment; filename='.$title.'.xls');  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

?>

<table border="1" width="100%">

<thead>

<tr>

 <th>DateTime</th>

 <th>Aktivitas</th>

 <th>Status</th>

 <th>Keterangan</th>

 </tr>

</thead>

<tbody>

<?php foreach($list_todo as $u) { ?>

<tr>

 <td><?php echo $u->tgl ?></td>

 <td><?php echo $u->activity ?></td>

 <td><?php echo $u->status ?></td>

 <td><?php echo $u->keterangan ?></td>

 </tr>

<?php  } ?>

</tbody>

</table>
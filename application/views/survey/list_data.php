<?php
  $no = 1;
  foreach ($dataKota as $kota) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo ucfirst($kota->first_name); ?> <?php echo ucfirst($kota->last_name); ?></td>
       <td> <?php echo ucfirst($kota->owner_name); ?></td>
       <td> <?php 


if($kota->date_of_survey =='0000-00-00'){
    
}
else
{
  echo date('d-M-Y',strtotime($kota->date_of_survey)); 
}



     ?></td>
     <td> <?php 


if($kota->date_of_report=='0000-00-00'){
    
}
else
{
  echo date('d-M-Y',strtotime($kota->date_of_report)); 
}



     ?></td>

     <td> 
<?php if(!empty($kota->kml_file)) {?>
      <a target="_new" href="./assets/kml_files/<?php echo ucfirst($kota->kml_file); ?>"><i class="glyphicon glyphicon-download-alt"></i></a>
    <?php } ?>
      </td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataKota" data-id="<?php echo $kota->surveyid; ?>"><i class="glyphicon glyphicon-pencil"></i></button>
          <button class="btn btn-danger konfirmasiHapus-kota" data-id="<?php echo $kota->surveyid; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i></button>
         <!-- <button class="btn btn-info detail-dataKota" data-id="<?php echo $kota->surveyid; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>-->
      </td>
    </tr>
    <?php
    $no++;
  }
?>


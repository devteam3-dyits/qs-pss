Dear <?php echo $name; ?>,

Your proposal is <?php  
 if($status == 1)echo 'approved';
  elseif($status == 2)echo 'provisionally accepted';
  elseif($status == 3) echo 'rejected';
  else($status == 4) echo 'queued';

  ?>  successfully. 
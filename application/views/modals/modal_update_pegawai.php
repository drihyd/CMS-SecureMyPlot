<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Customer Data Update</h3>
    
	  
	  
	  <form method="POST" id="form-update-pegawai">
  

  <input type="hidden" name="id" value="<?php echo $dataPegawai->id; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="First Name" name="first_name" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->first_name; ?>">
    </div>
	
	   <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Last Name" name="last_name" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->last_name; ?>">
    </div>
	

	
	<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-envelope"></i>
      </span>
      <input type="email" class="form-control" placeholder="Email*" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->email; ?>">
    </div>
	
	<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-phone-alt"></i>
      </span>
      <input type="text" class="form-control" placeholder="Phone" name="contact_no" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->contact_no; ?>">
    </div>
	<!--
	
		<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-lock"></i>
      </span>
      <input type="password" class="form-control" placeholder="Password *" name="password" aria-describedby="sizing-addon2">
    </div>
	
			<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-lock"></i>
      </span>
      <input type="password" class="form-control" placeholder="Confirm Password *" name="confirm_password" aria-describedby="sizing-addon2">
    </div>
	-->
	
				<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-map-marker"></i>
      </span>
      <input type="text" class="form-control" placeholder="Address" name="address" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->address; ?>">
    </div>
	
	

     


    <div class="form-group">
      <div class="col-md-12">
         <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
	  
</div>

<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>
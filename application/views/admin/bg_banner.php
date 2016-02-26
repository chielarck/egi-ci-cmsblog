<div class="col-md-12">        	
    <ol class="breadcrumb">
	  <li class="active"><a href="#">Gallery</a></li>
	</ol>
</div>
<form action="<?php echo base_url(); ?>admin/actBanner" method="post" enctype="multipart/form-data">
<div class="col-md-12">  
    <button class="btns tambah fl-left" name="edit"><span class="glyphicon glyphicon-upload"></span>Ganti</button> 	
</div>
<div class="col-md-12">        	
    <div class="main">   		
<?php
	foreach($banner->result_array() as $b) {
	?>
    	<div class="col-md-4">
    		<input type="checkbox" name="check[]" value="<?php echo $b['id']; ?>">
    		<img class="img-responsive img-thumbnail " src="<?php echo base_url(); ?>assets/banner/<?php echo $b['nama_file']; ?>">
    	</div> 
<?php 
	} ?> 
	 </div> 
</form>    	
</div>

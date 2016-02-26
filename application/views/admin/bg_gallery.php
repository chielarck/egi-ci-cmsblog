<div class="page-header">
    <h3>Halaman</h3>
</div>
<form action="<?php echo base_url(); ?>admin/actGallery" method="post" enctype="multipart/form-data">
    <div class="section">   
        <button class="btn btn-primary" name="upload"><span class="glyphicon glyphicon-upload"></span>Upload</button> 	
    	<button class="btn btn-danger" name="hapus"><span class="glyphicon glyphicon-trash"></span>Hapus</button>
    </div> 	
   		<div class="form-group">    	
    		<input id="file-0" class="file" type="file" name="files[]" multiple>
    	</div>
    <div class="form-group sm-padding-tb">
<?php
    foreach($gallery->result_array() as $g) {
    ?>
        <div class="col-md-3 sm-padding-tb">
        	<input type="checkbox" name="check[]" value="<?php echo $g['nama_file']; ?>">
        	<img class="img-responsive img-thumbnail " src="<?php echo base_url(); ?>assets/gallery/<?php echo $g['nama_file']; ?>">
        </div>
<?php } ?> 
    </div>
</form> 
    <div class="center">
        <?php echo $paginator;  ?>  
    </div>

<div class="col-md-8">        	
    <ol class="breadcrumb">
	  <li ><a href="#">Berita</a></li>
	  <li class="active"><a href="#">Edit Berita</a></li>
	</ol>
</div>
<div class="col-md-12">        	
    <div class="main">
<?php
	foreach($data->result_array() as $ed) {
	?>
    	<form action="<?php echo base_url(); ?>admin/editBanner" method="post" enctype="multipart/form-data">
    		<div class="form-group">    						
				<button class="btnfrm publish">
					<span class="glyphicon glyphicon-ok"></span>Publish
				</button>
				
			</div>
			<div class="form-group">
				<input type="hidden" name="id_banner" value="<?php echo $ed['id']; ?>">	
			</div>		  		
			<div class="form-group" style="background:none;">				
				<label>Upload Banner  (Biarkan kosong apabila tidak ada perubahan)</label>
				<input id="file-0" class="file" type="file" name="gambar_banner">
			</div>						
	</form>
<?php } ?>
    </div>       	
</div>

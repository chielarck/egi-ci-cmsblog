<div class="page-header">
    <h3>Halaman</h3>
</div>
<form action="hapusHalaman" method="post">
	<div class="section">     	
		<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/tambahhalaman"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
		<button class="btn btn-danger" name="hapus"><span class="glyphicon glyphicon-trash"></span>Hapus</button>
	</div>
	<div class="table-responsive">
	    	<table class="table table-bordered table-striped">
	    		<thead>
		    		<tr>
		    			<th class="clr"><input type="checkbox" name="selectAll" id="selectAll" /></th>			  
			    		<th>Judul Halaman</th>				    				    	
			    		<th>Status</th>
			    		<th></th>
			    	</tr>
			    </thead>
			    <tbody>
			<?php				
				foreach($halaman->result_array() as $h) {
				?>
			    	<tr>
			    		<td class="ceklist"><input type="checkbox" name="check[]" value="<?php echo $h['id']; ?>"></td>
			    		<td><?php echo $h['judul_halaman']; ?></td>			  	    		
			    		<td><?php echo $h['status']; ?></td>
			    		<td><a class="ico-hover" href="<?php echo base_url(); ?>admin/editHalaman/<?php echo $h['id']; ?>"><span class="fui-new"></span></a>
			    			|
			    			<a class="ico-hover" href="<?php echo base_url().'page/'.$h['url_halaman']; ?>" title="lihat halaman"><span class="fui-eye"></span></a>
			    		</td>
			    	</tr>
			<?php
				}
				?>			    	
			    </tbody>
	    	</table>
	    <div class="center">
	    <?php
	    	echo $paginator; 
	    	?>	
	    </div>	    
	</div>  
</form>
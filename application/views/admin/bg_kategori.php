<div class="page-header">
    <h3>Kategori</h3>
</div>
<form action="<?php echo base_url();?>admin/hapusKategori" method="post">
	<div class="section">      	
		<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/tambahKategori"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
		<button class="btn btn-danger" name="hapus"><span class="glyphicon glyphicon-trash"></span>Hapus</button>
	</div>
	<div class="table-responsive">
	    	<table class="table table-bordered table-striped">
	    		<thead>
		    		<tr>
		    			<th class="clr"><input type="checkbox" name="selectAll" id="selectAll" /></th>			  
			    		<th>Nama Kategori</th>			    	
			    		<th>Jenis Kategori</th>
			    		<th></th>	
			    	</tr>
			    </thead>
			    <tbody>
			<?php				
				foreach($kategori->result_array() as $k) {
				?>
			    	<tr>
			    		<td class="ceklist"><input type="checkbox" name="check[]" value="<?php echo $k['id']; ?>"></td>
			    		<td><?php echo $k['nama_kategori']; ?></td>			    		
			    		<td><?php echo $k['jenis_kategori']; ?></td>
			    		<td><a class="ico-hover" href="<?php echo base_url(); ?>admin/editKategori/<?php echo $k['id']; ?>"><span class="fui-new"></span></a></td>
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

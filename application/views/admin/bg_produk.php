<div class="page-header">
    <h3>Produk</h3>
</div>
<form action="<?php echo base_url(); ?>admin/hapusProduk" method="post">
	<div class="section">       	
		<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/tambahproduk"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
		<button class="btn btn-danger" name="hapus"><span class="glyphicon glyphicon-trash"></span>Hapus</button>
	</div>
	<div class="table-responsive">
	    	<table class="table table-bordered table-striped">
	    		<thead>
		    		<tr>
		    			<th class="clr"><input type="checkbox" name="selectAll" id="selectAll" /></th>			  
			    		<th>Nama Produk</th>	
			    		<th>Kategori</th>				    				    		
			    		<th>Status</th>
			    		<th></th>			    		
			    	</tr>
			    </thead>
			    <tbody>
			<?php				
				foreach($produk->result_array() as $b) {
				?>
			    	<tr>
			    		<td class="ceklist"><input id="check" type="checkbox" name="check[]" value="<?php echo $b['gambar_produk']; ?>"></td>
			    		<td><?php echo $b['nama_produk']; ?></td>
			    		<td><?php echo $b['kategori']; ?></td>				    				    		
			    		<td><?php echo $b['status']; ?></td>
			    		<td><a class="ico-hover" href="<?php echo base_url(); ?>admin/editProduk/<?php echo $b['id']; ?>"><span class="fui-new"></span></a></td>			    		
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

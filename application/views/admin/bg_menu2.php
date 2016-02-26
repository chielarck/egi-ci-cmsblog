<div class="page-header">
    <h3>Menu</h3>
</div>
<form action="<?php echo base_url();?>admin/hapusMenu" method="post">
	<div class="section">      	
		<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/tambahMenu"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
		<button class="btn btn-danger" name="hapus"><span class="glyphicon glyphicon-trash"></span>Hapus</button>
	</div>
	<div class="table-responsive">
	    	<table class="table table-bordered table-striped">
	    		<thead>
		    		<tr>
		    			<th class="clr"><input type="checkbox" name="selectAll" id="selectAll" /></th>			  
			    		<th>Nama Menu</th>			    	
			    		<th>Url</th>
			    		<th>Jenis Menu</th>	
			    		<th>Status</th>
			    		<th></th>		
			    	</tr>
			    </thead>
			    <tbody>
			<?php				
				foreach($menu->result_array() as $m) {
				?>
			    	<tr>
			    		<td class="ceklist"><input type="checkbox" name="check[]" value="<?php echo $m['id_menu']; ?>"></td>
			    		<td><?php echo $m['nama_menu']; ?></td>			    		
			    		<td><?php echo $m['url_menu']; ?></td>
			    		<td><?php echo $m['jenis_menu']; ?></td>
			    		<td><?php echo $m['status']; ?></td>
			    		<td><a class="ico-hover" href="<?php echo base_url(); ?>admin/editMenu/<?php echo $m['id_menu']; ?>"><span class="fui-new"></span></a></td>
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

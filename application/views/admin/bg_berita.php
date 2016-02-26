<div class="page-header">
    <h3>Beranda</h3>
</div>
<form action="<?php echo base_url(); ?>admin/hapusBerita" method="post">  
	<div class="section">    	
		<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/tambahberita"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
		<button class="btn btn-danger" name="hapus"><span class="glyphicon glyphicon-trash"></span>Hapus</button>
    </div>	
       	<div class="table-responsive">
	    	<table class="table table-bordered table-striped">
	    		<thead>
		    		<tr>
		    			<th class="clr"><input type="checkbox" class="custom-checkbox" name="selectAll" id="selectAll" /></th>			  
			    		<th>Judul Berita</th>
			    		<th>Kategori</th>
			    		<th>Tanggal</th>
			    		<th>Status</th>
			    		<th></th>
			    	</tr>
			    </thead>
			    <tbody>
			<?php				
				foreach($berita->result_array() as $b) {
				?>
			    	<tr>
			    		<td class="ceklist"><input type="checkbox" name="check[]" id="check" class="custom-checkbox" value="<?php echo $b['gambar_berita']; ?>"></td>
			    		<td><?php echo $b['judul_berita']; ?></td>
			    		<td><?php echo $b['kategori']; ?></td>
			    		<td><?php echo nama_hari($b['tgl']).', '.tgl_indo($b['tgl']); ?></td>
			    		<td><?php echo $b['status']; ?></td>
			    		<td><a class="ico-hover" href="<?php echo base_url(); ?>admin/editBerita/<?php echo $b['id']; ?>"><span class="fui-new"></span></a></td>
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

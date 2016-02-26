<div class="page-header">
    <h3>Tambah Kategori</h3>
</div>
	<div class="section"> 
    	<form action="<?php echo base_url(); ?>admin/doEditKategori" method="post">
<?php foreach($data->result_array() as $ed) { ?>
    		<div class="form-group right">    						
				<button class="btn btn-hg btn-info">
					<span class="fui-check"></span>Publish
				</button>
			</div>	
			<div class="form-group" style="background:none;padding:0;">						
				<input class="form-control" type="text" name="id_kategori" value="<?php echo $ed['id']; ?>" readonly>			
			</div>		
			<div class="form-group">					
				<select style="width:300px" class="form-control" name="jenis_kategori" width="300" required>
					<option value>Jenis Kategori</option>
					<option value="Berita" <?php if($ed['jenis_kategori'] == 'Berita') { echo 'selected';} ?>>Berita</option>
					<option value="Produk" <?php if($ed['jenis_kategori'] == 'Produk') { echo 'selected';} ?>>Produk</option>				
				</select>							
			</div>
			<div class="form-group" style="background:none;padding:0;">						
				<input style="height:40px" class="form-control" type="text" name="nama_kategori" value="<?php echo $ed['nama_kategori']; ?>">			
			</div>  
<?php } ?>	
		</form>
    </div>       	
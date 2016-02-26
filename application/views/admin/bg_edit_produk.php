<div class="page-header">
    <h3>Edit Produk</h3>
</div>
	<div class="section"> 
    	<form action="<?php echo base_url(); ?>admin/doEditProduk" method="post" enctype="multipart/form-data">
<?php
	foreach($data->result_array() as $ed) {
	?>
    		<div class="form-group right">    						
				<button class="btn btn-hg btn-info">
					<span class="fui-check"></span>Publish
				</button>
				
			</div>
			<div class="form-group">
				<input type="hidden" name="id_produk" value="<?php echo $ed['id']; ?>" readonly>	
			</div>
			<div class="form-group">	
				<select style="width:300px" class="form-control" name="kategori" width="300" required>
						<option value>Pilih Kategori</option>
				<?php foreach($kategori->result_array() as $k) { ?>	
						<option value="<?php echo $k['nama_kategori']; ?>" <?php if($ed['kategori'] == $k['nama_kategori']) { echo 'selected';} ?>><?php echo $k['nama_kategori']; ?></option>		
				<?php } ?>		
				</select>
			</div>
			<div class="form-group">						
				<input style="height:40px" class="form-control" type="text" name="nama_produk" placeholder="ketikan judul .." value="<?php echo $ed['nama_produk']; ?>" required>			
			</div>
    		<div class="form-group">
				<textarea class="form-control" name="keterangan" required><?php echo $ed['keterangan']; ?></textarea>
			</div>
			<div class="form-group">				
				<label>Upload Gambar Produk (Biarkan kosong apabila tidak ada perubahan)</label>
				<input id="file-0" class="file" type="file" name="gambar_produk">
			</div>	
			<div class="form-group">
				<label class="rd"><input type="radio" name="status" value="Tampil" <?php if($ed['status'] == 'Tampil') { echo 'checked';} ?>>Tampil</label>	
				<label class="rd"><input type="radio" name="status" value="Tidak" <?php if($ed['status'] == 'Tidak') { echo 'checked';} ?>>Tidak</label>
			</div>
		</form>
<?php } ?>			
    </div>       	
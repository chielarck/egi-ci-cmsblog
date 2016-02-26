<div class="page-header">
    <h3>Edit Berita</h3>
</div>
	<div class="section">
		<form action="<?php echo base_url(); ?>admin/doEditBerita" method="post" enctype="multipart/form-data">
<?php
	foreach($data->result_array() as $ed) {
	?>
    		<div class="form-group right">    						
				<button class="btn btn-hg btn-info">
					<span class="fui-check"></span>Publish
				</button>				
			</div>
			<div class="form-group">
				<input type="hidden" name="id_berita" value="<?php echo $ed['id']; ?>" readonly>					
				<select style="width:300px" class="form-control" name="kategori" width="300" required>
					<option value>Pilih Kategori</option>
				<?php foreach($kategori->result_array() as $k) { ?>	
					<option value="<?php echo $k['nama_kategori'];?>" <?php if($ed['kategori'] == $k['nama_kategori']) { echo 'selected';} ?>><?php echo $k['nama_kategori'];?></option>		
				<?php } ?>	
				</select>							
			</div>
			<div class="form-group">						
				<input style="height:40px" class="form-control" type="text" name="judul_berita" placeholder="ketikan judul .." value="<?php echo $ed['judul_berita']; ?>" required>			
			</div>
    		<div class="form-group">
				<textarea id="editor1" name="isi_berita" required><?php echo $ed['isi_berita']; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace( 'isi_berita' );
				</script>
			</div>
			<div class="form-group">				
				<label>Upload Sampul Gambar  (Biarkan kosong apabila tidak ada perubahan)</label>
				<input id="file-0" class="file" type="file" name="gambar_berita">
			</div>	
			<div class="form-group">
				<label class="rd"><input type="radio" name="status" value="Tampil" <?php if($ed['status'] == 'Tampil') { echo 'checked';} ?>>Tampil</label>	
				<label class="rd"><input type="radio" name="status" value="Tidak" <?php if($ed['status'] == 'Tidak') { echo 'checked';} ?>>Tidak</label>
			</div>
<?php } ?>
		</form>
	</div>
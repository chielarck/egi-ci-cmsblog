<div class="page-header">
    <h3>Tambah Berita</h3>
</div>
	<div class="section"> 
    	<form action="<?php echo base_url(); ?>admin/doTambahBerita" method="post" enctype="multipart/form-data">
    		<div class="form-group right">    						
				<button class="btn btn-hg btn-info">
					<span class="fui-check"></span>Publish
				</button>				
			</div>	
    		<div class="form-group">
				<input type="hidden" name="id_berita" value="<?php echo $id; ?>" readonly>	
			</div>
			<div class="form-group">				
				<select style="width:300px" class="form-control" name="kategori" width="300" required>
					<option value>Pilih Kategori</option>
				<?php foreach($kategori->result_array() as $k) { ?>	
					<option value="<?php echo $k['nama_kategori'];?>"><?php echo $k['nama_kategori'];?></option>		
				<?php } ?>		
				</select>				
			</div>
			<div class="form-group">						
				<input style="height:40px" class="form-control" type="text" name="judul_berita" placeholder="ketikan judul .." required>			
			</div>
    		<div class="form-group">
				<textarea id="editor1" name="isi_berita" required></textarea>
				<script type="text/javascript">
					CKEDITOR.replace( 'isi_berita' );
				</script>
			</div>	
			<div class="form-group">				
				<label>Upload Sampul Gambar</label>
				<input id="file-0" class="file" type="file" name="gambar_berita">
			</div>			
			<div class="form-group">
				<label class="rd"><input type="radio" name="status" value="Tampil" checked>Tampil</label>	
				<label class="rd"><input type="radio" name="status" value="Tidak">Tidak</label>
			</div>					
		</form>
	</div>
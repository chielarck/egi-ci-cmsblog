<div class="page-header">
    <h3>Tambah Halaman</h3>
</div>
	<div class="section">
    	<form action="<?php echo base_url(); ?>admin/doTambahHalaman" method="post">
    		<div class="form-group right">    						
				<button class="btn btn-hg btn-info">
					<span class="fui-check"></span>Publish
				</button>
				
			</div>
			<div class="form-group">						
				<input class="form-control" type="hidden" name="id_halaman" value="<?php echo $id; ?>" readonly>			
			</div>	
			<div class="form-group">						
				<input style="height:40px" class="form-control" type="text" name="judul_halaman" placeholder="ketikan judul .." required>			
			</div>
    		<div class="form-group">
				<textarea id="editor1" name="isi_halaman" required></textarea>
				<script type="text/javascript">
					CKEDITOR.replace( 'isi_halaman' );
				</script>
			</div>	
			<div class="form-group">
				<label class="rd"><input type="radio" name="status" value="Tampil" checked>Tampil</label>	
				<label class="rd"><input type="radio" name="status" value="Tidak">Tidak</label>
			</div>			
		</form>
    </div>       	
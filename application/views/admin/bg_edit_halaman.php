<div class="page-header">
    <h3>Edit Halaman</h3>
</div>
	<div class="section">
		<form action="<?php echo base_url(); ?>admin/doEditHalaman" method="post">
<?php
	foreach($data->result_array() as $ed) {
	?>
    		<div class="form-group right">    						
				<button class="btn btn-hg btn-info">
					<span class="fui-check"></span>Publish
				</button>
				
			</div>
			<div class="form-group">
				<input type="text" name="id_halaman" value="<?php echo $ed['id']; ?>">												
			</div>
			<div class="form-group">						
				<input style="height:40px" class="form-control" type="text" name="judul_halaman" placeholder="ketikan judul .." value="<?php echo $ed['judul_halaman']; ?>" required>			
			</div>
    		<div class="form-group">
				<textarea id="editor1" name="isi_halaman" required><?php echo $ed['isi_halaman']; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace( 'isi_halaman' );
				</script>
			</div>	
			<div class="form-group">
				<label class="rd"><input type="radio" name="status" value="Tampil" <?php if($ed['status'] == 'Tampil') { echo 'checked';} ?>>Tampil</label>	
				<label class="rd"><input type="radio" name="status" value="Tidak" <?php if($ed['status'] == 'Tidak') { echo 'checked';} ?>>Tidak</label>
			</div>	
<?php } ?>		
		</form>
    </div>       	

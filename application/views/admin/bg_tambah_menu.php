<div class="page-header">
    <h3>Tambah Menu</h3>
</div>
	<div class="section">       	
    	<form action="<?php echo base_url(); ?>admin/doTambahMenu" method="post">
    		<div class="form-group right">    						
				<button class="btn btn-hg btn-info">
					<span class="fui-check"></span>Publish
				</button>
			</div>			
			<div class="form-group">					
				<select style="width:300px" class="form-control" name="jenis_menu" width="300" required>
					<option value>Jenis Menu</option>
					<option value="Main">Main</option>
					<option value="Second">Second</option>				
				</select>							
			</div>
			<div class="form-group">						
				<input style="height:40px" class="form-control" type="text" name="nama_menu" placeholder="nama menu.." required>			
			</div>  
			<div class="form-group">						
				<input style="height:40px" class="form-control" type="text" name="url_menu" placeholder="url menu" required>			
			</div> 
			<div class="form-group">
				<label class="rd"><input type="radio" name="status" value="Tampil" checked>Tampil</label>	
				<label class="rd"><input type="radio" name="status" value="Tidak">Tidak</label>
			</div>	
		</form>
    </div>       	


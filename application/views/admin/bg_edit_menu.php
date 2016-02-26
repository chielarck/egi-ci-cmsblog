<div class="page-header">
    <h3>Edit Menu</h3>
</div>
	<div class="section">       	
    	<form action="<?php echo base_url(); ?>admin/doEditMenu" method="post">
<?php foreach($data->result_array() as $ed) { ?>
    		<div class="form-group right">    						
				<button class="btn btn-hg btn-info">
					<span class="fui-check"></span>Publish
				</button>
			</div>
			<div class="form-group">						
				<input class="form-control" type="hidden" name="id_menu" value="<?php echo $ed['id_menu']; ?>" readonly>			
			</div>	
			<div class="form-group">						
				<input class="form-control" type="hidden" name="for_menu" value="<?php echo $ed['for']; ?>" readonly>			
			</div>				
			<div class="form-group">					
				<select style="width:300px" id="cb_menu" class="form-control select select-primary select-block mbl" name="jenis_menu" width="300" required>
					<option value="primary" <?php if($ed['jenis_menu'] == 'primary') { echo 'selected';} ?>>Primary</option>
					<option value="second" <?php if($ed['jenis_menu'] == 'second') { echo 'selected';} ?>>Second</option>				
				</select>							
			</div>
			<div class="form-group">						
				<select style="width:500px" id="list_menu" class="form-control select select-primary select-block mbl" name="list_menu" width="300" disabled>
		<?php foreach($all_menu->result_array() as $menu) { ?>
					<option value="<?php echo $menu['nama_menu']; ?>"><?php echo $menu['nama_menu']; ?></option>	
		<?php } ?>								
				</select>				
			</div>
			<div class="form-group">						
				<input style="height:40px" class="form-control" type="text" name="nama_menu" placeholder="nama menu.." value="<?php echo $ed['nama_menu']; ?>" required>			
			</div>
		<?php if($ed['for'] == null) { ?>		
			<div class="form-group">						
				<input style="height:40px" class="form-control" type="text" name="url_menu" placeholder="url menu" value="<?php echo $ed['url_menu']; ?>"required>			
			</div> 
		<?php } ?>
		<div class="form-group">
				<label class="rd"><input type="radio" name="status" value="tampil" <?php if($ed['status'] == 'tampil') { echo 'checked';} ?>>Tampil</label>	
				<label class="rd"><input type="radio" name="status" value="tidak" <?php if($ed['status'] == 'tidak') { echo 'checked';} ?>>Tidak</label>
			</div>	
<?php } ?>
		</form>
    </div>       	


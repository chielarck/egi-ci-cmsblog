<div class="page-header">
    <h3>Tambah Kategori</h3>
</div>
	<div class="section">       	
    	<form action="<?php echo base_url(); ?>admin/doTambahKategori" method="post">
    		<div class="form-group right">    						
				<button class="btn btn-hg btn-info">
					<span class="fui-check"></span>Publish
				</button>
			</div>
			<div class="form-group" style="background:none;padding:0;">						
				<input class="form-control" type="hidden" name="id_kategori" value="<?php echo $id; ?>"
				readonly>			
			</div>  			
			<div class="form-group">					
				<select style="width:300px" class="form-control" name="jenis_kategori" width="300" required>
					<option value>Jenis Kategori</option>
					<option value="Berita">Berita</option>
					<option value="Produk">Produk</option>				
				</select>							
			</div>
			<div class="form-group" style="background:none;padding:0;">						
				<input style="height:40px" class="form-control" type="text" name="nama_kategori" placeholder="nama kategori.." required>			
			</div>  	
		</form>
    </div>       	


<div class="page-header">
    <h3>Menu</h3>
</div>
<div class="col-xs-4">
	<section id="menulist">
		<ul class="nav nav-pills nav-stacked">
			<li><a href="#dtpage" data-toggle="collapse">Halaman<span class="fui-triangle-down-small"></span></a>
				<ul id="dtpage" class="detail-menu collapse">
					<li>
						<form action="<?php echo base_url();?>admin/doTambahMenuHal" method="post">						
							<div class="list-page">
					<?php foreach($halaman->result_array() as $h) { ?>
								<label class="checkbox" for="checkbox<?php echo $h['id']; ?>">
						        <input type="checkbox" name="halaman_menu[]" value="<?php echo $h['judul_halaman']; ?>" id="checkbox<?php echo $h['id']; ?>" data-toggle="checkbox">
						            <?php echo $h['judul_halaman']; ?>
						        </label>						        
					<?php } ?>
						    </div>						    
						    <div class="right">
					        	<button class="btn btn-xs btn-primary" name="tambah_cat_menu"><span class="fui-plus"></span>Tambah</button>
					    	</div>
					    </form>
					</li>
				</ul>
			</li>
			<li><a href="#dtlink" data-toggle="collapse">Link<span class="fui-triangle-down-small"></span></a>
				<ul id="dtlink" class="detail-menu collapse">
					<li>
						<form action="<?php echo base_url();?>admin/doTambahMenuLink" method="post">
							<div class="mtb">
								<div class="form-group">
									<input class="form-control input-sm" type="text" name="url_menu" placeholder="http://example.com">
								</div>
								<div class="form-group">
									<input class="form-control input-sm" type="text" name="nama_menu" placeholder="nama menu">
								</div>
							    <div class="right">
						        	<button class="btn btn-xs btn-primary" name="tambah_cat_menu"><span class="fui-plus"></span>Tambah</button>
						    	</div>
						    </div>
					    </form>
					</li>
				</ul>
			</li>
			<li><a href="#dtkategori" data-toggle="collapse">Kategori<span class="fui-triangle-down-small"></span></a>
				<ul id="dtkategori" class="detail-menu collapse">
					<li>
						<form action="<?php echo base_url();?>admin/doTambahMenuKat" method="post">
							<a href="#">Pilih Semua</a>
							<div class="list-page">
					<?php 						
						foreach($kategori->result_array() as $k) { 
					?>
								<label class="checkbox" for="checkbox<?php echo $k['id']; ?>">
						        <input type="checkbox" name="kategori_menu[]" value="<?php echo $k['nama_kategori']; ?>" id="checkbox<?php echo $k['id']; ?>" data-toggle="checkbox">
						            <?php echo $k['nama_kategori']; ?>
						        </label>						        
					<?php } ?>
						    </div>
						    <div class="right">
					        	<button class="btn btn-xs btn-primary" name="tambah_cat_menu"><span class="fui-plus"></span>Tambah</button>
					    	</div>
					    </form>
					</li>
				</ul>
			</li>
		</ul>
	</section>
</div>
<div class="col-xs-8">	
	<div class="table-responsive">
	    	<table class="table table-bordered">
	    		<thead>
		    		<tr>		    			  
			    		<th>Nama Menu</th>    	
						<th>Jenis Menu</th>	
			    		<th>Status</th>
			    		<th></th>		
			    	</tr>
			    </thead>
			    <tbody>
			<?php				
				foreach($menu->result_array() as $m) {
				?>
			    	<tr>			    		
			    		<td><?php echo $m['nama_menu']; ?></td>    		
			    		<td><?php echo $m['jenis_menu']; ?></td>
			    		<td><?php echo $m['status']; ?></td>
			    		<td>
			    			<a class="ico-hover" href="<?php echo base_url(); ?>admin/editMenu/<?php echo $m['id_menu']; ?>"><span class="fui-new"></span></a>
			    				|
			    			<a class="ico-hover" href="<?php echo base_url(); ?>admin/hapusMenu/<?php echo $m['id_menu']; ?>"><span class="fui-trash"></span></a>
			    		</td>
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
</div>
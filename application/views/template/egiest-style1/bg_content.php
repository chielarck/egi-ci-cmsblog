<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
 
  <div class="carousel-inner">
<?php foreach($banner->result_array() as $bnr) { ?>
    <div class="item <?php echo $bnr['status']; ?>">
      <img class="img-banner" src="<?php base_url(); ?>assets/banner/<?php echo $bnr['nama_file']; ?>">
    </div>
<?php } ?>    
  </div>
 
 	<div class="intro">
		<h2><span>Egiest Web Development</span></h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse non quam euismod, 
			consequat justo a, semper libero. Pellentesque vehicula est eu erat faucibus, non aliquet
			enim pretium. Aenean a urna quis leo volutpat iaculis sed ac lorem. In in sem condimentum,
			finibus felis vel, rhoncus nulla.</p>
	</div>

  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
<div id="main" class="clr1">
  <div class="container">
    	<div class="row">
      	 <div class="col-md-4" style="text-align:center;">          
             <img class="img-responsive img-thumbnail " src="<?php echo base_url(); ?>assets/img/1.jpg">
        	   <p style="color:#fff;font-size:1.3em;font-weight:bold;margin:10px 0;">Professional Team</p>     
         </div>
        <div class="col-md-4" style="text-align:center">     
           <img class="img-responsive img-thumbnail " src="<?php echo base_url(); ?>assets/img/2.jpg">
            <p style="color:#fff;font-size:1.3em;font-weight:bold;margin:10px 0;">Good Teamwork</p>          
        </div>
        <div class="col-md-4" style="text-align:center">
            <img class="img-responsive img-thumbnail " src="<?php echo base_url(); ?>assets/img/3.jpg">
             <p style="color:#fff;font-size:1.3em;font-weight:bold;margin:10px 0;">Ready For You</p>
        </div>
  
    </div>
  </div>
</div>
<div id="main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8" style="border-right:1px #ecf0f1 solid;">
          <div class="col-md-12">
              <div class="title">
                <h2 class="t-produk">Produk Kami</h2>
              </div>
          </div>
          <div class="col-md-12">
            <div class="row">
        <?php foreach($produk->result_array() as $p) { ?>   
              <div class="col-md-3" style="margin-bottom: 15px;">                 
                  <img class="img-product" src="<?php echo base_url(); ?>assets/produk/<?php echo $p['gambar_produk'];?>">
                  <h4 style="margin:0; padding:10px 0;"><a href="#"><?php echo $p['nama_produk']; ?></a></h4>            
              </div>
        <?php } ?>          
         </div>
         <div class="row" style="text-align:right;">
              <a href="#" class="more">Selengkapnya&#8594;</a>
          </div>   
        </div>
      </div>
      <div class="col-md-4"> 
        <div class="col-md-12">    
          <div class="title">
            <h2 class="t-berita">Update Berita</h2>
          </div>
        </div> 
  <?php foreach($berita->result_array() as $b) { ?>
          <div class="col-md-12" style="border-bottom:2px #ecf0f1 solid;padding:20px 0;">         
            <div class="col-md-4">
              <img class="img-preview-news" src="<?php echo base_url(); ?>assets/berita/<?php echo $b['gambar_berita']; ?>">
            </div>
            <div class="col-md-8" style="text-align:justify;">        
                <a class="title-prev-news" href="#"><?php echo $b['judul_berita']; ?></a>
                <?php 
                  $isi_berita = preg_replace("/<img[^>]+\>/i", "", $b['isi_berita']); 
                  echo limitText($isi_berita,100); ?>
            </div>     
          </div>
  <?php } ?>     
         <div class="row" style="text-align:right;">
              <a class="more" href="#">Selengkapnya&#8594;</a>
          </div>            
      </div>      
    </div>
  </div>  
</div>
<div id="main-footer" class="clr2">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3" style="color:#fff;">      
          <div class="t-info">Customer Service</div>
          <p>Ada Pertanyaan ? Silahkan menghubungi customer service kami:</p>
          <p>CS Name 
            <!-- <a style="margin:0 10px;" href = 'ymsgr:sendim?novavnu'>
              <img src="http://opi.yahoo.com/online?u=YourID&m=g&t=2" border=0>
            </a> -->
          </p>
      </div>
      <div class="col-md-3">      
          <div class="t-info">Temukan Kami</div>
          <a class="btn btn-social-icon btn-facebook">
            <i class="fa fa-facebook"></i>
          </a>
          <a class="btn btn-social-icon btn-twitter">
            <i class="fa fa-twitter"></i>
          </a>
          <a class="btn btn-social-icon btn-google-plus">
            <i class="fa fa-google-plus"></i>
          </a>    
      </div>
      <div class="col-md-3">  
          <div class="t-info">Hubungi Kami</div>
          <ul class="info">
            <li>
              <span class="glyphicon glyphicon-home"></span>
              <span><b>Alamat Kami:</b><br> 
              Perum Rajabasa Indah Jl. Sagitarius No. 26 Pramuka, Rajabasa Bandarlampung, Indonesia
              </span>
            </li> 
             <li>
              <span class="glyphicon glyphicon-phone-alt"></span>
              <span>0721 757472</span>
            </li> 
            <li>
              <span class="glyphicon glyphicon-phone"></span>
              <span>08975791255</span>
            </li>  
            <li>
              <span class="glyphicon glyphicon-envelope"></span>
              <span>egigusniawanpradana@gmail.com</span>
            </li>         
          </ul>    
      </div>
      <div class="col-md-3"> 
          <div class="t-info">Gallery Photo</div>
    <?php foreach($gallery->result_array() as $g) { ?>
          <div class="col-md-4" style="margin-bottom: 10px">
            <img class="img-preview-gallery" src="<?php echo base_url(); ?>assets/gallery/<?php echo $g['nama_file']; ?>">
          </div> 
    <?php } ?>        
      </div>
    </div>      
  </div>
</div> 
<div id="main-footer" class="clr2"> 
  <div class="container-fluid">
    <div class="row">
            <div class="col-md-10" style="color:#fff;font-weight:bold;text-align:left;">
              <p>Copyight 2015. All right reserved.</p>
            </div>
            <div class="col-md-2" style="color: #fff;font-weight:bold;text-align:right;">
              <p>Developed by Egi</p>
            </div>
    </div>
  </div>
</div>
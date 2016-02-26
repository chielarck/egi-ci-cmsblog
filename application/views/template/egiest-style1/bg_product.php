<div id="main" class="clr3">
  <div class="container" style="background:#fff;">
    <div class="row">
      <div class="col-md-8" style="border-right:1px #ecf0f1 solid;">
          <ol class="breadcrumb" style="margin:20px 0;">
            <li><a href="#">Home</a></li>
            <li class="active">News</li>
          </ol>
    <?php foreach($product->result_array() as $p) { ?>         
            <h3 class="title-content"><a href="#"><?php echo $p['nama_produk']; ?></a></h3> 
            <div class="detail" style="margin:10px 0;">            
              <span class="glyphicon glyphicon-calendar"></span><a style="margin:0 5px;" href="#">28-01-2015</a>
              <span class="glyphicon glyphicon-tags"></span><a style="margin:0 5px;" href="#">Kegiatan Perusahaan</a>
            </div>
            <div style="clear:both;"></div>            
              <img class="img-responsive" src="<?php echo base_url(); ?>assets/produk/<?php echo $p['gambar_produk']; ?>">
            <div class="content-produk">               
                <?php echo $p['keterangan']; ?>
            </div> 
    <?php } ?>           
            <div style="clear:both"></div>            
              <h5 style="border-bottom:1px #ecf0f1 solid;border-top:1px #ecf0f1 solid;font-size:1.2em;font-weight:bold;padding:10px;">Produk yang berkaitan :</h5>
              <div class="col-md-3" style="padding-bottom:20px;text-align:center;">
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/p1.jpg"> 
                <p style="padding:5px 0;"><a href="#">Desain Taman Minimalis</a></p>
              </div>
              <div class="col-md-3" style="padding-bottom:20px;text-align:center;">
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/p1.jpg"> 
                <p style="padding:5px 0;"><a href="#">Desain Taman Minimalis</a></p>
              </div>
              <div class="col-md-3" style="padding-bottom:20px;text-align:center;">
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/p1.jpg"> 
                <p style="padding:5px 0;"><a href="#">Desain Taman Minimalis</a></p>
              </div>
              <div class="col-md-3" style="padding-bottom:20px;text-align:center;">
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/p1.jpg"> 
                <p style="padding:5px 0;"><a href="#">Desain Taman Minimalis</a></p>
              </div>
      </div>
      <div class="col-md-4"> 
            <div class="title">
                <h2 class="t-berita">Update Berita</h2>            
            </div>
  <?php foreach($berita->result_array() as $br) { ?>
          <div class="row" style="border-bottom:1px #ecf0f1 solid;padding:15px 0;">
            <div class="col-md-4">
                <img class="img-preview-news" src="<?php echo base_url(); ?>assets/berita/<?php echo $br['gambar_berita']; ?>">
            </div> 
            <div class="col-md-8" style="text-align:justify;">
              <a class="title-prev-news" href="#"><?php echo $br['judul_berita']; ?></a>
                <?php 
                  $isi_berita = preg_replace("/<img[^>]+\>/i", "", $br['isi_berita']); 
                  echo limitText($isi_berita,100); 
                ?>
            </div>
          </div>
  <?php } ?>     
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
          <div class="col-md-4" style="margin-bottom: 10px">
            <img class="img-responsive img-thumbnail" src="<?php echo base_url(); ?>assets/gallery/1.jpg">
          </div>
          <div class="col-md-4" style="margin-bottom: 10px">
            <img class="img-responsive img-thumbnail" src="<?php echo base_url(); ?>assets/gallery/2.jpg">
          </div>
           <div class="col-md-4" style="margin-bottom: 10px">
            <img class="img-responsive img-thumbnail" src="<?php echo base_url(); ?>assets/gallery/3.jpg">
          </div>
           <div class="col-md-4" style="margin-bottom: 10px">
            <img class="img-responsive img-thumbnail" src="<?php echo base_url(); ?>assets/gallery/4.jpg">
          </div>
           <div class="col-md-4" style="margin-bottom: 10px">
            <img class="img-responsive img-thumbnail" src="<?php echo base_url(); ?>assets/gallery/5.jpg">
          </div>
           <div class="col-md-4" style="margin-bottom: 10px">
            <img class="img-responsive img-thumbnail" src="<?php echo base_url(); ?>assets/gallery/6.jpg">
          </div>
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
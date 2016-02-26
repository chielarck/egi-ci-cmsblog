<div id="main" class="clr3">
  <div class="container" style="background:#fff;">
    <div class="row">
      <div class="col-md-8" style="border-right:1px #ecf0f1 solid;">
        <ol class="breadcrumb" style="margin:20px 0;">
            <li><a href="#">Home</a></li>
            <li class="active">Product</li>
        </ol> 
        <h2 style="border-bottom:1px #ecf0f1 solid;padding-bottom:10px;margin-top:15px;">Produk Kami</h2>
        <div class="row">  
   <?php foreach($product->result_array() as $pr) { ?>       
          <div class="col-md-4" style="margin-bottom:20px;text-align:center;">  
            <h4 class="box-title"><a style="color:#fff;" href="<?php echo base_url().'product/detail/'.$pr['id'].'/'.$pr['nama_produk']; ?>"><?php echo $pr['nama_produk']; ?></a></h4>
            <img class="img-product" src="<?php echo base_url(); ?>assets/produk/<?php echo $pr['gambar_produk']; ?>">                     
          </div> 
  <?php } ?>
        </div>       
        <nav style="text-align:center;">
            <ul class="pagination">
              <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
              <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>                         
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
          <div class="row" style="text-align:right;">
              <a href="#" class="more">Selengkapnya&#8594;</a>
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
<?php
include "header.php";
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ayarlar</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ayarlar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                  <?php 
if(isset($_GET['Durum']))
{
  if($_GET['Durum'])
  {
?>
                  <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Güncelleme Başarılı</strong>
                  </div>
<?php
  }
  else
  {
?>
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Güncelleme Başarısız !!!</strong>
                  </div>
<?php
  }
}

 ?>

                    <form action="ayar_guncelle.php" method="POST" class="form-horizontal form-label-left" novalidate>

                      <p>Web sitenizin ayalarını güncelleyebileceğiniz alan.
                      </p>
                      
                      <!----------------------------------------------------------- Genel Ayarlar --------------------------------------------------------------------------------->
                      <span class="section">Genel Ayarlar</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_baslik">Sitenizin Başlığı *<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ayar_baslik" class="form-control col-md-7 col-xs-12" name="ayar_baslik" value="<?php echo $ayar["ayar_baslik"] ?>" placeholder="Sitenizin Başlığını giriniz" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_aciklama">Sitenizin Açıklaması *<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ayar_aciklama" class="form-control col-md-7 col-xs-12" name="ayar_aciklama" value="<?php echo $ayar["ayar_aciklama"] ?>" placeholder="Sitenizin açıklamasını giriniz" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_keywords">Anahtar Kelimeler *<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ayar_keywords" class="form-control col-md-7 col-xs-12" name="ayar_keywords" value="<?php echo $ayar["ayar_keywords"] ?>" placeholder="Sitenizin keywordlerini giriniz" required="required" type="text">
                        </div>
                      </div>
                      <!----------------------------------------------------------- Genel Ayarlar --------------------------------------------------------------------------------->

                      <!----------------------------------------------------------- Sosyal Medya --------------------------------------------------------------------------------->
                      <span class="section">Sosyal Medya</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_instagram">Instagram
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ayar_instagram" class="form-control col-md-7 col-xs-12" name="ayar_instagram" value="<?php echo $ayar["ayar_instagram"] ?>" placeholder="İnstagram Adresinizi Giriniz" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_youtube">Youtube
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ayar_youtube" class="form-control col-md-7 col-xs-12" name="ayar_youtube" value="<?php echo $ayar["ayar_youtube"] ?>" placeholder="Sitenizin Youtube Adresini Giriniz" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_facebook">Facebook
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ayar_facebook" class="form-control col-md-7 col-xs-12" name="ayar_facebook" value="<?php echo $ayar["ayar_facebook"] ?>" placeholder="Sitenizin Facebook Adresini Giriniz" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_tiktok">Tiktok
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ayar_tiktok" class="form-control col-md-7 col-xs-12" name="ayar_tiktok" value="<?php echo $ayar["ayar_tiktok"] ?>" placeholder="Sitnizin Tiktok Hesabını Giriniz" type="text">
                        </div>
                      </div>
                      <!-----------------------------------------------------------Sosyal Medya --------------------------------------------------------------------------------->

                      <!-----------------------------------------------------------Mail Ayarlari --------------------------------------------------------------------------------->
                      <span class="section">Mail Ayarları</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_sunucu">Mail Sunucu <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ayar_sunucu" class="form-control col-md-7 col-xs-12" name="ayar_sunucu" value="<?php echo $ayar["ayar_sunucu"] ?>" placeholder="Mail Sunucunuzu Giriniz" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_port">Port <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ayar_port" class="form-control col-md-7 col-xs-12" name="ayar_port" value="<?php echo $ayar["ayar_port"] ?> "placeholder="Port Giriniz" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_mail">Mail Adresi <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ayar_mail" class="form-control col-md-7 col-xs-12" name="ayar_mail" value="<?php echo $ayar["ayar_mail"] ?>" placeholder="Mail Adresinizi Giriniz" required="required" type="text">
                        </div>

                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_sifre">Mail Şifresi <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ayar_sifre" class="form-control col-md-7 col-xs-12" name="ayar_sifre" value="<?php echo $ayar["ayar_sifre"] ?>" placeholder="Şifre" required="required" type="password">
                        </div>
                    </div>
                      <!----------------------------------------------------------- Mail Ayarlari --------------------------------------------------------------------------------->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Kaydet</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php
include "footer.php";
 ?>
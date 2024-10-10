<?php 

include 'header.php'; 


?>

<div class="container">
<?php

    include 'side_menu.php';
?>
    <main class="content">

<div class="x_panel">
          <div class="x_title">
          <h2>İletişim Ayarlar</h2>

             
          </div>
          <div class="x_content">

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon Numarası <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ayar_tel" value="<?php echo $ayarcek['ayar_tel'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon Numarası (GSM) <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ayar_gsm" value="<?php echo $ayarcek['ayar_gsm'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Faks Numarası <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ayar_faks" value="<?php echo $ayarcek['ayar_faks'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail Adresi<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="email" id="first-name" name="ayar_mail" value="<?php echo $ayarcek['ayar_mail'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İlçe <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ayar_ilce" value="<?php echo $ayarcek['ayar_ilce'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İl <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ayar_il" value="<?php echo $ayarcek['ayar_il'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adres <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ayar_adres" value="<?php echo $ayarcek['ayar_adres'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mesai <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ayar_mesai" value="<?php echo $ayarcek['ayar_mesai'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="iletisimayarkaydet" class="btn btn-success">Güncelle</button>
                </div>
              </div>

            </form>



          </div>
        </div>

              </main>

              </div>
<!-- /page content -->

<?php include 'footer.php'; ?>

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
            <h2>Api Ayarlar <h2>

              
          </div>
          <div class="x_content">

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Analystic Kodu <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ayar_analystic" value="<?php echo $ayarcek['ayar_analystic'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Maps Api <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ayar_maps" value="<?php echo $ayarcek['ayar_maps'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Zopim Api <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ayar_zopim" value="<?php echo $ayarcek['ayar_zopim'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

       
              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="apiayarkaydet" class="btn btn-success">Güncelle</button>
                </div>
              </div>

            </form>



          </div>
        </div>

              </main>
              </div>

<?php include 'footer.php'; ?>

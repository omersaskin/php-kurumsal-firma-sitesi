<?php 
include 'header.php';
include '../netting/baglan.php';
$ayarsor=$db->prepare("select * from ayar where ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

?>


<div class="container">
<?php

    include 'side_menu.php';
?>
    <main class="content">
<!-- page content -->
<div class="x_panel">
            <div class="x_title">
              <h2>Sosya Medya Ayarları <small>
                <?php 
                if ($_GET['durum']=='ok') {?> 
                
                <b style="color:green;">Güncelleme başarılı...</b>

                <?php } elseif ($_GET['durum']=='no')  {?>

                <b style="color:red;">Güncelleme yapılamadı...</b>

                <?php } ?></small> </h2>
                <ul class="nav navbar-right panel_toolbox">




                </ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">

                <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facebook<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" placeholder="Facebook adresinizi giriniz..." name="ayar_facebook" value="<?php echo $ayarcek['ayar_facebook']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Twitter<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" placeholder="Twitter adresinizi giriniz..." name="ayar_twitter" value="<?php echo $ayarcek['ayar_twitter']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Youtube<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" placeholder="Google adresinizi giriniz..." name="ayar_youtube" value="<?php echo $ayarcek['ayar_youtube']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Google<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" placeholder="Google adresinizi giriniz..." name="ayar_google" value="<?php echo $ayarcek['ayar_google']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                


                  

                  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="sosyalayarkaydet" class="btn btn-primary">Güncelle</button>
                  </div>

                </form>



              </div>
            </div>
                </main>
                </div>
  <!-- /page content -->



  <?php include 'footer.php'; ?>

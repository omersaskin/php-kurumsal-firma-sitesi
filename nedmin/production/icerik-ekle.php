<?php 
include 'header.php';
include '../netting/baglan.php';
?>
<head>  
  <script src="//cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>
<?php include 'side_menu.php'; ?>
    <main>
    <section>

    <div class="row" style="padding: 30px; background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2); height: auto;">
        <div class="col-100">
    <h2>İçerik İşlemleri</h2>

    <?php 
    if (isset($_GET['durum'])) {
      if ($_GET['durum'] == 'ok') { 
        echo '<b style="color:green;">Güncelleme başarılı...</b>';
      } elseif ($_GET['durum'] == 'no') { 
        echo '<b style="color:red;">Güncelleme yapılamadı...</b>';
      }
    } 
    ?>

    <form action="../netting/islem.php" method="POST" enctype="multipart/form-data">
      <label for="icerik_resimyol">Resim Seç <span class="required">*</span></label>
      <input type="file" id="icerik_resimyol" required name="icerik_resimyol">

      <label for="icerik_tarih">İçerik Zaman <span class="required">*</span></label>
      <input type="date" id="icerik_tarih" required value="<?php echo date('Y-m-d'); ?>" name="icerik_tarih">
      <input type="time" id="icerik_saat" required value="<?php echo date("H:i:s"); ?>" name="icerik_saat">

      <label for="icerik_ad">İçerik Ad <span class="required">*</span></label>
      <input type="text" id="icerik_ad" required name="icerik_ad" placeholder="İçerik adını giriniz...">

      <label for="icerik_detay">İçerik <span class="required">*</span></label>
      <textarea class="ckeditor" id="editor1" name="icerik_detay"></textarea>

      <script type="text/javascript">
        CKEDITOR.replace('editor1', {
          filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
          filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',
          filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
          filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
          forcePasteAsPlainText: true
        });
      </script>

      <label for="icerik_keyword">İçerik Keyword <span class="required">*</span></label>
      <input type="text" id="icerik_keyword" required name="icerik_keyword" placeholder="İçerik anahtar kelime giriniz...">

      <label for="icerik_durum">İçerik Durum <span class="required">*</span></label>
      <select id="icerik_durum" name="icerik_durum" required>
        <option value="1">Aktif</option>
        <option value="0">Pasif</option>
      </select>

      <button type="submit" name="icerikkaydet">Kaydet</button>
    </form>
    </div>

</div>
</section>
</main>


<?php include 'footer.php'; ?>

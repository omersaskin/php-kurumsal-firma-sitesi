<?php 

include 'header.php'; 

// Slider bilgilerini veritabanından çekiyoruz
$slidersor=$db->prepare("SELECT * FROM slider where slider_id=:id");
$slidersor->execute(array(
  'id' => $_GET['slider_id']
));
$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);

?>
<?php include 'side_menu.php'; ?>
    <main>
    <section>

    <div class="row" style="padding: 30px; background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2); height: auto;">
        <div class="col-100">
    <h2>Slider Düzenleme</h2>

    <form action="../netting/islem.php" method="POST" enctype="multipart/form-data">

      <img width="300" src="../../<?php echo $slidercek['slider_resimyol']; ?>">

      <label>Resim Seç:</label>
      <input type="file" name="slider_resimyol">

      <label>Slider Adı:</label>
      <input type="text" name="slider_ad" required value="<?php echo $slidercek['slider_ad']; ?>">

      <label>Slider Url:</label>
      <input type="text" name="slider_link" value="<?php echo $slidercek['slider_link']; ?>">

      <label>Slider Sıra:</label>
      <input type="text" name="slider_sira" required value="<?php echo $slidercek['slider_sira']; ?>">

      <label>Slider Durum:</label>
      <select name="slider_durum" required>
        <option value="1" <?php echo $slidercek['slider_durum'] == '1' ? 'selected' : ''; ?>>Aktif</option>
        <option value="0" <?php echo $slidercek['slider_durum'] == '0' ? 'selected' : ''; ?>>Pasif</option>
      </select>

      <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id']; ?>">
      <input type="hidden" name="slider_resimyol" value="<?php echo $slidercek['slider_resimyol']; ?>">

      <button type="submit" name="sliderduzenle">Güncelle</button>
    </form>
    </div>

</div>
</section>
</main>
<?php include 'footer.php'; ?>

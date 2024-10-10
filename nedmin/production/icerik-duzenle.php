<?php 
include 'header.php'; 
include 'db.php'; // Veritabanı bağlantısını dahil et

// Düzenlenecek içeriği getirme
if (isset($_GET['icerik_id'])) {
    $icerik_id = $_GET['icerik_id'];

    $stmt = $db->prepare("SELECT * FROM icerik WHERE icerik_id = :icerik_id");
    $stmt->execute(['icerik_id' => $icerik_id]);
    $icerik = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$icerik) {
        echo "İçerik bulunamadı.";
        exit;
    }
} else {
    echo "Geçersiz içerik ID'si.";
    exit;
}
?>

<?php include 'side_menu.php'; ?>
    <main>
    <section>

    <div class="row" style="padding: 30px; background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2); height: auto;">
        <div class="col-100">
        <h2>İçerik Düzenle</h2>
        <form action="../netting/islem.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="icerik_id" value="<?php echo $icerik['icerik_id']; ?>" />
            
            <label for="icerik_ad">İçerik Adı</label>
            <input type="text" name="icerik_ad" value="<?php echo htmlspecialchars($icerik['icerik_ad']); ?>" required>

            <label for="icerik_detay">İçerik Detay</label>
            <textarea id="editor1" name="description" required><?php echo strip_tags($icerik['icerik_detay']); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('editor1', {
                    filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
                    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                });
            </script>

            <label for="icerik_keyword">Anahtar Kelimeler</label>
            <input type="text" name="icerik_keyword" value="<?php echo htmlspecialchars($icerik['icerik_keyword']); ?>">

            <label for="icerik_resimyol">Resim Yolu</label>
            <input type="file" name="icerik_resimyol">
            <?php if ($icerik['icerik_resimyol']) : ?>
                <img src="../../<?php echo $icerik['icerik_resimyol']; ?>" alt="İçerik Resmi" style="width: 100px;">
            <?php endif; ?>

            <label for="icerik_durum">İçerik Durumu</label>
            <select name="icerik_durum">
                <option value="1" <?php echo $icerik['icerik_durum'] == 1 ? 'selected' : ''; ?>>Aktif</option>
                <option value="0" <?php echo $icerik['icerik_durum'] == 0 ? 'selected' : ''; ?>>Pasif</option>
            </select>

            <button type="submit" name="icerikduzenle">Güncelle</button>
        </form>
        </div>

</div>
</section>
</main>

<?php include 'footer.php'; ?>

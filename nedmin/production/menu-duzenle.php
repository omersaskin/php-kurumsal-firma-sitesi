<?php 
include 'header.php'; 

$menusor = $db->prepare("SELECT * FROM menu WHERE menu_id=:id");
$menusor->execute(['id' => $_GET['menu_id']]);
$menucek = $menusor->fetch(PDO::FETCH_ASSOC);
?>

<?php include 'side_menu.php'; ?>
    <main>
    <section>

    <div class="row" style="padding: 30px; background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2); height: auto;">
        <div class="col-100">
        <h2>Menü Düzenle</h2>

        <form action="../netting/islem.php" method="POST">

            <label for="menu_ad">Menü Adı <span class="required">*</span></label>
            <input type="text" name="menu_ad" value="<?php echo htmlspecialchars($menucek['menu_ad']); ?>" required>

            <label for="menu_detay">Menü Detay <span class="required">*</span></label>
            <textarea class="ckeditor" id="editor1" name="menu_detay"><?php echo htmlspecialchars($menucek['menu_detay']); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('editor1', {
                    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',
                    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    forcePasteAsPlainText: true
                });
            </script>

            <label for="menu_sira">Menü Sıra <span class="required">*</span></label>
            <input type="text" name="menu_sira" value="<?php echo htmlspecialchars($menucek['menu_sira']); ?>" required>

            <label for="menu_durum">Menü Durum <span class="required">*</span></label>
            <select name="menu_durum" required>
                <option value="1" <?php echo $menucek['menu_durum'] == '1' ? 'selected' : ''; ?>>Aktif</option>
                <option value="0" <?php echo $menucek['menu_durum'] == '0' ? 'selected' : ''; ?>>Pasif</option>
            </select>

            <input type="hidden" name="menu_id" value="<?php echo htmlspecialchars($menucek['menu_id']); ?>">

            <button type="submit" name="menuduzenle">Güncelle</button>
        </form>
        </div>

</div>
</section>
</main>

<!-- /page content -->

<?php include 'footer.php'; ?>

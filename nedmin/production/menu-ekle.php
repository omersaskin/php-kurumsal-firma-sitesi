<?php include 'header.php'; ?>

<?php include 'side_menu.php'; ?>
    <main>
    <section>

    <div class="row" style="padding: 30px; background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2); height: auto;">
        <div class="col-100">
        <h2>Menü Ekleme</h2>
        <form action="../netting/islem.php" method="POST">
            <label for="menu_ad">Menü Ad:</label>
            <input type="text" id="menu_ad" name="menu_ad" required placeholder="Menü adını giriniz">

            <label for="editor1">Menü Detay:</label>
            <textarea id="editor1" name="menu_detay"></textarea>

            <script type="text/javascript">
                CKEDITOR.replace('editor1', {
                    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    forcePasteAsPlainText: true
                });
            </script>

            <label for="menu_sira">Menü Sıra:</label>
            <input type="text" id="menu_sira" name="menu_sira" required placeholder="Menü sıra giriniz">

            <label for="menu_durum">Menü Durum:</label>
            <select id="menu_durum" name="menu_durum" required>
                <option value="1">Aktif</option>
                <option value="0">Pasif</option>
            </select>

            <button type="submit" name="menukaydet">Kaydet</button>
        </form>

        </div>

</div>
</section>
</main>

<?php include 'footer.php'; ?>

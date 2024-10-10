<?php include 'header.php'; ?>


<?php include 'side_menu.php'; ?>
    <main>
    <section>

    <div class="row" style="padding: 30px; background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2); height: auto;">
        <div class="col-100">
        <h2>Hizmet Ekle</h2>
        <form method="POST" action="../netting/islem.php">
            <label for="name">Hizmet Adı</label>
            <input type="text" id="name" name="name" required placeholder="Kategori adını giriniz">

            <label for="description">Hizmet Açıklama</label>
            <textarea class="ckeditor" id="editor1" name="description"></textarea>

            <label for="url">Kategori URL</label>
            <input type="text" id="url" name="url" required placeholder="Kategori URL'sini giriniz">
                
            <label for="parent_id">Üst Hizmet</label>
            <select name="parent_id">
                <option value="">Yok</option>
                <?php
                $stmt = $db->query("SELECT * FROM categories WHERE parent_id IS NULL");
                while ($parent = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=\"{$parent['id']}\">{$parent['name']}</option>";
                }
                ?>
            </select>
                
            <button type="submit" name="kategoriekle" style="margin-top: 20px;">Ekle</button>
        </form>

            </div>

            </div>
</section>
</main>


<?php include 'footer.php'; ?>

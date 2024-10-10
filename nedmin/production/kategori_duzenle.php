<?php include 'header.php'; ?>

<?php
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: kategori.php"); // ID yoksa kategori sayfasına yönlendir
    exit;
}

$stmt = $db->prepare("SELECT * FROM categories WHERE id = :id");
$stmt->execute(['id' => $id]);
$category = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['kategoriduzenle'])) {
    // Kategori güncelleme işlemi
    $name = $_POST['name'];
    $description = strip_tags(html_entity_decode($_POST['description']));
    $parent_id = $_POST['parent_id'];

    $updateStmt = $db->prepare("UPDATE categories SET name = :name, parent_id = :parent_id, description = :description WHERE id = :id");
    $updateStmt->execute(['name' => $name, 'parent_id' => $parent_id, 'description' => $description, 'id' => $id]);

    // Güncelleme başarılıysa kategori sayfasına yönlendir
    header("Location: kategori.php");
    exit;
}
?>

<?php include 'side_menu.php'; ?>
    <main>
    <section>

    <div class="row" style="padding: 30px; background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2); height: auto;">
        <div class="col-100">
        <h2>Kategori Düzenle</h2>
        <form method="POST">
            <label for="name">Hizmet Adı:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($category['name']); ?>" required>

            <label for="description">Hizmet Açıklama:</label>
            <textarea class="ckeditor" id="editor1" name="description" required><?php echo htmlspecialchars($category['description']); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('editor1', {
                    filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
                    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    forcePasteAsPlainText: true
                });
            </script>

            <label for="parent_id">Üst Hizmet:</label>
            <select name="parent_id">
                <option value="">Yok</option>
                <?php
                $stmt = $db->query("SELECT * FROM categories WHERE parent_id IS NULL");
                while ($parent = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $selected = $parent['id'] == $category['parent_id'] ? 'selected' : '';
                    echo "<option value=\"{$parent['id']}\" $selected>{$parent['name']}</option>";
                }
                ?>
            </select>

            <button type="submit" name="kategoriduzenle">Güncelle</button>
        </form>
        </div>

</div>
</section>
</main>


<?php include 'footer.php'; ?>

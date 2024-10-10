<?php 
include 'header.php'; 

try {
    // Kategorileri sorgula
    $stmt = $db->query("SELECT * FROM categories");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>

<?php include 'side_menu.php'; ?>

<main>
    <section>
        <div class="row" style="padding: 30px; background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2); height: auto;">
            <div class="col-100">
                <h2 style="color: #333;">Hizmet Yönetimi</h2>
                <hr style="height: 3px; background-color: #333; border-radius: 3px;" />
                <br />
                <a href="kategori_ekle.php" style="background-color: #333; color: #fff; padding: 10px; text-decoration: none; border-radius: 4px;">Hizmet Ekle</a>

                <div class="table-responsive"> <!-- Yatay kaydırma için div eklendi -->
                    <br />
                    <table style="border-radius: 4px;">
                        <thead>
                            <tr>
                                <th>Hizmet Ad</th>
                                <th>Hizmet Açıklama</th>
                                <th>Hizmet URL</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($category['name']); ?></td>
                                    <td style="width: 600px !important;"><?php echo htmlspecialchars($category['description']); ?></td>
                                    <td><?php echo htmlspecialchars($category['url']); ?></td>
                                    <td>
                                        <a href="kategori_duzenle.php?id=<?php echo $category['id']; ?>" style="background-color: #333; color: #fff; padding: 10px; text-decoration: none; border-radius: 4px;">Düzenle</a>
                                    </td>
                                    <td>
                                        <a href="../netting/islem.php?id=<?php echo $category['id']; ?>&kategorisil=ok" style="background-color: #333; color: #fff; padding: 10px; text-decoration: none; border-radius: 4px;">Sil</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div> <!-- div sonu -->
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>

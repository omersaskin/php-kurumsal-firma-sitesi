<?php 

include 'header.php'; 

// Belirli veriyi seçme işlemi
$menusor = $db->prepare("SELECT * FROM menu ORDER BY menu_sira ASC");
$menusor->execute();

?>


    <?php include 'side_menu.php'; ?>
    
    <main>
    <section>
        <div class="row" style="padding: 30px; background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);  height: auto;">
            <div class="col-100">
                <h2 style="color: #333;">Menü Yönetimi</h2>
                <hr style="height: 3px; background-color: #333; border-radius: 3px;" />
                <br />
                <a href="menu-ekle.php" style=" background-color: #333; color: #fff; padding: 10px; text-decoration: none; border-radius: 4px;">Menu Ekle</a>
                
                <div class="table-responsive"> <!-- Yatay kaydırma için div eklendi -->

                <br />
                    <table style="border-radius: 4px;">
                        <thead>
                            <tr>
                                <th>Sıra</th>
                                <th>İsim</th>
                                <th>Sıra</th>
                                <th>Durum</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $say = 0;
                            while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) {
                                $say++;
                            ?>
                                <tr>
                                    <td><?php echo $say; ?></td>
                                    <td><?php echo htmlspecialchars($menucek['menu_ad']); ?></td>
                                    <td><?php echo $menucek['menu_sira']; ?></td>
                                    <td>
                                        <?php 
                                        if ($menucek['menu_durum'] == 1) {
                                            echo '<span>Aktif</span>';
                                        } else {
                                            echo '<span>Pasif</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a style=" background-color: #333; color: #fff; padding: 10px; text-decoration: none; border-radius: 4px;" href="menu-duzenle.php?menu_id=<?php echo $menucek['menu_id']; ?>">Düzenle</a>
                                    </td>
                                    <td>
                                        <a style=" background-color: #333; color: #fff; padding: 10px; text-decoration: none; border-radius: 4px;" href="../netting/islem.php?menu_id=<?php echo $menucek['menu_id']; ?>&menusil=ok">Sil</a>
                                    </td>
                                </tr>
                            <?php  
                            } 
                            ?>
                        </tbody>
                    </table>
                </div> <!-- div sonu -->
            </div>
        </div>
    </section>
</main>



<!-- /sayfa içeriği -->

<?php include 'footer.php'; ?>

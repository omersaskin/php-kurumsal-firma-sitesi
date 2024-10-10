<?php 
include 'header.php'; 
?>
<?php include 'side_menu.php'; ?>
    <main>
    <section>

    <div class="row" style="padding: 30px; background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2); height: auto;">
        <div class="col-100">
        <h2>Slider Ekleme</h2>

        <form action="../netting/islem.php" method="POST" enctype="multipart/form-data">
            <label for="slider_resimyol">Resim Seç <span class="required">*</span></label>
            <input type="file" id="slider_resimyol" name="slider_resimyol" required>

            <label for="slider_ad">Slider Ad <span class="required">*</span></label>
            <input type="text" id="slider_ad" name="slider_ad" required placeholder="Slider adını giriniz">

            <label for="slider_link">Slider Url <span class="required">*</span></label>
            <input type="text" id="slider_link" name="slider_link" placeholder="Slider Link giriniz">

            <label for="slider_sira">Slider Sıra <span class="required">*</span></label>
            <input type="text" id="slider_sira" name="slider_sira" required placeholder="Slider sıra giriniz">

            <label for="slider_durum">Slider Durum <span class="required">*</span></label>
            <select id="slider_durum" name="slider_durum" required>
                <option value="1">Aktif</option>
                <option value="0">Pasif</option>
            </select>

            <button type="submit" name="sliderkaydet">Kaydet</button>
        </form>

        </div>

</div>
</section>
</main>

<?php include 'footer.php'; ?>

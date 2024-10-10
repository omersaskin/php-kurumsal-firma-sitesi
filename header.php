<?php
	ob_start();
	session_start();
	include 'nedmin/netting/baglan.php';
	include 'nedmin/production/fonksiyon.php';
	//Belirli veriyi seçme işlemi
	$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
	$ayarsor->execute(array(
		'id' => 0
		));
	$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
?>

<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "firma"; // Veritabanı adınız

$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Kategorileri çekme fonksiyonu
function getCategories($parent_id = NULL, $conn) {
    $sql = "SELECT id, name FROM categories WHERE parent_id " . ($parent_id ? "= $parent_id" : "IS NULL");
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo '<ul>';
        while ($row = $result->fetch_assoc()) {
            echo '<li>';
            echo '<a href="#">' . $row['name'] . '</a>';
            // Alt kategorileri çek
            getCategories($row['id'], $conn);
            echo '</li>';
        }
        echo '</ul>';
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kurumsal Web Sitesi</title>
  <!-- Css --> 
  <link rel="stylesheet" type="text/css" href="css/general.css"> 
  <link rel="stylesheet" type="text/css" href="css/menu.css"> 
  <link rel="stylesheet" type="text/css" href="css/slider.css"> 
  <link rel="stylesheet" type="text/css" href="css/blog.css"> 
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"> </script>
  <![endif]--> 
</head>
<body>
<?php
// Veritabanı bağlantısı
$host = 'localhost';
$dbname = 'firma';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Kategoriler ve alt kategorileri çekiyoruz (ana kategoriler parent_id'si NULL olanlar)
    $stmt = $pdo->prepare("SELECT * FROM categories WHERE parent_id IS NULL");
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Bağlantı hatası: ' . $e->getMessage();
}
?>

<nav>
  <div id="logo"><a href="index.php" class="logoLink"><img style="height: 40px !important; margin-top: 10px;" src="<?php echo $ayarcek['ayar_logo'] ?>"></a></div> <!-- Metinsel logo -->
  <label for="drop" class="toggle">&#8801; Menu</label>
  <input type="checkbox" id="drop" />
  <ul class="menu">
    <li><a href="index.php">Anasayfa</a></li>
    <li>
      <label for="drop-2" class="toggle">Hizmetler ></label>
      <a href="#">Hizmetler</a>
      <input type="checkbox" id="drop-2"/>
      <ul>
        <?php foreach ($categories as $category): ?>
        <li>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM categories WHERE parent_id = ?");
            $stmt->execute([$category['id']]);
            $subcategories = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php if (!empty($subcategories)): ?>
            <label for="drop-<?php echo $category['id']; ?>" class="toggle">
                <?php echo htmlspecialchars($category['name']); ?>
                
                    >
                
            </label>
            <?php endif; ?>
            <a href="<?php echo !empty($subcategories) ? '#' : 'hizmet-' . seo($category['name']); ?>"><?php echo htmlspecialchars($category['name']); ?></a>
            <?php if (!empty($subcategories)): ?>
                <input type="checkbox" id="drop-<?php echo $category['id']; ?>"/>
                <ul>
                    <?php foreach ($subcategories as $subcategory): ?>
                        <li>
                            <a href="hizmet-<?php echo seo($subcategory['name']); ?>"><?php echo htmlspecialchars($subcategory['name']); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </li>
        <?php endforeach; ?>
      </ul>
    </li>
    <?php 
    $menusor=$db->prepare("SELECT * FROM menu where menu_durum=:durum order by menu_sira ASC limit 5");
    $menusor->execute(array('durum' => 1));
    while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <li><a href="sayfa-<?php echo seo($menucek['menu_ad']); ?>"><?php echo $menucek['menu_ad'] ?></a></li>
    <?php } ?>
    <li><a href="hakkinda">Hakkımızda</a></li>
    <li><a href="blog">Blog</a></li>
    <li><a href="iletisim">İletişim</a></li>
  </ul>
</nav>

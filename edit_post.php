<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi Blog">
<meta name="author" content="Judul Blog">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Deskripsi Blog">
<meta name="twitter:creator" content="Simple Blog">
<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple Blog">
<meta property="og:description" content="Deskripsi Blog">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple Blog">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blog | Edit Post</title>


</head>

<?php
    include ('connectDB.php');
    include('session.php');
    include ('preventSQLInject.php');

    $isLogin = checkToGenerateSession();

    // Cek sudah login atau belum
    if ($isLogin) {
        // Cek apakah id tersedia atau tidak
        if (isset($_GET['id'])) {
            $user_id = $_SESSION["user_id"];
            $id_post = $_GET['id'];
            // Cek apakah username bersangkutan emg yg ngebuat post tsb atau ga
            $query = "SELECT b.id, b.judul, b.tanggal, b.konten, b.gambar FROM user a, post b WHERE a.id=b.userid AND b.id=$id_post";
            $query = preventSQLInject($query);
            $res = mysql_query($query);

            // $query = mysql_query("SELECT * FROM post WHERE id = '$id_post'");
            // $query = preventSQLInject($query);

            if ($res) {
                $rows = mysql_num_rows($res);
                // Jika hasil record SELECT == 1, maka betul itu adalah postnya user tsb
                if ($rows == 1) {
                    $row = mysql_fetch_assoc($res);
                    $id_post = $row['id'];
                    $judul = $row['judul'];
                    $tanggal = $row['tanggal'];
                    $konten = $row['konten'];
                    $gambar = $row['gambar'];

                    // To protect from SQL injection
                    $id_post = preventSQLInject($id_post);
                    $judul = preventSQLInject($judul);
                    $tanggal = preventSQLInject($tanggal);
                    $konten = preventSQLInject($konten);
                    $gambar = preventSQLInject($gambar);
                    // To protect from XSS
                    $id_post = htmlspecialchars($id_post, ENT_QUOTES, 'UTF-8');
                    $judul = htmlspecialchars($judul, ENT_QUOTES, 'UTF-8');
                    $tanggal = htmlspecialchars($tanggal, ENT_QUOTES, 'UTF-8');
                    $konten = htmlspecialchars($konten, ENT_QUOTES, 'UTF-8');
                    $gambar = htmlspecialchars($gambar, ENT_QUOTES, 'UTF-8');

                    mysql_close();
                    $isTruePost = TRUE;
                }
                else {
                    header("location: error_page.php");
                    $isTruePost = FALSE;
                }
            }
            else {
                header("location: error_page.php");
                $isTruePost = FALSE;
            }
        }
        else {
            header("location: error_page.php");
            $isTruePost = FALSE;
        }
    }
    else {
        header("location: login_page.php");
        $isTruePost = FALSE;
    }
?>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <?php if($isLogin) {?>
        <li><a href="new_post.php">+ Tambah Post</a></li>
        <!-- <li><a href="aboutMe.php">About Me</a></li> -->
        <li>Welcome <?php echo $_SESSION["username"]; ?></li>
        <li><a href="logout.php">Logout</a></li>
        <?php }
        else {?>
        <li><a href="login_page.php">Login</a></li>
        <li><a href="register_page.php">Register</a></li>
        <?php } ?>
    </ul>
</nav>

<article class="art simple post">
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Edit Post</h2>

            <?php if($isTruePost) {?>
            <div id="contact-area">
                <form method="POST" action="saveeditpost.php?id=<?php echo $id_post ?>" enctype="multipart/form-data" onsubmit="return ValidateForm(this)">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" value="<?php echo $judul ?>">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal" value="<?php echo $tanggal ?>">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten"> <?php echo $konten ?> </textarea>

                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $gambar ?>">

                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
            </div>
            <?php } ?>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
s    <aside class="offsite-links">
        Institut Teknologi Bandung<br>
        Teknik Informatika<br>
        <a href="https://www.facebook.com/andarias.silvanus">Andarias Silvanus</a> 
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript" src="assets/js/confirm.js"></script>
<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
</script>
<?php
    mysql_close();
?>
</body>
</html>
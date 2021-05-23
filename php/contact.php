<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim sayfası</title>
    <link rel="icon" type="image/png" href="../image/PageIcon.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="../style2.css">
</head>

<body>

<header>
    <div id="mysidenav" class="sidenav">
        <label><a href="#" class="closebtn" onclick="closeNav()">&times;</a
        <div class="astyle">
            <a href="../index.html">Ana Sayfa</a>
            <ul>
                <li>
                    <a href="#">Konular</a>
                    <ul>
                        <li>
                            <a href="../image/ANAS.pdf">CV</a>
                        </li>
                        <li>
                            <a href="../html/sehrim.html">Şehrim</a>
                        </li>
                        <li>
                            <a href="../html/mirasimiz.html">Mirasımız</a>
                        </li>
                        <li>
                            <a href="../html/API.html">API</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <a href="../html/Ben_Kim.html">Ben Kim??</a>
            <a href="contact.php">İletisim</a>
        </div>
    </div>
    <div id="main">
        <span onclick="openNav()">
        &#9776;
        </span>
    </div>
    <h2>ANAS OSTA</h2>
    <div class="login">
        <a href="login.php" class="btn">Oturum aç</a>
        <a href="register.php" class="btn btn-primary">Kayıt Ol</a>
    </div>
</header>

    <div class="myform">
        <form method="POST" style="width:100%">
            <p>
                <label>* E-Posta</label>
                <input type="text" placeholder="E-Posta" name="email" required>
            </p>
            <p>
                <label>Ana Başlık</label>
                <input type="text" placeholder="Ana Başlık" name="title">
            </p>
            <p>
                <label>* Konu</label>
                <textarea name="content" placeholder="Çıkan sorunu anlatınız" required></textarea>
            </p>
            <button type="submit" name="submit" onclick="alert('Sorunu bildirdiniz için teşekkür ederiz')">Gönder</button>
            <button type="reset">Boşaltma</button>
        </form>
    </div>
<center>
<?php

          //Database bağlatntı
          $username = "unaux_28690942";
          $password = "3qljiv89";
          $db = new PDO("mysql:host=sql112.unaux.com; dbname=unaux_28690942_ANAS_OSTA;",$username,$password);

          if(isset($_POST['submit'])){
                      $email = $_POST['email'];
                      $title = $_POST['title'];
                      $content = $_POST['content'];
          
                      $addUser = $db->prepare("INSERT INTO contact(email,title,content) 
                        VALUES(:email,:title,:content)");
                      $addUser->bindParam("email",$email);
                      $addUser->bindParam("title",$title);
                      $addUser->bindParam("content",$content);
                      $addUser->execute();
                      if($addUser->execute()){
                        echo 'Sorunu bildirdiniz için teşekkür ederiz';
                      }else{
                        echo 'Hata oluştu';
                      }
                    }
?></center>

<footer>
     <center>
         <label id="telefon">Telefon : <a href="tel:05525210973">055225210973</a></label>
         <label id="email">Email : <a href="mailto:anas.osta@ogr.sakarya.edu.tr">ANAS OSTA</a></label>
     </center>
 </footer>

    <script src="../java.js"></script>
</body>

</html>
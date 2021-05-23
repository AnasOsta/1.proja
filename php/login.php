<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Giriş Sayafası</title>
   <link rel="icon" type="image/png" href="../image/PageIcon.png">
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="../style2.css">
</head>
<body>

<header>
<div id="mysidenav" class="sidenav">
     <label><a href="#" class="closebtn" onclick="closeNav()">&times;</a
     <div class="astyle">
         <a href="index.html">Ana Sayfa</a>
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

<div class="header" style="width:70%">
    <h2>Login</h2>
</div>

<form method="POST" style="width:70%">
	<div class="input-group">
		<label>E-Posta</label>
		<input type="email" name="email" required/>
	</div>
	<div class="input-group">
		<label>Parola</label>
		<input type="password" name="pssword" required/>
	</div>
	<button type="submit" class="btn"  name="login">Giriş Yap</button>
	<a href="register.php">Kayıt Ol</a>
</form>

<center>
    <?php
        if(isset($_POST['login'])){
            
             //Database bağlatntı
          $username = "unaux_28690942";
          $password = "3qljiv89";
          $db = new PDO("mysql:host=sql112.unaux.com; dbname=unaux_28690942_ANAS_OSTA;",$username,$password);

            $login = $db->prepare("SELECT * FROM users WHERE email = :email AND pssword = :pssword");
            $login->bindParam("email",$_POST['email']);
            $login->bindParam("pssword",$_POST['pssword']);
            $login->execute();
            
            if($login->rowCount()===1){
            	$user = $login->fetchObject();
            	echo 'Hoşgeldiniz ' .$user->username;
                    $_SESSION['email'] = $user->email;
                    $_SESSION['pssword'] = $user->pssword;
                    $_SESSION['name'] = $user->name;
            }else{
            	echo 'E-Posta yada Parola yanlıştır';
            }
        }
        
    ?>
</center>

<footer>
     <center>
         <label id="telefon">Telefon : <a href="tel:05525210973">055225210973</a></label>
         <label id="email">Email : <a href="mailto:anas.osta@ogr.sakarya.edu.tr">ANAS OSTA</a></label>
     </center>
 </footer>

<script src="../java.js"></script>

</body>
</html>
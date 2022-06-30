<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>


      <?php
      
      if (isset($_GET['durum']) && $_GET['durum']=="basarisiz") {?>


                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Giriş başarısız</strong> Kullanıcı adı veya şifrenizi kontrol ediniz.
                  </div>
      


      <?php }?>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="../netting/islem.php" method="POST">
              <h1>BİLGİ SİSTEMİ YÖNETİCİ GİRİŞİ</h1>
              <div>
                <input type="text" class="form-control" placeholder="Ad" required="" name="Ad" />
              </div>  
              <div>
                <input type="password" class="form-control" placeholder="Tc" required="" name="Tc" />
              </div>
              <div>
                <button type="submit" class="btn btn-success" name="admingir">Giriş</button>
              </div>

              </div>
            </form>
          </section>
        </div>

       
      </div>
    </div>
  </body>
</html>

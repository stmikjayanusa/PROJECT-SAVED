<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login : <?= title() ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= theme() ?>bower_components/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= theme() ?>login_assets/stylesheet.css">
    <link rel="stylesheet" href="<?= theme() ?>login_assets/responsive.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga&family=Poppins:ital,wght@0,300;0,900;1,900&display=swap" rel="stylesheet"> 
    <!-- animate -->
    <link rel="stylesheet" type="text/css" href="<?= theme() ?>login_assets/wowo_animated/animate.css">
    <script src="<?= theme() ?>login_assets/wowo_animated/wow.min.js"></script>
    <script>new WOW().init();</script>
    <!-- end animate -->
    <!-- AJAX -->
        <!-- jQuery 3 -->
    <script src="<?= theme() ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= theme() ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- MANUAL AJAX -->
    <script type="text/javascript">
        let Usernamecek= "<?= site_url('Usernamecek') ?>";       
        let Passwordcek= "<?= site_url('Passwordcek')  ?>";    
        let Login      = "<?= site_url('Validate')  ?>";   
        let Home      = "<?= site_url('Home')  ?>";   
    </script>
    <script src="<?= theme() ?>login_assets/loginAjaX.js"></script>


</head>
<body>
<div class="rowbox cellbox-Wrap-4"></div>
<div class="rowbox slideInRight wow">
    <div class="cellbox-4"></div>
        <div class="cellbox-3 radius sideframe with_image">
            <div class="corner">
            <i style="float: right;" class="right fa fa-circle "></i>
            <i class="left fa fa-circle "></i>
                
            </div>
            <div class="headbox">
                <i class="fa  fa-sign-in"></i> LOGIN DOOR
            </div>
            <div class="body">
                <div class="form-G">
                    <label autofocus>Username  </label>
                    <input type="text" name="username" class="username" placeholder="Insert Username" >
                    <span class="in-con fa fa-user"    >  </span>
                    <span class="error username text-red"></span>
                </div>
                <div class="form-G">
                    <label>Password</label>
                    <input type="password" name="password" class="password" placeholder="">
                    <span class="in-con fa  fa-key"    >  </span>
                    <span class="error password text-red"></span>



                </div>
                <div class="btn-wrapper">
                    <a href="#" class="btn btnLogin"><i class="fa fa-unlock-alt"></i> Sign-In</a>
                </div>
            </div>
             <div class="corner">
                <i style="float: right;" class="right fa fa-circle "></i>
                <i class="left fa fa-circle "></i>  
            </div>
    </div>
    <div class="cellbox-2"></div>
    <!-- <div class="cellbox-1"></div> -->


    <!-- <div class="cellbox">Kotak 2</div> -->
</div>
</body>
</html>
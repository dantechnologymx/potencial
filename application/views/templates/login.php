<!DOCTYPE html>
<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ambientis</title>
  <style>
    @font-face{
  font-family:helvetica_neue;
  src: url(http://josh-ruther4d.com/Fonts/HelveticaNeueLite.otf);
}
body{
  background:#e3e3e3;
  font-family:helvetica_neue;
  color:#a0a0a0;
  font-size:14px;
  text-shadow:1px 1px rgba(255,255,255,0.8);
}
a{
  text-decoration:none;
  color:#757373;
}
a:hover{
  color:#538bc5;
}
.avi{
  background:url(http://josh-ruther4d.com/wp-content/uploads/2013/04/login.png);
  background-repeat:no-repeat;
  width: 62px;
  height: 62px;
  margin-left:auto;
  margin-right:auto;
  margin-bottom:22px;
}
.avi:hover{
  -webkit-filter: brightness(102%);
  position:relative;
  bottom:2px;
}
.form{
  width:320px;
  height:fit-content;
  background:#fdfdfd;
padding:25px;
margin-left:auto;
margin-right:auto;
  margin-top:50px;
border:1px solid #cecece;
-webkit-box-shadow: 0px 0px 13px rgba(50, 50, 50, .2);
-moz-box-shadow:    0px 0px 13px rgba(50, 50, 50, .2);
box-shadow:         0px 0px 13px rgba(50, 50, 50, .2);
}
form{
  width:175px;
  margin-left:auto;
  margin-right:auto;
}
.recovery{
  width:80%;
  margin-left:auto;
  margin-right:auto;
  text-align:center;
}
input[type=text], input[type=password]{
  width:175px;
  height:27px;
  margin-top:13px;
  padding-left:8px;
  color:#bcbcbc;
  background: #efefef; /* Old browsers */
background: -moz-linear-gradient(top,  #efefef 16%, #f2f2f2 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(16%,#efefef), color-stop(100%,#f2f2f2)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #efefef 16%,#f2f2f2 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #efefef 16%,#f2f2f2 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #efefef 16%,#f2f2f2 100%); /* IE10+ */
background: linear-gradient(to bottom,  #efefef 16%,#f2f2f2 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#efefef', endColorstr='#f2f2f2',GradientType=0 ); /* IE6-9 */
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
border-top:1px solid #c5c5c5;
border-bottom:2px solid rgba(255,255,255,.6);
border-left:none;
border-right:none;
}
input[type=text]:focus, input[type=password]:focus{
  outline:none;
}
input[type=submit]{
  color: #838383;
  text-shadow:1px 1px rgba(255,255,255,0.7);
  font-size:12px;
  height: 31px;
  width:68px;
  text-align:center;
  display:block;
  margin-left:auto;
  margin-right:auto;
  margin-top:22px;
  text-shadow: 0 1px white;
  background-color: rgba(0, 0, 0, 0.05);
  border: 1px solid;
  -webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
  border-color: #cfcfcf #d6d6d6 #c8c8c8;
  background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.25));
  background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.25));
  background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.25));
  background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.25));
  -webkit-box-shadow: inset 0 1px white, inset 0 0 0 1px rgba(255, 255, 255, 0.7), 0 2px #dadada, 0 3px #c4c4c4, 0 4px 3px rgba(0, 0, 0, 0.1);
  box-shadow: inset 0 1px white, inset 0 0 0 1px rgba(255, 255, 255, 0.7), 0 2px #dadada, 0 3px #c4c4c4, 0 4px 3px rgba(0, 0, 0, 0.1);
}
input[type=submit]:active{
  z-index: 2;
  margin-top: 26px;
  margin-left:auto;
  margin-right:auto;
  color: #404040:
  background: transparent;
  border-color: #ccc;
  border-width: 1px 0;
  background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.04), rgba(0, 0, 0, 0));
  background-image: -moz-linear-gradient(top, rgba(0, 0, 0, 0.04), rgba(0, 0, 0, 0));
  background-image: -o-linear-gradient(top, rgba(0, 0, 0, 0.04), rgba(0, 0, 0, 0));
  background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.04), rgba(0, 0, 0, 0));
  -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.35), inset 0 -1px 1px rgba(0, 0, 0, 0.05), 1px 0 rgba(0, 0, 0, 0.05), -1px 0 rgba(0, 0, 0, 0.05), 0 1px rgba(255, 255, 255, 0.4);
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.35), inset 0 -1px 1px rgba(0, 0, 0, 0.05), 1px 0 rgba(0, 0, 0, 0.05), -1px 0 rgba(0, 0, 0, 0.05), 0 1px rgba(255, 255, 255, 0.4);
}
input[type=submit]:hover{
  color:#538bc5;
}
.recovery{
  margin-top:30px;
}
.form:before, .form:after{
  content: " ";
  z-index:-1;
  height: 320px;
  background: #fafafa;
  position: absolute;
  width: 330px;
  margin-top:50px;
  padding:25px;
}
.form:before{
  box-shadow: 0 0 3px rgba(0,0,0,0.2);
  margin-left:50%;
  top:5px;
  left:-145px;
  transform: rotate(98deg);
  -webkit-transform:rotate(88deg);
}
.form:after{
  box-shadow: 0 0 3px rgba(0,0,0,0.2);
  margin-right:50%;
  top:5px;
  right:-145px;
  transform: rotate(95deg);
  -webkit-transform:rotate(95deg);;
}

    
  </style>

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.min.css">
  <link href="<?php echo base_url() ?>assets/css/css2" rel="stylesheet">

</head>
<body>
          <div class="form">
              <div class="avi">
                <div class="login-logo">
                  <img class="logo" src="<?php echo base_url(); ?>assets/img/logo-airwatch.png" alt="">
                </div>
              </div>
            <form action="<?php echo site_url('c_login/login');?>" method="post">
              <label for="usuario" class="bold">Usuario</label>
              <input name="usuario" type="text" required/>
              <label for="contraseña" class="bold">Contraseña</label>
              <input name="password" type="password" required/>
              <input type="submit" value="Login" action="submit"/>
            </form>
          </div><!--form-->
          <div class="recovery">¿Olvidaste tu contraseña? <a href="#">Click Aqui</a></div>


<div class="form-group text-center">
                <label style="color:red"><?php if(isSet($texto)){echo $texto;} ?></label>
              </div>

</body>
</html>
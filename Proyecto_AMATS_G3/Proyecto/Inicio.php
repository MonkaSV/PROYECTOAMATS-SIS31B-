<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<div class="container">
  <p class="text">Sistema de Encuestas</p>
</div>
<style type="text/css">
	.text {
  color: #FFF;
  margin: 0 auto;
  text-align: center;
  font-weight: 400;
  font: italic bold 70px Georgia, Serif;
  text-shadow: -4px 3px 0 #BF1A1A, -14px 7px 0 #0a0e27;
}
</style>

<a href="loguinadmin.php" class="photo">
  <h1>Administrador</h1>
    <img src="img/admin.png" />
  <div class="glow-wrap">
    <i class="glow"></i>
  </div>
</a>
<a href="loguinvista.php" class="photo2">
  <h1>Usuario</h1>
    <img src="img/user.png" />
  <div class="glow-wrap">
    <i class="glow"></i>
  </div>
</a>

<a href="http://tiagoalexandrelopes.com/" target="_blank" id="author">Copyright © Derechos Reservador 2019</a>
<style type="text/css">
	body{
  background: rgba(218,218,218,1)
}

a{
  color: #111
}

.photo{
  position: absolute;
  top: 50%;
  left: 40%;
  transform: translate(-50%, -50%);
  display: block;
}

.photo img{
  width: 200px;
  height: 280px;
  object-fit: cover;
  filter: grayscale(100%) contrast(120%);
  box-shadow: 10px 15px 25px 0 rgba(0,0,0,.2);
  display: block;
  transition: all .5s cubic-bezier(0.645, 0.045, 0.355, 1);
  margin-top: -10px;
}

.photo:hover img{
  box-shadow: 1px 1px 10px 0 rgba(0,0,0,.1);
}

.photo .glow-wrap{
  overflow: hidden;
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  margin-top: -10px;
}

.photo .glow{
  display: block;
  position:absolute;
  width: 40%;
  height: 200%;
  background: rgba(255,255,255,.2);
  top: 0;
  filter: blur(5px);
  transform: rotate(45deg) translate(-450%, 0);
  transition: all .5s cubic-bezier(0.645, 0.045, 0.355, 1);
}

.photo:hover .glow{
  transform: rotate(45deg) translate(450%, 0);
  transition: all 1s cubic-bezier(0.645, 0.045, 0.355, 1);
}

.photo:hover img,
.photo:hover .glow-wrap{
  margin-top: 0;
}

h1{
  position: absolute;
  z-index: 1;
  transform: translate(-25%, -95%);
  font-family: 'Montserrat', sans-serif;
  margin: 0;
  line-height: 1.2;
}


/* Ends */

#author{
  font-family: Helvetica, Arial;
  text-transform: uppercase;
  font-size: 14px;
  text-decoration: none;
  position: fixed;
  bottom: 25px;
  left: 50%;
  transform: translateX(-50%);
  color: #888;
}

#author:hover{
  color: #111;
}



.photo2{
  position: absolute;
  top: 50%;
  left: 60%;
  transform: translate(-50%, -50%);
  display: block;
}

.photo2 img{
  width: 200px;
  height: 280px;
  object-fit: cover;
  filter: grayscale(100%) contrast(120%);
  box-shadow: 10px 15px 25px 0 rgba(0,0,0,.2);
  display: block;
  transition: all .5s cubic-bezier(0.645, 0.045, 0.355, 1);
  margin-top: -10px;
}

.photo2:hover img{
  box-shadow: 1px 1px 10px 0 rgba(0,0,0,.1);
}

.photo2 .glow-wrap{
  overflow: hidden;
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  margin-top: -10px;
}

.photo2 .glow{
  display: block;
  position:absolute;
  width: 40%;
  height: 200%;
  background: rgba(255,255,255,.2);
  top: 0;
  filter: blur(5px);
  transform: rotate(45deg) translate(-450%, 0);
  transition: all .5s cubic-bezier(0.645, 0.045, 0.355, 1);
}

.photo2:hover .glow{
  transform: rotate(45deg) translate(450%, 0);
  transition: all 1s cubic-bezier(0.645, 0.045, 0.355, 1);
}

.photo2:hover img,
.photo2:hover .glow-wrap{
  margin-top: 0;
}
</style>
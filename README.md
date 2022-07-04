<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Fullscreen Overlay Navigation | CodingNepal</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	   
	   <style>
		   @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
  max-height: 100vh;
  cursor: url(black-cat.gif), auto;
}
		   	   
.wrapper{
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: black;
  clip-path: circle(25px at calc(100% - 45px) 45px);
  transition: all 0.3s ease-in-out;
  cursor: url(black-cat.gif), auto;
}
#active:checked ~ .wrapper{
  clip-path: circle(75%);
}
.menu-btn{
  position: absolute;
  z-index: 2;
  right: 20px;
  /* left: 20px; */
  top: 20px;
  height: 50px;
  width: 50px;
  text-align: center;
  line-height: 50px;
  border-radius: 50%;
  font-size: 20px;
  color: black;
  cursor: pointer;
  background: white;
  transition: all 0.3s ease-in-out;
}
#active:checked ~ .menu-btn{
  background: black;
  color: white;
  border:1px solid white;
}
#active:checked ~ .menu-btn i:before{
  content: "\f00d";
}
.wrapper ul{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  list-style: none;
  text-align: center;
}
.wrapper ul li{
  margin: 15px 0;
}
.wrapper ul li a{
  color: none;
  text-decoration: none;
  font-size: 30px;
  font-weight: 500;
  padding: 5px 30px;
  color: #fff;
  position: relative;
  line-height: 50px;
  transition: all 0.3s ease;
}
.wrapper ul li a:after{
  position: absolute;
  content: "";
  background: #fff;
  width: 100%;
  height: 50px;
  left: 0;
  border-radius: 50px;
  transform: scaleY(0);
  z-index: -1;
  transition: transform 0.3s ease;
}
.wrapper ul li a:hover:after{
  transform: scaleY(1);
}
.wrapper ul li a:hover{
  color: black;
}
input[type="checkbox"]{
  display: none;
}

</style>
   </head>
   <body>
      <input type="checkbox" id="active">
      <label for="active" class="menu-btn"><i class="fas fa-bars"></i></label>
      <div class="wrapper">
         <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Gallery</a></li>
         </ul>
	 <img src="black-cat.gif" style="position:absolute;background:black;width:185px;right:77px;bottom:92px;">
      </div>
      <div class="content">
         <div class="title">
		<img src="2w2otnhwuck11.gif" style="z-index:-1; width: 300px;position:absolute;right:0; bottom:0;">
         </div>
      </div>
   </body>
</html>

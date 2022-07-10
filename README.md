<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Fullscreen Overlay Navigation | CodingNepal</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	   <style>
		   @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
		   @import url("https://fonts.googleapis.com/css?family=Rubik:700&display=swap");
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
  z-index:1;
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
  z-index: 0;
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
		   
button {
  position: relative;
  display: inline-block;
  cursor: pointer;
  outline: none;
  border: 0;
  vertical-align: middle;
  text-decoration: none;
  font-size: inherit;
  font-family: inherit;
}

button.muacks {
  padding: 1.25em 2em;
  border: 2px solid #b18597;
  border-radius: 0.75em;
  font-weight: 700;
  color: #382b22;
  text-transform: uppercase;
  background: #fff0f0;
  transform-style: preserve-3d;
  transition: .15s cubic-bezier(0, 0, .6, 1);
  z-index:0;
}

button.muacks::before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: inherit;
  background: #f9c4d2;
  box-shadow: 0 0 0 2px #b18597, 0 .625em 0 0 #ffe3e2;
  transform: translate3d(0, .75em, -1em);
  transition: .15s cubic-bezier(0, 0, .6, 1);
}

button.muacks:hover {
  background: #ffe9e9;
  transform: translate(0, .25em);
}

button.muacks:hover::before {
  box-shadow: 0 0 0 2px #b18597, 0 .5em 0 0 #ffe3e2;
  transform: translate3d(0, .5em, -1em);
}

button.muacks:active {
  background: #ffe9e9;
  transform: translate(0, .75em);
}

button.muacks:active::before {
  box-shadow: 0 0 0 2px #b18597, 0 0 #ffe3e2;
  transform: translate3d(0, 0, -1em);
}

</style>
   </head>
   <body>
      <input type="checkbox" id="active">
      <label for="active" onclick="muncha.play();" class="menu-btn"><i class="fas fa-bars"></i></label>
      <div class="wrapper">
         <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Gallery</a></li>
         </ul>
	 <img src="black-cat.gif" style="position:absolute;background:black;width:185px;right:77px;bottom:92px;">
      </div>
      <div class="content">
	      <button onclick="papong.play();" class="muacks">Muacksss</button>
         <div class="title">
		<img src="2w2otnhwuck11.gif" style="z-index:-1; width: 300px;position:absolute;right:0; bottom:0;">
         </div>
//----------------------------------------------------------------------CUBE-------------------------------------------------------------------------------------------
        <input type="checkbox" id="shadows" checked /><label for="shadows">Soft shadows</label>
<div class="cubes">
  <!--   row, column, z -->
  <div class="cube" data-cube="111">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-z" data-cube="112"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="121">
    <div class="cube-wrap">
      <div class="cube-top">
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="131">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-z" data-cube="132"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="211">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="111"></div>
        <div class="shadow-y" data-cube="111"></div>
        <div class="shadow-z" data-cube="212"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="221">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="121"></div>
        <div class="shadow-y" data-cube="121"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="231">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="131"></div>
        <div class="shadow-y" data-cube="131"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="311">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="211"></div>
        <div class="shadow-y" data-cube="211"></div>
        <div class="shadow-z" data-cube="312"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="321">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="221"></div>
        <div class="shadow-y" data-cube="221"></div>
        <div class="shadow-z" data-cube="322"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="331">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="231"></div>
        <div class="shadow-y" data-cube="231"></div>
        <div class="shadow-z" data-cube="332"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>

  <!-- top layer -->
  <div class="cube" data-cube="112">
    <div class="cube-wrap">
      <div class="cube-top">

      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="122">
    <div class="cube-wrap">
      <div class="cube-top">
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="132">
    <div class="cube-wrap">
      <div class="cube-top">
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="212">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="112"></div>
        <div class="shadow-y" data-cube="112"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="222">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="122"></div>
        <div class="shadow-y" data-cube="122"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="232">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="132"></div>
        <div class="shadow-y" data-cube="132"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="312">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="212"></div>
        <div class="shadow-y" data-cube="212"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="322">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="222"></div>
        <div class="shadow-y" data-cube="222"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="332">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="232"></div>
        <div class="shadow-y" data-cube="232"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>

  <!-- bottom layer -->
  <div class="cube" data-cube="113">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-z" data-cube="111"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="123">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-z" data-cube="121"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="133">
    <div class="cube-wrap">
      <div class="cube-top">
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="213">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="113"></div>
        <div class="shadow-y" data-cube="113"></div>
        <div class="shadow-z" data-cube="211"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="223">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-y" data-cube="123"></div>
        <div class="shadow-z" data-cube="221"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="233">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-y" data-cube="133"></div>
        <div class="shadow-z" data-cube="231"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="313">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="213"></div>
        <div class="shadow-y" data-cube="213"></div>
        <div class="shadow-z" data-cube="311"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="323">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="223"></div>
        <div class="shadow-y" data-cube="223"></div>
        <div class="shadow-z" data-cube="321"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="333">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="233"></div>
        <div class="shadow-y" data-cube="233"></div>
        <div class="shadow-z" data-cube="331"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  
  <div class="large-shadows">
    <div class="large-shadow" data-cube="113"></div>
    <div class="large-shadow" data-cube="123"></div>
    <div class="large-shadow" data-cube="133"></div>
    <div class="large-shadow" data-cube="213"></div>
    <div class="large-shadow" data-cube="223"></div>
    <div class="large-shadow" data-cube="233"></div>
    <div class="large-shadow" data-cube="313"></div>
    <div class="large-shadow" data-cube="323"></div>
    <div class="large-shadow" data-cube="333"></div>
  </div>
</div>
//------------------------------------------------------------ENDING OF CUBE-------------------------------------------------------------------------------------------

	</div>

	   <script type="text/javascript">
		   const papong = new Audio();
		   papong.src = "papong.mp3";
		   
		   const muncha = new Audio();
		   muncha.src = "munchapompom.mp3";
		   
	    </script>
   </body>
</html>

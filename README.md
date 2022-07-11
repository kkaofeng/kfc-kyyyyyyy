<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Fullscreen Overlay Navigation | CodingNepal</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="menu.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      
	   <style>
		   @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
		   @import url("https://fonts.googleapis.com/css?family=Rubik:700&display=swap");
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

button.dadong {
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

button.dadong::before {
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

button.dadong:hover {
  background: #ffe9e9;
  transform: translate(0, .25em);
}

button.dadong:hover::before {
  box-shadow: 0 0 0 2px #b18597, 0 .5em 0 0 #ffe3e2;
  transform: translate3d(0, .5em, -1em);
}

button.dadong:active {
  background: #ffe9e9;
  transform: translate(0, .75em);
}

button.dadong:active::before {
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
	      <button onclick="dadong.play();" class="dadong">DaDong~</button>
         <div class="title">
		<img src="black-cat.gif" style="position:absolute;background:white;width:185px;right:77px;bottom:92px;">
         </div>
	</div>

	   <script type="text/javascript">
		   const dadong = new Audio();
		   dadong.src = "dadong.mp3";
		   
		   const muncha = new Audio();
		   muncha.src = "munchapompom.mp3";
		   
	    </script>
   </body>
</html>

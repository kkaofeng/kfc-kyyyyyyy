   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="buttonDadong.css">
      <link rel="stylesheet" href="menu.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      
	   <style>
		   @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
		   @import url("https://fonts.googleapis.com/css?family=Rubik:700&display=swap");

</style>
   </head>
   <body>
      <input type="checkbox" id="active">
      <button for="active" onclick="muncha.play();" class="menu-btn"><i class="fas fa-bars"></i></button>
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

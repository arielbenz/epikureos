	
	<!-- <section id="partner-footer">
		
		<div id="partner-section">
			<div class="partner-image"></div>
			<div class="partner-image"></div>
			<div class="partner-image"></div>
			<div class="partner-image"></div>
		</div>
		
	</section> -->

	<footer>
		<section id="home-footer">

			<nav id="footer-links" class="footer-info">
				<h3>TU SALIDA</h3>
				<div id="about">
					<ul>
						<li><a href="<?php echo $url?>/novedades">Novedades</a></li>
						<li><a href="<?php echo $url?>/laposta">La Posta</a></li>
					</ul>
				</div>

				<div id="contact">
					<ul>
						<li><a href="<?php echo $url?>/quees">¿Qué es?</a></li>
						<li><a href="<?php echo $url?>/contacto">Contacto</a></li>
					</ul>
				</div>
			</nav>

			<article id="footer-redes" class="footer-info">
				<h3>SEGUINOS EN</h3>
				<ul>
					<li><a href="http://facebook.com/TuSalidaBar" class="link-face"></a></li>
      				<li><a href="http://twitter.com/tusalidaok" class="link-twitter"></a></li>
       				<li><a href="#" class="link-rss"></a></li>
       				<li><a href="#" class="link-plus"></a></li>
				</ul>
			</article>

			<article id="footer-news" class="footer-info">
				<h3>MANTENTE INFORMADO</h3>

				<div class="input">
					<div class="form-icon">
						<div class="icon mail"></div>
					</div>

					<div id="mc_embed_signup">
						<form id="form-footer" action="http://tusalida.us3.list-manage1.com/subscribe/post?u=b8a63465d39195c8c5b2ccecc&amp;id=2b81f804fd" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
							<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Ingresá tu mail..." required>
						    <div style="position: absolute; left: -5000px;"><input type="text" name="b_b8a63465d39195c8c5b2ccecc_2b81f804fd" value=""></div>
							<div class="clear"><input type="submit" value="LISTO" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						</form>
					</div>
				</div>
				
			</article>

			<article id="footer-terminos">
				<small><a href="<?php echo $url?>/terminos">Términos y condiciones de uso</a> | Copyright 2014 Tu Salida</small>
			</article>

			<article id="footer-design">
				<p>Diseñado por Nicolás Rebaudino</p>
			</article>
			
		</section>
	</footer>


	<div id="fb-root"></div>

	<script>
	window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '283139271849796', // Set YOUR APP ID
	      status     : true, // check login status
	      cookie     : true, // enable cookies to allow the server to access the session
	      xfbml      : true  // parse XFBML
	    });
	 
	    FB.Event.subscribe('auth.authResponseChange', function(response) 
	    {
	     if (response.status === 'connected') 
	    {
	        document.getElementById("message").innerHTML +=  "<br>Connected to Facebook";
	        //SUCCESS
	 
	    }    
	    else if (response.status === 'not_authorized') 
	    {
	        document.getElementById("message").innerHTML +=  "<br>Failed to Connect";
	 
	        //FAILED
	    } else 
	    {
	        document.getElementById("message").innerHTML +=  "<br>Logged Out";
	 
	        //UNKNOWN ERROR
	    }
	    }); 
	 
	    };
	 
	    function Login()
	    {
	 
	        FB.login(function(response) {
	           if (response.authResponse) 
	           {
	                getUserInfo();
	            } else 
	            {
	             console.log('User cancelled login or did not fully authorize.');
	            }
	         },{scope: 'email,user_photos,user_videos'});
	 
	    }
	 
	  function getUserInfo() {
	        FB.api('/me', function(response) {
	 
	      var str="<b>Name</b> : "+response.name+"<br>";
	          str +="<b>Link: </b>"+response.link+"<br>";
	          str +="<b>Username:</b> "+response.username+"<br>";
	          str +="<b>id: </b>"+response.id+"<br>";
	          str +="<b>Email:</b> "+response.email+"<br>";
	          str +="<input type='button' value='Get Photo' onclick='getPhoto();'/>";
	          str +="<input type='button' value='Logout' onclick='Logout();'/>";
	          document.getElementById("status").innerHTML=str;
	 
	    });
	    }
	    function getPhoto()
	    {
	      FB.api('/me/picture?type=normal', function(response) {
	 
	          var str="<br/><b>Pic</b> : <img src='"+response.data.url+"'/>";
	          document.getElementById("status").innerHTML+=str;
	 
	    });
	 
	    }
	    function Logout()
	    {
	        FB.logout(function(){document.location.reload();});
	    }
	 
	  // Load the SDK asynchronously
	  (function(d){
	     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement('script'); js.id = id; js.async = true;
	     js.src = "//connect.facebook.net/en_US/all.js";
	     ref.parentNode.insertBefore(js, ref);
	   }(document));
	 
	</script>

	<div align="center">
	<h2>Facebook OAuth Javascript Demo</h2>
	 
	<div id="status">
	 Click on Below Image to start the demo: <br/>
	<img src="http://hayageek.com/examples/oauth/facebook/oauth-javascript/LoginWithFacebook.png" style="cursor:pointer;" onclick="Login()"/>
	</div>
	 
	<br/><br/><br/><br/><br/>
	 
	<div id="message">
	Logs:<br/>
	</div>
	 
	</div>

</body>
</html>
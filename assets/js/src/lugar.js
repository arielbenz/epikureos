$(document).on("ready", inicio);

function inicio() {
    var latlon = new google.maps.LatLng(lugar.latitud, lugar.longitud);
    var myOptions = {
        zoom: 16,
        center: latlon,
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
	var map = new google.maps.Map($("#lugar-mapa").get(0), myOptions);

	var marcador = new google.maps.Marker({
        position: latlon,
        map: map
    });

	$(".vote").click(function(event) {

		var user = getUserStatus();
		
		if(user) {
			var ocasionid = $(this).attr("id");
			var name = $(this).attr("name");

			console.log(ocasionid);

			var params = {  'lugarid' : lugar.id, 'ocasionid' : ocasionid, 'name' : name };

		   	$.ajax({
                type: "POST",
	            url: urlLike,
	            data: params,
	            cache: false,
	            success: function (data) {
	            	if(data.message == "") {
	            		var votos = data.votosLugar;
		            	var ocasiones = data.totalOcasiones;
		            	votesUserAjax = data.votesUser;
		            	ratingUser = data.ratingUser;
		            	var html = "";
		            	var voto = 0;
		            	var j = 1;

						for(var i in votos) {
							voto = 0;
							if(votos[i] > 0) {
								voto = (votos[i]*100)/(data.totalVotos);
							}
							html = html.concat("<div class='lugar-votos-ocasion'><span class='lugar-votos-desc'>" + i + "</span><span class='lugar-votos-voto'>" + votos[i] + " Votos</span><div class='meter orange nostripes'><span style='width:" + voto + "%'></span></div></div>");
							j = j + 1;
						}

						$(".lugar-contentrating-ocasion").html(html);

						$(".meter > span").each(function() {
							$(this)
						});
						
						meterAnimate();
	            	} else {
	            		console.log(data.message);
	            	}
	            },
	            error: function(data) {
	                console.log("Error al votar");
	            }  
	        });
			event.preventDefault();
		} else {
			swal({
				title: "Recomendá " + lugar.nombre,
				text: "Debes iniciar sesión para poder votar",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#597AC7",
				confirmButtonText: "Iniciar Sesión",
				closeOnConfirm: false
				},
			function() {
				callbackLogin();
			});
			event.preventDefault();
		}
 	});

	$(function(){
		var reviewBox = $('.section__review-box');
		var newReview = $('.new-review');
		var ratingsField = $('#ratings-hidden');

		$(".glyphicon").click(function() {
			console.log($("#ratings-hidden").val());
		});

		$('.starrr').on('starrr:change', function(e, value){
        	ratingsField.val(value);
      	});

      	meterAnimate();

      	$("#owl-demo").owlCarousel({
      		autoPlay: 4000,
			navigation : false,
				slideSpeed : 300,
				paginationSpeed : 400,
				singleItem: true
		});

		$(".button-comment").click(function(event) {
			var userStatus = getUserStatus();

			if (userStatus) {
				if($(".new-review").val().trim() == "") {
					event.preventDefault();
					swal({
						title: "Opinión de " + lugar.nombre,
						text: "Debes completar tu opinión",
						type: "warning",
						showCancelButton: false,
						confirmButtonColor: "#597AC7",
						confirmButtonText: "Completar ahora",
						closeOnConfirm: true
						},
					function() {});
				}
			} else if($(".nombre-sesion-user").val().trim() == "") {
				swal({
					title: "Opinión de " + lugar.nombre,
					text: "Completa el nombre o iniciá sesión",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#597AC7",
					confirmButtonText: "Iniciar Sesión",
					closeOnConfirm: false
					},
				function() {
					callbackLogin();
				});
			} else if($(".new-review").val().trim() == "") {
				event.preventDefault();
				swal({
					title: "Opinión de " + lugar.nombre,
					text: "Debes completar tu opinión",
					type: "warning",
					showCancelButton: false,
					confirmButtonColor: "#597AC7",
					confirmButtonText: "Completar ahora",
					closeOnConfirm: true
					},
				function() {});
			}
		});

		$(".close").click(function(event) {
			$(".alert-danger").css("display", "none");
		});
    });    
}

Share = {
	facebook: function(purl, ptitle, pimg, text) {
	url = 'http://www.facebook.com/sharer.php?s=100';
	url += '&p[title]=' + encodeURIComponent(ptitle);
	url += '&p[summary]=' + encodeURIComponent(text);
	url += '&p[url]=' + encodeURIComponent(purl);
	url += '&p[images][0]=' + encodeURIComponent(pimg);
	Share.popup(url);
	},
	twitter: function(purl, ptitle) {
	url = 'http://twitter.com/share?';
	url += 'text=' + encodeURIComponent(ptitle);
	url += '&url=' + encodeURIComponent(purl);
	url += '&counturl=' + encodeURIComponent(purl);
	Share.popup(url);
	},
	popup: function(url) {
	window.open(url,'','toolbar=0,status=0,width=626, height=436');
	}
};

function meterAnimate() {
	var meterid = 0;
	var totalOcaciones = getOcasiones();
	if(votesUserAjax == null) {
		votesUserAjax = getVotesUserAjax();
	}
	if(ratingUser == null) {
		ratingUser = getRatingUser();
	}

  	$(".meter > span").each(function() {
  		
  		var user = getUserStatus();
  		var rateg = getRatingUser();
  		var idOcasion = totalOcaciones[meterid];
  		if(user) {
  			if(ratingUser != -1) {
  				var idOcasionUser = null;
  				$.each(votesUserAjax, function(index, value) {
       				if(idOcasion == value) {
       					idOcasionUser = idOcasion;
       				}
   				});

  				if (idOcasionUser == null) {
      				$(".voteocasion-up"+idOcasion).css("display", "initial");
      				$(".voteocasion-up"+idOcasion).css("background-color", "#58ba48");
	      			$(".voteocasion-down"+idOcasion).css("display", "none");
      			} else {
      				$(".voteocasion-up"+idOcasion).css("display", "none");
	      			$(".voteocasion-down"+idOcasion).css("display", "initial");
      			}
  			} else {
  				$(".voteocasion-up"+idOcasion).css("display", "initial");
  				$(".voteocasion-up"+idOcasion).css("background-color", "#58ba48");
	      		$(".voteocasion-down"+idOcasion).css("display", "none");
  			}
      	} else {
      		$(".voteocasion-up"+idOcasion).css("display", "initial");
      		$(".voteocasion-down"+idOcasion).css("display", "none");
      	}

		$(this).data("origWidth", $(this).width()).width(0).animate({ width: $(this).data("origWidth") }, 1200);
		meterid = meterid + 1;
	});
}
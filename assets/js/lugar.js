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
			bootbox.dialog({
				message: "Debe iniciar sesión para poder votar",
			  	title: "Votación",
			  	buttons: {
				    danger: {
			      	label: "Cancelar",
			      	className: "btn-danger",
			      	callback: function() {}
			    },
			    main: {
			    	label: "Iniciar Sesión",
			      	className: "btn-primary",
			      	callback: function() {
				      	callbackLogin();
			      	}
			    }
			  }
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
	var meterid = 1;
	console.log(votesUserAjax);
	if(votesUserAjax == null) {
		votesUserAjax = getVotesUserAjax();
	}
	if(ratingUser == null) {
		ratingUser = getRatingUser();
	}

  	$(".meter > span").each(function() {
  		var user = getUserStatus();
  		var rateg = getRatingUser();
  		if(user) {
  			
  			if(ratingUser != -1) {
  				if (votesUserAjax[meterid] == 0) {
      				$(".voteocasion-up"+meterid).css("display", "initial");
      				$(".voteocasion-up"+meterid).css("background-color", "#58ba48");
	      			$(".voteocasion-down"+meterid).css("display", "none");
      			} else {
      				$(".voteocasion-up"+meterid).css("display", "none");
	      			$(".voteocasion-down"+meterid).css("display", "initial");
      			}
      			
  			} else {
  				
  					$(".voteocasion-up"+meterid).css("display", "initial");
  					$(".voteocasion-up"+meterid).css("background-color", "#58ba48");
	      			$(".voteocasion-down"+meterid).css("display", "none");
  			}
  			
      	} else {
      		$(".voteocasion-up"+meterid).css("display", "initial");
      		$(".voteocasion-down"+meterid).css("display", "none");
      	}

		$(this)
			.data("origWidth", $(this).width())
			.width(0)
			.animate({
				width: $(this).data("origWidth")
			}, 1200);
		meterid = meterid + 1;
	});
}
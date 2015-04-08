$(function(){

	var listCateg = $("#carteSelect");
	var nomCateg = $("#NomCategorie");
	var nomAnalyse ; 
	$("#CreerCategorie").hide();
	nomCateg.hide();

	var modifOngletTxt = $("#modifOngletTxt");
	var modifOngletBt = $("#modifOngletBt");
	var ajoutOngletTxt = $("#ajoutOngletTxt");
	var ajoutOngletBt = $("#ajoutOngletBt");
	modifOngletTxt.hide();
	modifOngletBt.hide();
	ajoutOngletTxt.hide();
	ajoutOngletBt.hide();


	$("#autre").click(function(){
		$("#CreerCategorie").show();
		nomCateg.show();
		$("#autre").hide();
	});


	$("input[type=button]").click(function(){
		var btn = $(this).attr('id');
		var nom = nomCateg.val();
		if(btn =='CreerCategorie' || btn=='CreerTemoin')
		{	
			$.post(Routing.generate('temoin_creercartepage'), {'btn':btn, 'nom': nom}, function(data, textStatus) {

			}, "json");
		
			listCateg.append("<option selected>" + nomCateg.val() + "</option>");
			nomAnalyse = nomCateg.val();	
			nomCateg.val("");


		}
		if(btn == 'CarteValider')
		{
			cartevalider();

		}

		if (btn == 'modifOnglet')
		{
			$("#modifOnglet").hide();
			modifOngletTxt.show();
			modifOngletBt.show();
		}
		if (btn == 'ajoutOnglet')
		{
			$("#ajoutOnglet").hide();
			ajoutOngletTxt.show();
			ajoutOngletBt.show();
		}
		if (btn == 'supprOnglet')
		{
			var nom = $("#nomCarte").val();
			

		}
	});


	modifOngletBt.click(function(){
		var btn = $(this).attr('id');
		var nom = modifOngletTxt.val();
		if (nom.length != 0) {
		
			var ancien = $("#nomCarte").val();
			$.post(Routing.generate('temoin_consultcartepage',{id:carte_id}), {'btn':btn, 'nom': nom , 'ancien': ancien, 'id': carte_id}, function(data, textStatus) {

			}, "json");

			
			$("#nomCarte option[value="+ancien+"]").html(nom).val(nom);
		}

		modifOngletTxt.hide();
		modifOngletBt.hide();
		$("#modifOnglet").show();

	});
	ajoutOngletBt.click(function(){
		var noms =  $("#nomCarte").val();
		var btn = $(this).attr('id');
		var nom = ajoutOngletTxt.val();

		if (nom.length > 0) {
		$.post(Routing.generate('temoin_consultcartepage',{id:carte_id}), {'btn':btn, 'nom': nom }, function(data, textStatus) {

		}, "json");

		
		$("#nomCarte").append("<option value ="+nom +" selected>"+nom+"</option>");
		
		}
		ajoutOngletTxt.hide();
		ajoutOngletBt.hide();
		$("#ajoutOnglet").show();
		AfficheParNom();
		parametreCarte();
	});

	$("#supprOnglet").click(function(){
		var btn = $(this).attr('id');

		var nom = $("#nomCarte").val();
		$.post(Routing.generate('temoin_consultcartepage',{id:carte_id}), {'btn':btn, 'nom': nom }, function(data, textStatus) {

		}, "json");

		
		/*$("#nomCarte").append("<option selected>"+nom+"</option>")
		ajoutOngletTxt.hide();
		ajoutOngletBt.hide();
		$("#ajoutOnglet").show();
		AfficheParNom();*/
		$('#nomCarte option[value='+nom+']').remove();
		AfficheParNom();
		parametreCarte();

	});




		$('body').on('change', "input.D1Class", function() {
		    var nom = $("#nomCarte").val();

 			var id = this.id;
  			var val1 = $("#"+id).val();
  			var d2 = id.replace("1","2");
  			var val2 = $("#"+d2).val();
  			if( val1 > 0 & val2 > 0 ){

	  			var num = id.replace("D1Valeur","NumValeur");

	  			num = $("#"+num).val();

	  			
	  			var moy = "moyenne";
				var request = $.ajax({
			        type: 'POST',
			        url: "index",
			        data: { id : carte_id , filtre : moy , val1: val1 , val2 : val2 , num: num ,nom : nom}
	    		}); 
				request.done(function(data) {
					var array = (data.split(";"));
					var num = id.replace("D1Valeur","MoyenneValeur");
					$("#"+num).css("border-color","red");
		      		$("#"+num ).val(array[0]);	
		      		num = num.replace("MoyenneValeur","CvValeur");
		      		$("#"+num).css("border-color","red");
		      		$("#"+num ).val(array[1]);	
		   		});
		   		parametreCarte();
			}
		});

		$('body').on('change', "input.SupprClass", function() {
		    var nom = $("#nomCarte").val();

 			var id = this.id;
  			
  			var d1 = id.replace("SupprValeur","D1Valeur");
  			var val1 = $("#"+d1).val();
  			var val2 = id.replace("SupprValeur","D2Valeur");
			val2 = $("#"+val2).val();

  			if( val1 > 0 & val2 > 0 ){

	  			var num = id.replace("SupprValeur","NumValeur");

	  			num = $("#"+num).val();
		
	  			var filtre = "supprCC";
				$.post(Routing.generate('temoin_consultcartepage',{id:carte_id}), {'btn':filtre, 'nom': nom , 'num' : num}, function(data, textStatus) {

				}, "json");
				parametreCarte();

			}
		});


		$('body').on('change', "input#ecart", function() {
			var ecart = $("#ecart").val();
			var filtre = "ecart";
			var nom = $("#nomCarte").val();

			var request = $.ajax({
			    type: 'POST',
		        url: Routing.generate('temoin_parametreCartepage') ,
		        data: { btn : filtre , id : carte_id , nom:nom , ecart:ecart  }
 			 }); 
  			request.done(function( data) {
        		$("#parametreCarte").html( data);
  			});

		});

		$('body').on('change', "input#nombreCible", function() {
			var filtre = "nombreCible";
			var nom = $("#nomCarte").val();
			var nombrecible = $("#nombreCible").val();
			 var request = $.ajax({
			    type: 'POST',
		        url: Routing.generate('temoin_parametreCartepage') ,
		        data: { btn : filtre , id : carte_id , nom:nom , nombrecible:nombrecible  }
 			 }); 
  			request.done(function( data) {
        		$("#parametreCarte").html( data);
  			});

			
		});
	

		$('body').on('change', "input.D2Class", function() {
			var nom = $("#nomCarte").val();
			var id = this.id;
			var val1 = id.replace("2","1");
			val1 = $("#"+val1).val();
			var val2 = $("#"+id).val();

			if(val2 >= 1 & val1 >= 1)
			{


				var num = id.replace("D2Valeur","NumValeur");
				num = $("#"+num).val();
				var moy = "moyenne";
				var request = $.ajax({
					type: 'POST',
					url: "index",
					data: { id : carte_id , filtre : moy , val1: val1 , val2 : val2 , num: num ,nom : nom }
				}); 


				request.done(function(data) {
					var array = (data.split(";"));
					var num = id.replace("D2Valeur","MoyenneValeur");
					$("#"+num).css("border-color","red");
					$("#"+num ).val(array[0]);  
					num = num.replace("MoyenneValeur","CvValeur");
					$("#"+num).css("border-color","red");
					$("#"+num ).val(array[1]);  
				});
				parametreCarte();
			}
		});

		$('body').on('change', "textarea.CommClass", function() {
			var nom = $("#nomCarte").val();
			var id = this.id;
			var idVal = $("#"+id).val();

			var val1 = id.replace("txt_test","D1Valeur");
			val1 = $("#"+val1).val();
			var val2 = id.replace("txt_test","D2Valeur");
			val2 = $("#"+val2).val();

			
			if(val2 > 0 & val1 >  0)
			{


				var num = id.replace("txt_test","NumValeur");
				num = $("#"+num).val();
				var filtre = "commentaire";
				$.post(Routing.generate('temoin_consultcartepage',{id:carte_id}), {'btn':filtre, 'nom': nom , 'num' : num, 'comm' : idVal }, function(data, textStatus) {

				}, "json");


			}
			else
				{alert("Il faut modifier les valeurs de D1 et D2 afin de pouvoir modifier la date et les commentaires");}
		});


		$('body').on('change', "input.DateClass", function() {
			var nom = $("#nomCarte").val();
			var id = this.id;
			var idVal = $("#"+id).val();


			var val1 = id.replace("DateValeur","D1Valeur");
			val1 = $("#"+val1).val();
			var val2 = id.replace("DateValeur","D2Valeur");
			val2 = $("#"+val2).val();


			
			if(val2 > 0 & val1 >  0)
			{


				var num = id.replace("DateValeur","NumValeur");
				num = $("#"+num).val();
				var filtre = "date";
				$.post(Routing.generate('temoin_consultcartepage',{id:carte_id}), {'btn':filtre, 'nom': nom , 'num' : num, 'date' : idVal }, function(data, textStatus) {

				}, "json");


			}
			else
				{alert("Il faut modifier les valeurs de D1 et D2 afin de pouvoir modifier la date et les commentaires");}
		});

		$('body').on('change', "input.VisaClass", function() {
			var nom = $("#nomCarte").val();
			var id = this.id;
			var idVal = $("#"+id).val();


			var val1 = id.replace("VisaValeur","D1Valeur");
			val1 = $("#"+val1).val();
			var val2 = id.replace("VisaValeur","D2Valeur");
			val2 = $("#"+val2).val();

			if(val2 > 0 & val1 >  0)
			{


				var num = id.replace("VisaValeur","NumValeur");
				num = $("#"+num).val();
				var filtre = "visa";
				$.post(Routing.generate('temoin_consultcartepage',{id:carte_id}), {'btn':filtre, 'nom': nom , 'num' : num, 'visa' : idVal }, function(data, textStatus) {

				}, "json");


			}
		});

		$('body').on('change', "#nomCarte", function() {
			AfficheParNom();
		});


	

});


 
$(document).ready(function(){

		$(document).on('change', '.dynamic', function () {



			var cat_id = $(this).val();
			console.log(cat_id);
			var op = " ";
		
			$.ajax({
				type: 'get',
				url:'/gouvernorat10/' ,
				data: { 'id': cat_id },

				success: function (data) {
					//console.log('success');
					console.log(data);

					//console.log(data.length);
					op += '<option value="0" name="commune" selected disabled>choisir une commune</option>';
					for (var i = 0; i < data.length; i++) {
						op += '<option value="' + data[i].id + '">' + data[i].nom_commune_fr + '</option>';
					}

					$('#dynamic_1').html(op);
				},
				error:function (errorThrown) {
					alert(errorThrown);
					
					  },
			
			});


		});
		$(document).on('change', '.dynamic_1', function () {
			//console.log("hmm its change");
			var cat_id1 = $(this).val();
		//	console.log(cat_id1);
			var op = " ";
			var div_1 = $(this).parent();
			$.ajax({
				type: 'get',
				url: "/projet/commune/",
				data: { 'id': cat_id1 },

				success: function (data) {
					//console.log('success');
					console.log(data);
					//console.log(data.length);
					op += '<option value="0" selected disabled>choisir une municipalite</option>';
					for (var i = 0; i < data.length; i++) {
						op += '<option value="' + data[i].id + '">' + data[i].nom_municipalite_fr + '</option>';
					}

					$('#dynamic_2').html(op);
				},
				error: function () {
				}
			});
		});
	});
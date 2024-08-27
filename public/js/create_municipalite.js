$(document).ready(function(){

    $(document).on('change', '.gouvernorat', function () {
    
			var id_gouvernorat = $(this).val();
			console.log(id_gouvernorat);
            var commune_op  = " ";
			var div = $(this).parent();
            $.ajax({
				type: 'get',
				url:'/gouvernorat10/' ,
				data: { 'id': id_gouvernorat },

                success: function (data) {
					//console.log('success');
					console.log(data);

					//console.log(data.length);
					commune_op += '<option value="0" name="commune" selected disabled>choisir une commune</option><br> ';
					for (var i = 0; i < data.length; i++) {
						commune_op  += '<option value="' + data[i].id + '">' + data[i].nom_commune_fr + '</option>';
					}

					$('#dynamic_1').html(commune_op);
				},
				error:function (errorThrown) {
					alert(errorThrown);
					
					  },
            });
  
    });
    });
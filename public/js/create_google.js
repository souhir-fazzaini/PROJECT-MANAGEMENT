
$(document).ready(function(){

    $(document).on('change', '.image', function () {
        console.log("hh");
      var nbre_image = $(this).val();
        console.log(nbre_image);
        html="";
        for(var i=0;i<nbre_image;i++)
        {
            html=html+"<i class='glyphicon glyphicon-picture'> <input type='file' name='image '"+i+"'' class='form-control'></i>"
        }
        console.log(html);
      
       
 

    document.getElementById('img').innerHTML = html;
    })
    $(document).on('change', '.projet', function () {
        var id_projet = $(this).val(); 
        console.log(id_projet);
        $.ajax({
            type: 'get',
            
            url:'nom_gouvernorat/' ,
            dataType: "json",
            data: { 'id': id_projet },
            success: function (data) {
                //console.log('success');
                console.log(data);
                i=0;
                document.getElementById('gouvernorat').innerHTML = data[i].nom_gouvernorat_fr;

            },

            error:function (errorThrown) {
                console.log(errorThrown);
               
                
                  },






        })

    })
})
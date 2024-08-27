function showList(id,nomgouvernorat,nom_gouvernorat_ar)
{let tableList = "";
var $id1=0;
for(let i = first; i < first+numberOfItems   ;i++){
  if(id[i]!=null)
 { console.log(i);
  $id1=id[i];
  var href='update/'+$id1;
console.log($id1);
    tableList += `
    <tr>
      <td>${id[i]}</td>
      <td>${nomgouvernorat[i]}</td>
      <td>${nom_gouvernorat_ar[i]}</td>
      <td>

<a class="btn btn-danger" href="#delete" role="button" onclick="gouvernoratdelete({{$gouvernorat->id}})"  data-toggle="modal" data-target="#delete"><i class="far fa-trash-alt"></i></a>
<a class="btn btn-success" href="`+href+`"role="button"><i class="fas fa-edit"></i></a>
</td>
</tr>
    
    </tr>
    ` 
     document.getElementById('letterList').innerHTML=tableList;
console.log(tableList);}

}   


}

function gouvernoratdelete(id)
{
if (confirm("do you really want todelte this"))
{
$.ajax(
{
  url:'gouvernorat/'+id,
  type:"DELETE",
  data:{
    _token:$("input[name=_token]").val()



  },
  success:function(response)
  {
    $("#sid"+id).remove();
  }

});
}

}

function nextPage(){
if(first+numberOfItems<=id.length){
first+=numberOfItems;
actualPage ++;
showList();
}
}
function previous(){
if(first-numberOfItems >= 0){
  first-=numberOfItems
  actualPage --;
  showList();
}
}
function firstPage(){
  first = 0
  actualPage = 1;
  showList();
}
let maxPages = Math.ceil(id.length / numberOfItems );

function lastPage(){
first = (maxPages * numberOfItems)-numberOfItems;
actualPage = maxPages;
showList(); 
}
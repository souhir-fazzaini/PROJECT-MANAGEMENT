<?php

namespace App\Http\Controllers;
use App\Models\Quartier;

use App\Models\Limite_quartier;

use App\Models\Gouvernorat;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuartierController extends Controller
{ 
  public function projet(Request $req)
  {
  $data=DB::table('quartiers')->join('limite_quartier','limite_quartier.id_quartier','=','quartiers.id')
  ->join('projets','projets.id','=','quartiers.id_projet')
  ->join('gouvernorats','gouvernorats.id','=','projets.id_gouvernorat')
  ->select('quartiers.*','projets.rang_projet','projets.nombre_quartier','projets.nombre_maison','projets.superficie_quartiers','limite_quartier.*')
  ->where('projets.id','=',$req->id)
  ->get(); /*requete qui permet de faire lajointure
   entre les trois table projets et quartiers et limite quartiers dont laquelle
    l'id projet est le nom du projet selectionné dans la select*/
 return response()->json($data);
echo $data;

}
    public function index()
 {   
     
    $gouvernaux=Gouvernorat::all();
    $projet=Projet::all();
    $quartier=Quartier::all();
   
    $limite_q=Limite_quartier::all();
    
     return view('backend/google_map/show_map',compact('quartier','limite_q','gouvernaux','projet'));
     

 }

 public function quartier_gouvernorat(Request $req)
 {    
    
     
    $data=DB::table('quartiers')->join('limite_quartier','limite_quartier.id_quartier','=','quartiers.id')
    ->join('projets','projets.id','=','quartiers.id_projet')
    ->join('gouvernorats','gouvernorats.id','=','projets.id_gouvernorat')
    ->select('quartiers.*','projets.rang_projet','projets.nombre_quartier','projets.nombre_maison','projets.superficie_quartiers','limite_quartier.*')
    ->where('gouvernorats.id','=',$req->id)->get();
     /*requete qui permet de faire la jointure
   entre les trois table projets et quartiers et limite quartiers dont laquelle
    l'id projet est le nom du gouvernorat selectionné dans la select*/
    return response()->json($data);
  echo $data;
   
    
    

 }
 function edit($id,$id1)
 {
     $data=Projet::find($id); //requete permet de rechercher le projet dont id est l'id de projet selectionné
     $quartier1=Quartier::find($id1);//requete permet de rechercher le quartier  dont id est l'id du quartier selectionné
     $limite_q=Limite_quartier::all(); //requete permet d'affecter tous les lignes de la table  limite_quatiers dans la variable $limite_q
     $quartier=Quartier::all(); //requete permet d'affecter tous les lignes de la table quartier dans la variable $quatier
   
     return view('backend/google_map/edit',compact('limite_q','data','quartier','id1','quartier1'));

 }

 function store(Request $req)
 {$rules = [
    'nom' => 'required|unique:quartiers|max:255',
    'projet' => 'required|max:255',
    'image'=>'required',
    



];
$messages = [
    'nom.required' => 'Vous veuillez ecrire le nom du quartier',
    'nom.unique' => 'Le quartier  que vous avez écrit existe déjà , Veuillez le changer ',
    'projet.required' => 'Vous veuillez ecrire le nom du projet',
];

  $validator = Validator::make($req->all(),$rules,$messages);

  if ($validator->fails()) {
    return redirect()->back()
                ->withErrors($validator)
                ->withInput($req->all());
}

    
  print_r($req->input());
   $limite_q1 = new Limite_quartier;
    $quartier1 = new Quartier;
   $projet1 = Projet::find($req->projet);
  if($projet1->nombre_quartier==3)
  {
   $msg= "impossibe d'ajouter une quartier";
   return redirect()->back()
                ->withErrors($msg);
  }else
  {
   

$quartier1->nom =$req->nom;
$quartier1->lat = $req->pinlat;
$quartier1->lng = $req->pinlon;
$quartier1->id_projet =$req->projet;
echo "backend/dist/img/".$req->image."jpg" ;
if($req->image!="")
{
$quartier1->image="backend/dist/img/".$req->image;
echo  $quartier1->save();}
$id_quartier=DB::table('quartiers')->where('nom','=',$req->nom)->value('quartiers.id');
//print_r($id_quartier);
//print_r($req->coordsnum);
for($x=0;$x<=$req->coordsnum-1;$x++)
{
$x1="polylat".$x;
$x2="polylon".$x;

//print_r($req->$x1);
$limite_q1 = new Limite_quartier;

    $limite_q1->id_quartier=$id_quartier;
    $limite_q1->lat_1=$req->$x1;
    $limite_q1->lng_1=$req->$x2;
    $limite_q1->save();

}
$projet1->nombre_quartier=$projet1->nombre_quartier+1;




    
  


    
 



$projet1->save();
//print_r($projet1->save());

//return redirect()->route('quartier.index');
    }
 }
 function tous()
 { 
    $data=DB::table('quartiers')->join('limite_quartier','limite_quartier.id_quartier','=','quartiers.id')
    ->join('projets','projets.id','=','quartiers.id_projet')
    ->join('gouvernorats','gouvernorats.id','=','projets.id_gouvernorat')
    ->select('quartiers.*','projets.rang_projet','projets.nombre_quartier','projets.nombre_maison','projets.superficie_quartiers','limite_quartier.*')
    ->get();
     /*requete qui permet de faire lajointure
   entre les trois table projets et quartiers et limite quartiers de tous les quartiers */
    return response()->json($data);
  echo $data;
   

 }
 function update(Request $req,$id1)

 {
   $rules = [
  'nom' => 'required|max:255',
  



];
$messages = [
  'nom.required' => 'Vous veuillez ecrire le nom du quartier',

];

$validator = Validator::make($req->all(),$rules,$messages);

if ($validator->fails()) {
  return redirect()->back()
              ->withErrors($validator)
              ->withInput($req->all());
}

  

    
     
    print_r($req->input());
    
  $quartier=Quartier::find($id);
  $quartier->nom =$req->nom;

  $quartier->image="backend/dist/img/".$req->image;
  //$quartier->save();

    
   if($req->num==1)
   {
   Limite_quartier::where('id_quartier',$id1)->delete();
   for($x=0;$x<=$req->coordsnum-1;$x++)
   {
   $x1="polylat".$x;
   $x2="polylon".$x;
   
   //print_r($req->$x1);
   
   $limite_q = new Limite_quartier;
   
       $limite_q->id_quartier=$id1;
       $limite_q->lat_1=$req->$x1;
       $limite_q->lng_1=$req->$x2;
      // $limite_q->save();
   
   }}

return redirect()->route('quartier.index');

    
 }


 public function create()
 {
 $gouvernaux=Gouvernorat::all();
    $projet=Projet::all();
     return view('backend/google_map/create',compact('gouvernaux','projet'));
     


 }
 
 public function destroy($id)
 { 
     $quartier=Quartier::find($id); //requete permet de chercher le quartier dont id du quartier est selectionné 
  
    $limite_q=Limite_quartier::where('id_quartier',$id);/*requete permet de chercher le limite quartier 
     dont id du limite quartier  est selectionné */
    $id_projet=Quartier::where('id','=',$id)->value('quartiers.id_projet');
 /*requete permet de chercher le quartier 
     dont id du le quartier  est selectionné */
    $projet=Projet::find($id_projet);
     /*requete permet de chercher le projet 
     dont id du projet est selectionné */
echo $projet->nombre_quartier;

$projet->nombre_quartier=$projet->nombre_quartier-1;
/*requete permet de chercher le projet 
     dont id du projet est selectionné */
$projet->save();
$quartier->delete(); 
   $limite_q->delete();


 }
 
}

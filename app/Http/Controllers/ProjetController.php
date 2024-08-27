<?php

namespace App\Http\Controllers;
use App\Models\Projet;
use Illuminate\Http\Request;
use App\Models\Gouvernorat;
use App\Models\Commune;
use App\Models\Municipalite;
use App\Models\Quartier;
use App\Models\Permission;
use App\Models\Limite_quartier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ProjetController extends Controller
{
    public function index()
    {
        $projets=Projet::paginate(5);
      
        return view('backend/projet/show',compact('projets'));
        
   
    }
   
    public function create()
    {
        $gouvernaux=Gouvernorat::all();//requete qui permet d'ajouter les lignes de la table gouvernorat a la variable $gouvernaux

        return view('backend/projet/create',compact('gouvernaux')); 
        

    }
    public function commune($id,$id1)
    {
        $projet=DB::table('projets')
    ->where('id_gouvernorat',$id)->where('id_commune',$id1)->get();
  //requete qui permet d'ajouter les lignes a la table projet a la variable $projet
        return view('backend/projet/show_projet_commune',compact('projet'));
        

    }
    public function test($id)
    {

$projet=DB::table('projets')->join('gouvernorats','gouvernorats.id','=','projets.id_gouvernorat')
->select('projets.*')->where('projets.id_gouvernorat',$id)->get();
 //requete qui permet d'ajouter les lignes a la table projet dont le 
       return view('backend/projet/show_projet',compact('projet','id'));  
echo $projet;

    }
    public function tunisie()
    {
        

        return view('backend/projet/carte-tunisie');  


    }
    public function test2()
    {
        
        $gouvernaux=Gouvernorat::all();
        $projet=Projet::all();
        $quartier=Quartier::all();
      
        $limite_q=Limite_quartier::all();
        return view('backend/projet/essai2',compact('quartier','limite_q','gouvernaux','projet'));  


    }
    public function projet_map(Request $req)
    {    
       
        
     //  $data=DB::table('quartier')->join('projet','projet.id','quartier.id_projet')->select('quartier.*')->where('projet.id','=',$req->id)->get();
       //return response()->json($data);
     
        
        
    $data=DB::table('quartiers')->join('limite_quartier','limite_quartier.id_quartier','=','quartiers.id')->join('projets','projets.id','=','quartiers.id_projet')->join('gouvernorats','gouvernorats.id','=','projets.id_gouvernorat')->select('quartiers.*','projets.rang_projet','projets.nombre_quartier','projets.nombre_maison','projets.superficie_quartier','projets.image1','limite_quartier.*')->where('projets.id','=',$req->id)->get();
    return response()->json($data);
  echo $data;
       
       
   
    }
    public function search(Request $req)
    {
$search=$req->get('search');
$projets=DB::table('projets')->where('id','like','%'.$search.'%')->paginate(5);
return view('backend/projet/show',compact('projets'));

    }
   
 function store(Request $req)
    {$rules = [
        'rang_projet' => 'required|unique:projets|max:255',
        'gouvernorat' => 'required|max:255',
        'commune' => 'required|max:255',
        'municipalite' => 'required|max:255',
        

    ];
    $messages = [
        'rang_projet.required' => 'Vous veuillez ecrire le rang du projet',
        'gouvrnorat.required' => 'Vous veuillez ecrire le nom  du gouvernorat',
        'commune.required' => 'Vous veuillez ecrire le nom  de la commune ',
        'municipalite.required' => 'Vous veuillez ecrire le nom de la municipalite',
    ];

      $validator = Validator::make($req->all(),$rules,$messages);

      if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($req->all());
    }
  
        $projet = new Projet;
        $projet->rang_projet=$req->rang_projet;
        $projet->id_gouvernorat=$req->gouvernorat;
        $projet->id_commune=$req->commune;
        $projet->id_municipalite=$req->municipalite;
        $projet->nombre_quartier=0;
        $projet->nombre_maison=$req->m;
        $projet->nombre_habitant=$req->h;
        $projet->superficie_quartier=$req->superficie_quartier;
        $projet->superficie_quartier_couvert=$req->superficie_quartier_couvert;
        $projet->rapport_superificie=$req->rapport_superificie;
        $projet->taux_habitation=$req->taux_habitation;
        $projet->rapport_depense_maison=$req->rapport_depense_maison;
        $projet->composante_projet=$req->comment;
        $projet->assainissement_qte=$req->assainissement_qte;
        $projet->assainissement_cout=$req->assainissement_cout;
        $projet->assainissement_taux=$req->assainissement_taux;
        $projet->eclairage_public_qte=$req->eclairage_public_qte;
        $projet->eclairage_public_cout=$req->eclairage_public_cout;
        $projet->eclairage_public_taux=$req->eclairage_public_taux;
        $projet->voirie_qte=$req->voirie_qte;
        $projet->voirie_cout=$req->voirie_cout;
        $projet->voirie_taux=$req->voirie_taux;
        $projet->eau_potable_qte=$req->eau_potable_qte;
        $projet->eau_potable_cout=$req->eau_potable_cout;
        $projet->eau_potable_taux=$req->eau_potable_taux;
        $projet->drainage_qte=$req->drainage_qte;
        $projet->drainage_cout=$req->drainage_cout;
        $projet->drainage_taux=$req->drainage_taux;
        $projet->amel_habitat_qte=$req->amel_habitat_qte;
        $projet->amel_habitat_cout=$req->amel_habitat_cout;
        $projet->socio_collectif_cout=$req->socio_collectif_cout;
        $projet->industriel_cout=$req->industriel_cout;
        $projet->cout_total=$req->cout_total;
        $projet->type=$req->type;
        $projet->lat=0;
        $projet->lng=0;
        $projet->image1=" ";
        $projet->image2=" ";
        $projet->image3="";
        $projet->image4=" ";
        echo $projet->save();
      
        return redirect()->route('projet.index')->with(['success'=> 'Le projet   a été ajouté ']);

        

        
    }
    function edit($id)
    {
        $projet=Projet::find($id);
        $gouvernorats=Gouvernorat::all();
        $commune=Commune::where('id',$projet->id_commune)->value('communes.nom_commune_fr');
        $municipalite=Municipalite::where('id',$projet->id_municipalite)->value('municipalites.nom_municipalite_fr');

        $gouvernorat1=Gouvernorat::join("projets","gouvernorats.id","=","projets.id_gouvernorat")
        ->where("projets.id",$id)
        ->value('gouvernorats.nom_gouvernorat_fr');
        $id_gouvernorat=Gouvernorat::where('nom_gouvernorat_fr',$gouvernorat1)->value('gouvernorats.id');
        $id_commune=Commune::where('nom_commune_fr',$commune)->value('communes.id');
        $id_municipalite=Municipalite::where('nom_municipalite_fr',$municipalite)->value('municipalites.id');
        
        return view('backend/projet/edit',['projet'=>$projet,'gouvernorat1'=>$gouvernorat1,'commune'=>$commune,'municipalite'=>$municipalite],compact('gouvernorats','id_gouvernorat','id_commune','id_municipalite'));

    }

    function update(Request $req)
    {

        print_r($req->commune);
        $rules = [
            'gouvernorat' => 'required|max:255',
            'commune' => 'required|max:255',
            'municipalite' => 'required|max:255',
            
    
        ];
        $messages = [
            
            'gouvrnorat.required' => 'Vous veuillez ecrire le nom  du gouvernorat',
            'commune.required' => 'Vous veuillez ecrire le nom  de la commune ',
            'municipalite.required' => 'Vous veuillez ecrire le nom de la municipalite',
        ];
    
          $validator = Validator::make($req->all(),$rules,$messages);
    
          if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($req->all());
        }
    
        print_r($req->input());
      $projet=Projet::find($req->id);
      $input = $req->all();
       $projet->save($input); 
 
        

        return redirect()->route('projet.index')->with(['success'=> 'Le projet   a été modifié ']);



    }
    
    public function projet_par_commune(Request $request){
      //$request->id here is the id of our chosen option id
      $data=Commune::select('nom_commune_fr','id')->where('id_gouvernorat',$request->id)->get();

      return response()->json($data);//then sent this data to ajax success

}

public function projet_par_municipalite(Request $request)
{
    $data=Municipalite::select('nom_municipalite_fr','id')->where('id_commune',$request->id)->get();
    
    return response()->json($data);
}
public function essai5()
{ $utilisateurs = Permission::where('groupe', 'utilisateur')
    ->get();
    $rôles = Permission::where('groupe', 'rôle')
    ->get();
    $projets = Permission::where('groupe', 'projet')
    ->get();
    $gouvernorats = Permission::where('groupe', 'gouvernorat')
    ->get();
    $communes = Permission::where('groupe', 'commune')
    ->get();
    $quartiers  = Permission::where('groupe', 'quartier')
    ->get();
    $municipalités = Permission::where('groupe', 'municipalité')
    ->get();
    $fonctionnalités = Permission::where('groupe', 'fonctionnalité')
    ->get();

    return view('backend.google_map.essai4',compact('utilisateurs','rôles','projets','gouvernorats','communes',
    'quartiers','municipalités','fonctionnalités'));

    return view('backend.google_map.essai4',compact('users'));

}
public function nom_gouvernorat(Request $request)
{
  

    $data=DB::table('gouvernorats')->join('projets','gouvernorats.id','=','projets.id_gouvernorat')
    ->select('gouvernorats.nom_gouvernorat_fr')->where('projets.id',$request->id)->get();
    return response()->json($data);
    
    
    
 

}
public function essai3()
{

}
}
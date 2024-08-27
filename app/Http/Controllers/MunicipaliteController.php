<?php

namespace App\Http\Controllers;
use App\Models\Municipalite;
use Illuminate\Http\Request;
use App\Models\Gouvernorat;
use App\Models\Commune;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MunicipaliteController extends Controller
{
    public function index()
    {
        $municipalites=Municipalite::paginate(5);
      
        return view('backend/municipalite/show',compact('municipalites'));
        
   
    }
    public function create()
    {
        $gouvernorats=Gouvernorat::all();
      
        return view('backend/municipalite/create',compact('gouvernorats'));
        
   
    }
    public function edit($id)
    {
        $municipalite=Municipalite::find($id);
        $gouvernorats=Gouvernorat::all();
        $gouvernorat1=Gouvernorat::join("municipalites","gouvernorats.id","=","municipalites.id_gouvernorat")
        ->where("municipalites.id",$id)
        ->value('gouvernorats.nom_gouvernorat_fr');
        $commune=Commune::where('id',$municipalite->id_commune)->value('communes.nom_commune_fr');
        $id_gouvernorat=Gouvernorat::where('nom_gouvernorat_fr',$gouvernorat1)->value('gouvernorats.id');
        $id_commune=Commune::where('nom_commune_fr',$commune)->value('communes.id');
        return view('backend/municipalite/edit',compact('gouvernorats','municipalite','gouvernorat1','id_gouvernorat','id_commune','commune'));
        
   
    }
    public function update(Request $req)
    {$rules = [
        'nom_municipalite_fr' => 'required|max:255',
        'nom_municipalite_ar' => 'required|max:255',
        
   

    ];
    $messages = [
        'nom_municipalite_fr.required' => 'Vous veuillez ecrire le nom en français  de la municpalité',
        'nom_municipalite_ar.required' => 'Vous veuillez ecrire le nom  ena arabe de la municpalité',
    
    ];

      $validator = Validator::make($req->all(),$rules,$messages);

      if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($req->all());
    }

        print_r($req->input());
        $municipalite = Municipalite::find($req->id);
     
        $municipalite->nom_municipalite_fr = $req->nom_municipalite_fr;
        $municipalite->nom_municipalite_ar = $req->nom_municipalite_ar;
        if($req->id_gouvernorat!=0 && $req->id_commune!=0)
    {
        $municipalite->id_gouvernorat= $req->id_gouvernorat;
        $municipalite->id_commune= $req->id_commune;}
        $municipalite->save();
    
      return redirect()->route('municipalite.index')->with(['success'=> 'La mnicilaplite  a été modifié']);

      
   
      
   
        
        
   
    }
    public function store(Request $req)
    { $rules = [
        'nom_municipalite_fr' => 'required|unique:municipalites|max:255',
        'nom_municipalite_ar' => 'required|unique:municipalites|max:255',
        'id_gouvernorat' => 'required|max:255',
        'id_commune' => 'required|max:255',
   

    ];
    $messages = [
        'nom_municipalite_fr.required' => 'Vous veuillez ecrire le nom en français  de la municpalité',
        'nom_municipalite_fr.unique' => 'Lamunicpalité  que vous avez écrit existe déjà , Veuillez le changer ',
        'nom_municipalite_ar.required' => 'Vous veuillez ecrire le nom  ena arabe de la municpalité',
        'nom_municipalite_ar.unique' => 'La municpalité  que vous avez écrit existe déjà , Veuillez le changer ',
        'id_gouvernorat.required' => 'Vous veuillez ecrire le nom  du gouvernorat ',
        'id_commune.required' => 'Vous veuillez ecrire le nom de la commune',
    ];

      $validator = Validator::make($req->all(),$rules,$messages);

      if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($req->all());
    }

        print_r($req->input());
        $municipalite = new Municipalite;
     
        $municipalite->nom_municipalite_fr = $req->nom_municipalite_fr;
        $municipalite->nom_municipalite_ar = $req->nom_municipalite_ar;
        $municipalite->id_gouvernorat= $req->id_gouvernorat;
        $municipalite->id_commune= $req->id_commune;
    $municipalite->save();
        return redirect()->route('municipalite.index')->with(['success'=> 'La municipalite  a été ajoutée ']);

      
   
      
   
        
   
    }
    public function destroy($id)
    { 
        
        $municipalite=Municipalite::find($id);
        $municipalite->delete();

        return redirect()->route('gouvenorat.affiche');
    }
    public function search(Request $req)
    {
$search=$req->get('search');
$municipalites=DB::table('municipalites')->where('nom_municipalite_fr','like','%'.$search.'%')->paginate(5);
return view('backend/municipalite/show',compact('municipalites'));

    }
  
}

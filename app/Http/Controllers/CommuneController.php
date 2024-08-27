<?php

namespace App\Http\Controllers;
use App\Models\Commune;
use App\Models\Gouvernorat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommuneController extends Controller
{
   
    public function index()
    {
        $communes=Commune::paginate(5);
      
        return view('backend/communes/show',compact('communes'));
        
   
    }
    public function create()
    {
        $gouvernorats=Gouvernorat::all();
        return view('backend/communes/create',compact('gouvernorats'));
        


    }
    public function search(Request $req)
    {
$search=$req->get('search');
$communes=DB::table('communes')->where('nom_commune_fr','like','%'.$search.'%')->paginate(5);
return view('backend/communes/show',compact('communes'));

    }
    function store(Request $req)
    {
        $rules = [
            'id_gouvernorat'=>'required|max:255',
            'nom_commune_fr' => 'required|max:255|unique:communes',
            'nom_commune_ar' => 'required|max:255|unique:communes',
       
    
        ];
        $messages = [
            'nom_commune_fr.required' => 'Vous veuillez ecrire le nom en français  de la  commune',
            'nom_commune_fr.unique' => 'le commune exixtse deja',
            'id_gouvernorat.required'=> 'Vous veuillez saisir le gouvernorat ',
            'nom_commune_ar.required' => 'Vous veuillez ecrire le nom  ena arabe de la commune',
            'nom_commune_ar.unique' => 'le commune exixtse deja',

        ];
    
          $validator = Validator::make($req->all(),$rules,$messages);
    
          if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($req->all());
        }
    print_r($req->input());
        $commune = new Commune;
        $commune->id_gouvernorat=$req->id_gouvernorat;
        $commune->nom_commune_fr= $req->nom_commune_fr;
        $commune->nom_commune_ar= $req->nom_commune_ar;
        echo $commune->save();
        return redirect()->route('commune.index')->with(['success'=> 'La commune  a été ajouté ']);


    }
    function edit($id)
    {
        $commune=Commune::find($id);
        $gouvernorats=Gouvernorat::all();
        $gouvernorat1=Gouvernorat::join("communes","gouvernorats.id","=","communes.id_gouvernorat")
        ->where("communes.id",$id)->value('gouvernorats.nom_gouvernorat_fr');
        $id_gouvernorat=Gouvernorat::where('nom_gouvernorat_fr',$gouvernorat1)->value('gouvernorats.id');
        return view('backend/communes/edit',['commune'=>$commune],compact('gouvernorat1','id_gouvernorat','gouvernorats'));

    }

    function update(Request $req)
    {
        $rules = [
            'nom_commune_fr' => 'required|max:255',
            'nom_commune_ar' => 'required|max:255',
       
    
        ];
        $messages = [
            'nom_commune_fr.required' => 'Vous veuillez ecrire le nom en français  de la commune',
            'nom_commune_ar.required' => 'Vous veuillez ecrire le nom  ena arabe de la commune',
        ];
    
          $validator = Validator::make($req->all(),$rules,$messages);
    
          if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($req->all());
        }
        print_r($req->input());


       
        $data=Commune::find($req->id);
        $data->id_gouvernorat=$req->id_gouvernorat;
        $data->nom_commune_fr=$req->nom_commune_fr;
        $data->nom_commune_ar=$req->nom_commune_ar;
       echo $data->save();

       return redirect()->route('commune.index')->with(['success'=> 'Le commune a étét modiifié']);


    }
    public function destroy($id)
    { 
        
        $commune=Commune::find($id);
        $commune->delete();

     
    }
  


  
}

<?php

namespace App\Http\Controllers;
use App\Models\Gouvernorat;
use App\Models\Commune;
use App\Models\Municipalite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Projet;


class GouvernoratController extends Controller
{
    
    public function index()
    {
        $gouvernorats=Gouvernorat::paginate(5);
      
        return view('backend/gouvernorat/show',compact('gouvernorats'));
        
   
    }
    public function create()
    {
      
      
        return view('backend/gouvernorat/create');
        


    }
    public function search(Request $req)
    {
$search=$req->get('search');
$gouvernorats=DB::table('gouvernorats')->where('nom_gouvernorat_fr','like','%'.$search.'%')->paginate(5);
return view('backend/gouvernorat/show',compact('gouvernorats'));

    }
   
 function store(Request $req)
    {
    print_r($req->input());
    $rules = [
        'nom_gouvernorat_fr' => 'required|unique:gouvernorats|max:255',
        'nom_gouvernorat_ar' => 'required|unique:gouvernorats|max:255',
   

    ];
    $messages = [
        'nom_gouvernorat_fr.required' => 'Vous veuillez ecrire le nom en français  du gouvernorat',
        'nom_gouvernorat_fr.unique' => 'Le gouvernorat  que vous avez écrit existe déjà , Veuillez le changer ',
        'nom_gouvernorat_ar.required' => 'Vous veuillez ecrire le nom  ena arabe du gouvernorat',
        'nom_gouvernorat_ar.unique' => 'Le gouvernorat  que vous avez écrit existe déjà , Veuillez le changer ',
    ];

      $validator = Validator::make($req->all(),$rules,$messages);

      if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($req->all());
    }

   
    

        $gouvernorat = new Gouvernorat;
        $gouvernorat->nom_gouvernorat_fr = $req->nom_gouvernorat_fr;
        $gouvernorat->nom_gouvernorat_ar = $req->nom_gouvernorat_ar;
        echo $gouvernorat->save();
        return redirect()->route('gouvernorat.index')->with(['success'=> 'Le gouvernorat  a été ajouté ']);
    }
    function edit($id)
    {
        $gouvernorat=Gouvernorat::find($id);
        return view('backend/gouvernorat/edit',['gouvernorat'=>$gouvernorat]);

    }

    function update(Request $req)
    {
        print_r($req->input());
        $rules = [
            'nom_gouvernorat_fr' => 'required|max:255',
            'nom_gouvernorat_ar' => 'required|max:255',
       
    
        ];
        $messages = [
            'nom_gouvernorat_fr.required' => 'Vous veuillez ecrire le nom en français  du gouvernorat',
            'nom_gouvernorat_ar.required' => 'Vous veuillez ecrire le nom  ena arabe du gouvernorat',
        ];
    
          $validator = Validator::make($req->all(),$rules,$messages);
    
          if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($req->all());
        }
    
       

       
        $data=Gouvernorat::find($req->id);
        
        
        $data->nom_gouvernorat_fr = $req->nom_gouvernorat_fr;
        $data->nom_gouvernorat_ar = $req->nom_gouvernorat_ar;
       echo $data->save();

       return redirect()->route('gouvernorat.index')->with(['success'=> 'Le gouvernorat  a été modifié']);

    }
    public function destroy($id)
    { 
        $gouvernorat=Gouvernorat::find($id);
        $projet=Projet::where('id_gouvernorat',$id);
        echo $gouvernorat;
        $commune=Commune::where('id_gouvernorat',$id);
        
        $municipalite=Municipalite::where('id_gouvernorat',$id);
        
     $gouvernorat->delete();
       $projet->delete();
        $commune->delete();
       $municipalite->delete();

return redirect()->route('gouvernorat.index');
    }
    

}

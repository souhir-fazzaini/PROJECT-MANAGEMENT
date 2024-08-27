<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Gouvernorat;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
       /* $users = User::join("gouvernorats","gouvernorats.id","=","users.id_gouvernorat")
        ->select('users.*', 'gouvernorats.nom_gouvernorat_fr')
        ->get();*/


        $users = DB::table('users')
        ->join('gouvernorats', 'gouvernorats.id', '=', 'users.id_gouvernorat')
        ->select('users.*', 'gouvernorats.nom_gouvernorat_fr')
        ->get();

        
        /*$user1 = DB::table('users')
        ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
        ->select('role_id')
        ->get();*/
        
        
      /*  $role_id=$users->role_id;
        $role = Role::find($role_id);*/

        return view('backend.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gouvernorats = Gouvernorat::all();
        $all_gouvernorats = Gouvernorat::find(25);
        $roles=Role::all();
        return view('backend.user.create',compact('gouvernorats','roles','all_gouvernorats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->input('gouvernorat'== '')) {
            $input['gouvernorat'] = null;
        }
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('role'));
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();
        $userRole = Role::join("model_has_roles","model_has_roles.role_id","=","roles.id")
        ->where("model_has_roles.model_id",$id)
        ->get();
        $gouvernorats = Gouvernorat::get();
        $userGouvernorat = User::join("gouvernorats","gouvernorats.id","=","users.id_gouvernorat")
        ->where("users.id",$id)
        ->get();
    
        return view('backend.user.edit',compact('user','userRole','roles','gouvernorats','userGouvernorat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255',
        ];
        $messages = [
            'name.required' => 'Vous veuillez ecrire le nom de l\'utilisateur',
        ];
    
          $validator = Validator::make($request->all(),$rules,$messages);
    
          if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->all());
        }
    
        $input = $request->all();
        $user=User::find($id);
        $user->assignRole($request->input('role'));       
        $user->update($input);       
        return redirect()->route('users.index')->with(['success'=> 'L utilisateur a été modifié avec succés ']);
        $input = $request->all();
        $user=User::find($id);
        $user->assignRole($request->input('role'));
       
        DB::table('model_has_roles')->where([
            ['role_id', '<>', $request->input('role')],
            ['model_id', '=', $id]
        ])->delete();

        $user->update($input);       
        return redirect()->route('users.index')->with(['success'=> 'L utilisateur a été modifié avec succés ']);
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function mot()
    {
        $users = DB::table('users')
        ->join('gouvernorats', 'gouvernorats.id', '=', 'users.id_gouvernorat')
        ->select('users.*', 'gouvernorats.nom_gouvernorat_fr')
        ->get();
        return view('backend.user.motpasse',compact('users'));

    }
    public function save(Request $req,$id)
    {
       $user=User::find($id);
       $user->password=$req->password;
       $user->save();
        }
}

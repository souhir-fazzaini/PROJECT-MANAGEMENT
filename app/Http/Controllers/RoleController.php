<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = DB::select('select * from roles ;');
        //$roles=Role::all();
        return view('backend.role.index',compact('roles'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create2()
    {
        $roles=Role::paginate(4);
        return view('backend.role.create2',compact('roles'));
    }*/
    public function create()
    {
        $utilisateurs = Permission::where('groupe', 'utilisateur')
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

        return view('backend.role.create',compact('utilisateurs','rôles','projets','gouvernorats','communes',
        'quartiers','municipalités','fonctionnalités'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data before insert to database 
      /*$validateData = $request -> validate ([
          'name' => 'required|max:100|unique|name',
          'permission'=>'required'
      ]);*/
      $rules = [
        'name' => 'required|unique:roles|max:100',
        'permission' => 'required',
    ];
    $messages = [
        'name.required' => 'Vous voullez ecrire le nom de rôle',
        'name.unique' => 'Le rôle que vous avez écrit existe déjà , Veuillez le changer ',
        'permission.required' => 'Vous voullez séléctionner au moins une fonctionnalité',
    ];

      $validator = Validator::make($request->all(),$rules,$messages);

      if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($request->all());
    }


        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with(['success'=> 'Le rôle a été ajouté ']);

    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
       ->where("role_has_permissions.role_id",$id)
       ->get();
      return view('backend.role.show',compact('role','rolePermissions'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role=Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
       ->where("role_has_permissions.role_id",$id)
       ->get();
       $utilisateurs = Permission::where('groupe', 'utilisateur')
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

        
      
        return view('backend.role.edit',compact('role','permissions','rolePermissions','utilisateurs',
        'rôles','projets','gouvernorats','communes','quartiers','municipalités','fonctionnalités'));

        
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
        
        $role=Role::find($id);
        $role->name=$request->name;
        $role->update();
        $role->syncPermissions($request->input('permission'));
       
        return redirect()->route('roles.index')->with(['success'=> 'Le rôle a été modifié avec succés ']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        $roles=Role::find($id);
        $roles->destroy($id);
    }*/
    public function destroy(Request $request)
    { dd($request->id);
    }

    public function test()
    {
       
        return view('backend.projets.show_project');
    }
    public function test44()
    {
        $role = Role::all();
        return json_encode(array('data'=>$role));
       
       
   
    }
    public function delete($id)
    {
        $data =Role::find($id);
        $data->delete();
        
    }

}

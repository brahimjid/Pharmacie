<?php

namespace App\Http\Controllers;

use App\Depot;
use App\Fonction;
use App\Groupe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (!(auth()->user()->idFonction == 1)){
            return redirect()->route('home');
        }
        if (request()->ajax()){
        $users = User::all();
        return DataTables::of($users)->addColumn('edit', function($users){
            $button = '<a href="/users/'.$users->id.'/edit" class="btn btn-sm btn-success">
                          <i class="fa fa-pen"></i>
                        </a>';
            return $button;
        })->addColumn('delete', function($users){
            $button = '<button type="button" name="delete" id="'.$users->id.'" class="delete btn btn-danger btn-sm">
            <i class="fa fa-trash"></i>   </button>';

            return $button;
        })
            ->rawColumns(['edit','delete'])
            ->make(true);

    }
        return view('auth.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
//     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!(auth()->user()->idFonction == 1)){
            return redirect()->route('home');
        }
        $fonctions = Fonction::all();
        $groupes = Groupe::all();
        $depots = Depot::all();
        return view('auth.users.create',compact('depots','fonctions','groupes'));
    }

    /**
     * Store a newly created resource in storage.
     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        User::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'tel1' => $request->input('tel1'),
            'tel2' => $request->input('tel2'),
            'etat' => $request->input('etat'),
            'idFonction' => $request->input('idFonction'),
            'idgroupe' => $request->input('idgroupe'),
            'idDepot' => $request->input('iddepot'),
            'adresse' => $request->input('address'),
            'datenaissance' => $request->input('dateN'),
            'lieunaissance' => $request->input('lieuN'),
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $fonctions = Fonction::all();
        $depots = Depot::all();

        return view('auth.users.edit',compact('user','fonctions','depots'));
    }

    /**
     * Update the specified resource in storage.
     *
//     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //  dd($request->all());
        $user = User::find($id);
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->tel1 = $request->input('tel1');
        $user->tel2 = $request->input('tel2');
        $user->idFonction = $request->input('idFonction');
        $user->idDepot = $request->input('iddepot');
        $user->adresse = $request->input('address');
        $user->datenaissance = $request->input('dateN');
        $user->lieunaissance = $request->input('lieuN');
        $user->save();

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('success','record Deleted');
    }
}

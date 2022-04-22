<?php

namespace App\Http\Controllers;

use App\Famille;
use App\Medicament;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MedicamentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function index()
    {
        if ((auth()->user()->idFonction !== 2) && (auth()->user()->idFonction !== 1)){
            return redirect()->route('home');
        }
        if (request()->ajax()){
       $medicaments =  Medicament::with('famille')->get();
         //dd($medicaments);
            return DataTables::of($medicaments)->addColumn('edit', function($medicaments){
                $button = '<a href="/medicaments/'.$medicaments->id.'/edit" class="btn btn-sm btn-success">
                          <i class="fa fa-pen"></i>
                        </a>';
                return $button;
            })->addColumn('delete', function($medicaments){

                $button = '<button type="button" name="delete" id="'.$medicaments->id.'" class="delete btn btn-danger btn-sm">
            <i class="fa fa-trash"></i>   </button>';

                return $button;
            })
                ->rawColumns(['edit','delete'])
                ->make(true);

        }


       return view('medicaments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familles = Famille::all();
        return view('medicaments.create')->with('familles',$familles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nom'=>'required','string',
            'prixAchat'=>'required','numeric',
            'prixVente'=>'required','numeric',
            'familles'=>'required',
            'etat'=>'numeric',
            'pourcentage'=>'required','numeric','between:1,100',
            'seuil'=>'numeric',
        ]);
      $medicaments = new Medicament();
        $medicaments->nom = $request->input('nom');
        $medicaments->prixAchat = $request->input('prixAchat');
        $medicaments->prixVente = $request->input('prixVente');
        $medicaments->idfamille = $request->input('familles');
        $medicaments->etat = $request->input('etat');
        $medicaments->pourcentage = $request->input('pourcentage');
        $medicaments->seuil = $request->input('seuil');
        $medicaments->save();
        return redirect('/medicaments')->with('success','médicaments insereé');
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
        $medicament = Medicament::find($id);
          $idFamille = $medicament->idfamille;
        $familles = Famille::all();

       $familleNom= Famille::where('id',$idFamille)->get();

        return  view('medicaments.edit')->with('medicament',$medicament)
        ->with('familles',$familles)->with('familleNom',$familleNom);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nom'=>'required','string',
            'prixAchat'=>'required','numeric',
            'prixVente'=>'required','numeric',
            'familles'=>'required',
            'etat'=>'numeric',
            'pourcentage'=>'required|min:1|max:100|integer',
            'seuil'=>'numeric',
        ]);
        $medicaments = Medicament::find($id);
        $medicaments->nom=$request->input('nom');
        $medicaments->prixAchat=$request->input('prixAchat');
        $medicaments->prixVente= $request->input('prixVente');
        $medicaments->idfamille= $request->input('familles');
        $medicaments->etat= $request->input('etat');
        $medicaments->pourcentage = $request->input('pourcentage');
        $medicaments->seuil= $request->input('seuil');
        $medicaments->save();
        return redirect('/medicaments')->with('success','médicaments modifieé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicaments = Medicament::find($id);
        $medicaments->delete();
        return redirect('/medicaments')->with('success','médicaments supprimeé');
    }
}

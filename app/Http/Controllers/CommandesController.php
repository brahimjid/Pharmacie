<?php

namespace App\Http\Controllers;

use App\Commande;
use App\CommandeItem;
use App\Fournisseur;
use App\Medicament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('index');
        $commandes = Commande::orderBy('id','desc');
        if (request()->ajax()){
            return DataTables::of($commandes)->addColumn('edit', function($commandes){
                $button = '<a href="/commandes/'.$commandes->id.'" class="btn btn-sm btn-primary" target="_blank">
                          <i class="fa fa-eye"></i>
                        </a>';
                return $button;
            })->addColumn('delete', function($commandes){

                $button = '<button type="button" name="delete" id="'.$commandes->id.'" class="delete btn btn-danger btn-sm" >
            <i class="fa fa-trash"></i>   </button>';

                return $button;
            })->addColumn('convert', function($commandes){
                $button = '<a href="/commandes/transfer/'.$commandes->id.'" class="btn btn-success btn-sm" target="_blank">
                          <i class="fa fa-sign-in-alt"></i>
                        </a>';
                return $button;

//                $button = '<a type="button" name="transfer" id="'.$commandes->id.'" class=" btn btn-success btn-sm"
//                                      href="/commandes/transfer/ " >
//            <i class="fa fa-arrow-right"></i>   </a>';

            })
                ->rawColumns(['edit','delete','convert'])
                ->make(true);
        }

        return view('commande.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->ajax()){
            $medicaments = Medicament::orderBy('id','desc');
            return DataTables::of($medicaments)
                ->addColumn('add', function ()
                {
                    //'<inp type="date" id="dateprt"'
                    return "<button class='btn btn-primary  btn-sm d-inline add_med_to_stock_btn' >
                               <i class='fas fa-plus'></i>
                             </button>";
                })->addColumn('qte','<input type="number" class="form-control" min="1" id="quantite_input" oninput="validity.valid||(value=\'\');">')
                ->rawColumns
                (['add'=>'add','qte'=>'qte'])
                ->make(true);
        }
        $fournisseurs = Fournisseur::all();
        return view('commande.create', compact( 'fournisseurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $this->validate($request, [
            'montant' => 'required',
            'fournisseurs' => 'required',
            'prix_achat' => 'required',
            'Qte' => 'required',
            'pT' => 'required',
        ]);
        $commandes = new Commande();
        $commandes->date = date('Y-m-d H:i:s');
        $commandes->montant         = $request->montant;
        $commandes->idFournisseur   = $request->fournisseurs;
        $commandes->typecommande            = 1;
        $commandes->idDepot         =  auth()->user()->idDepot;
        $commandes->save();
        if ($commandes){
            $values = $request->all();
            for ($i = 0; $i < count($request->med_id); $i++){
                $commandeItem = new CommandeItem();
                $commandeItem->prix = $request->prix_achat[$i];
                $commandeItem->idMedicament = $request->med_id[$i];
                $commandeItem->idcommande = $commandes->id;
                $commandeItem->quantite = $request->Qte[$i];
                $commandeItem->prixtotal = $request->pT[$i];
                $commandeItem->stockactuel = 2;
                $commandeItem->save();

            }
        }
        $fournisseur = Fournisseur::find($commandes->idFournisseur);
        return view('commande.print',compact('values','commandes',"fournisseur"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
    }

    public function toEntree($id){
           $commande = Commande::find($id);

           $commandeItems = CommandeItem::where('idcommande',$commande->id)->get();
           $fournisseur = Fournisseur::find($commande->idFournisseur);
           return view('commande.transfer',compact('fournisseur','commandeItems','commande'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy($id)
    {
        Commande::find($id)->delete();
        return redirect()->back();
    }
}

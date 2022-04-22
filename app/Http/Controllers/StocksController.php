<?php

namespace App\Http\Controllers;


use App\Depot;
use App\Fournisseur;
use App\Invoice;
use App\Medicament;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class StocksController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        if ((auth()->user()->idFonction !== 2) && (auth()->user()->idFonction !== 1)){
            return redirect()->route('home');
        }
        if (request()->ajax()){
            $depot = request()->get('depot');

        $medicaments = DB::select('SELECT medicaments.nom,stock.prixAchat,stock.prixVente,
                                                stock.date,stock.datePeremption,stock.quantite,stock.id ,
                                                stock.idMedicament,stock.prixVente
                                                from    medicaments,stock
                                                             WHERE
                                                    medicaments.id = stock.idMedicament And stock.idDepot = ?',[$depot]);

        return DataTables::of($medicaments)->addColumn('action', function ($medicaments)
        {
            return '<a href="/stocks/'.$medicaments->id.'/edit" class="btn btn-sm btn-success">
                            <i class="fa fa-pen"></i></a>';
        })->make(true);

        }

        $depots = Depot::all();
 return view('stocks.index',compact('depots'));
 }
//
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
                    return "<button class='btn btn-primary ml-2 btn-sm d-inline add_med_to_stock_btn' >
                               <i class='fas fa-plus'></i>
                             </button>";
                })->addColumn('new_prix','<input type="number" class="form-control" id="new_prix_input" oninput="validity.valid||(value=\'\');">')
                ->addColumn('qte','<input type="number"  class="form-control" min="1" id="quantite_input" oninput="validity.valid||(value=\'\');">')
                ->addColumn('dateP','<input type="date" class="form-control" id="date_peremption_input">')
                ->rawColumns
                (['add'=>'add','new_prix'=>'new_prix','qte'=>'qte','dateP'=>'dateP'])
                ->make(true);
        }
        $fournisseurs = Fournisseur::all();
        return view('stocks.create', compact( 'fournisseurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock  = Stock::find($id);

        return view('stocks.edit',compact('stock'));
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
          $stock = Stock::find($id);
          $stock->prixAchat = $request->input('prixAchat');
          $stock->prixVente = $request->input('prixVente');
          $stock->save();
        return redirect('/stocks')->with('success','record updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);
        $stock->delete();

        return redirect ('/stocks')->with('success','stock deleted');
    }
    // create stock sortir
    public function StockSortir(){

        if (request()->ajax()){
            $medicaments = DB::select(' SELECT medicaments.nom,stock.prixVente
                                                ,stock.quantite,
                                                stock.idMedicament,
                                                        stock.datePeremption
                                                from medicaments,stock
                                                WHERE
                                                      medicaments.id = stock.idMedicament AND stock.quantite > 0 AND idDepot = 2');

            return DataTables::of($medicaments)
                ->addColumn('add', function ($me)
                {

                    return "<button data-date='$me->datePeremption' class='btn btn-primary ml-2 btn-sm d-inline add_med_to_stock_btn'><i class='fas fa-plus'></i> </button>";
                })->addColumn('qte','<input type="number" class="form-control" min="1" id="quantite_input" oninput="validity.valid||(value=\'\');">')->rawColumns
                (['add'=>'add','qt'=>'qte'])
                ->make(true);

        }
        $depots =  Depot::all();
        return view('Facture.createsortir',compact('depots'));

    }
//

    public function indexSortir()
    {
        if (request()->ajax()){

            $invoices = Invoice::where('idtypefacture','1');
            return DataTables::of($invoices)->addColumn('print', function ($invoices) {
                $button = '<a href="/invoices/sortir/' . $invoices->id . '" class="btn btn-sm btn-success" target="_blank">
                          <i class="fa fa-print"></i>
                        </a>';
                return $button;
            })->addColumn('delete', function ($invoices) {
                $button = '<button type="button" name="delete" id="' . $invoices->id . '" class="delete btn btn-danger btn-sm">
            <i class="fa fa-trash"></i> </button>';
                return $button;
            })
                ->rawColumns(['print', 'delete'])
                ->make(true);

        }
        return view('Facture.indexSortir');
    }
}

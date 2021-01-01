<?php

namespace App\Http\Controllers;

use App\Depot;
use App\Invoice;
use App\InvoiceItem;
use App\Medicament;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class InvoicesController extends Controller
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
     * @return Response
     */
    public function index()
    {
        if ((auth()->user()->idfonction !== 1)) {
            return redirect()->route('home');
        }
        if (request()->ajax()) {
            $invoices = Invoice::where('idtypefacture', '2');
            return DataTables::of($invoices)->addColumn('print', function ($invoices) {
                $button = '<a href="/invoices/' . $invoices->id . '" class="btn btn-sm btn-success" target="_blank">
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
        return view('Facture.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {

        //dd($request->all());

        $typeFacture = $request->get('type-facture');
        $values = $request->all();

        if ($typeFacture == 'entree') {
            $this->validate($request, [
                'dateFacture' => 'required', 'date',
                'montant' => 'required',
                'fournisseurs' => 'required',
                'numerofacture' => 'required',
                'prix_achat' => 'required',
                'Qte' => 'required',
                'pT' => 'required',
            ]);

            $invoice = new Invoice();
            $dateF = $request->input('dateFacture');
            $montantT = $request->input('montant');
            $fournisseur = $request->input('fournisseurs');
            $numFacture = $request->input('numerofacture');
            $invoice->date = $dateF;
            $invoice->montant = $montantT;
            $invoice->idtypefacture = 2;
            $invoice->idservice = 3;
            $invoice->idfournisseur = $fournisseur;
            $invoice->idpersonnel = auth()->user()->id;
            $invoice->numerofactureachat = $numFacture;
            $invoice->numfacture = 'E/00' . date('d') . '/' . date('y');
            $invoice->save();
            $inserted = '';
            $fourn_nom = DB::table('fournisseur')->where('id', $fournisseur)->value('nom');;

            if ($invoice) {
                $prix = $request->get('prix_achat');
                $med_id = $request->get('med_id');
                $qte = $request->get('Qte');
                $pT = $request->get('pT');
                $date_per = $request->get('date_per');
                $med_pour = $request->get('med_pour');


                for ($i = 0; $i < count($med_id); $i++) {
                    $data = array(
                        'idfactrue' => $invoice->id,
                        'idmedicament' => $med_id[$i],
                        'prix' => $prix[$i],
                        'quantite' => $qte[$i],
                        'prixtotal' => $pT[$i],
                        'dateperemption' => $date_per[$i]

                    );
                    $update_montantT = DB::table('stock')->where('idmedicament', $med_id[$i])->value('prixachat');
                    if (Stock::where('idmedicament', $med_id[$i])->exists()) {

                        $stock_id = DB::table('stock')->where('idmedicament', $med_id[$i])->value('id');
                        DB::update('update stock set quantite = quantite  + ' . $qte[$i] . ' where id = ?', [$stock_id]);
                        DB::update('update stock set montantT = quantite  * ' . $update_montantT . ' where id = ?', [$stock_id]);
                        $getMed = Medicament::find($med_id[$i]);
                        if ($getMed->prixachat != $prix[$i]) {
                            $getMed->prixachat = $prix[$i];
                            $getMed->prixvente = ($prix[$i] + $prix[$i] * $getMed->pourcentage / 100);
                            $getMed->save();
                            DB::update("update stock set prixachat = $prix[$i], prixvente = ($prix[$i] + $prix[$i] * $getMed->pourcentage / 100) where id = ? AND idmedicament = $getMed->id ", [$stock_id]);
                            //  DB::update(" update stock set prixVente = (($prix[$i] * $prix[$i] /100)) where id = ?  AND idmedicament = $getMed->id ", [$stock_id]);

                        }
                    } else {
                        $stock_data = array(
                            'idmedicament' => $med_id[$i],
                            'prixachat' => $prix[$i],
                            'quantite' => $qte[$i],
                            'dateperemption' => $date_per[$i],
                            'date' => $dateF,
                            'iddepot' => 2,
                            'prixvente' => ($prix[$i] + ($prix[$i] * $med_pour[$i] / 100)),
                            'montantt' => ($prix[$i] * $qte[$i])

                        );
                        Stock::insert($stock_data);
                    }

                    $inserted = InvoiceItem::insert($data);
                }
                if ($inserted) {

                    return view('Facture.print', compact('values', 'dateF',
                        'montantT', 'fourn_nom', 'numFacture'));
                } else
                    return redirect('/stocks/create');
//

            }

        }
        // ******    SORTIR         ***************

        else {
            $this->validate($request, [
                'montant' => 'required',
                'depot' => 'required',
                'Qte' => 'required',
                'prix_achat' => 'required',
                'pT' => 'required',
            ]);
            $invoice = new Invoice();
            $montantT = $request->input('montant');
            $invoice->date = date('Y-m-d');
            $invoice->montant = $montantT;
            $invoice->idtypefacture = 1;
            $invoice->idservice = 3;
            $invoice->idpersonnel = auth()->user()->id;
            $invoice->numfacture = 'S/00' . date('d') . '/' . date('y');
            $invoice->save();
            $inserted = '';
            $depot_id = $request->input('depot');

            if ($invoice) {
                $prix = $request->get('prix_achat');
                $med_id = $request->get('med_id');
                $qte = $request->get('Qte');
                $pT = $request->get('pT');
                $date_per = $request->get('date_per');
                $med_pour = $request->get('med_pour');


                for ($i = 0; $i < count($med_id); $i++) {
                    $data = array(
                        'idfactrue' => $invoice->id,
                        'idmedicament' => $med_id[$i],
                        'prix' => $prix[$i],
                        'quantite' => $qte[$i],
                        'prixtotal' => $pT[$i]
                    );
                    $update_montantT = DB::table('stock')->where('idmedicament', $med_id[$i])->value('prixachat');
                    $stock_id = DB::table('stock')->where('idmedicament', $med_id[$i])->value('id');
                    if (Stock::where([['idmedicament', '=', $med_id[$i]], ['iddepot', $depot_id]])->exists()) {

                        DB::update('update stock set quantite = quantite  + ' . $qte[$i] . ' where id = ? And iddepot = ? ', [$stock_id, $depot_id]);
                        DB::update('update stock set montantT = quantite  * ' . $update_montantT . ' where id = ? And iddepot = ? ', [$stock_id, $depot_id]);
                        DB::update("update stock set quantite = quantite  -   $qte[$i]  where idmedicament = $med_id[$i] and iddepot = 2 ");
                        DB::update('update stock set montantT = quantite  * ' . $update_montantT . ' where id = ? and iddepot = 2', [$stock_id]);
                    }

                    else {
                        $stock_data = array(
                            'idmedicament' => $med_id[$i],
                            'prixachat' => $prix[$i],
                            'quantite' => $qte[$i],
                            'dateperemption' => $date_per[$i],
                            'date' => date('Y-m-d'),
                            'iddepot' => $depot_id,
                            'prixvente' => ($prix[$i] + ($prix[$i] * $med_pour[$i] / 100)),
                            'montantt' => ($prix[$i] * $qte[$i])


                        );

                        $check_insertion =  Stock::insert($stock_data);
                        if ($check_insertion){
                            InvoiceItem::insert($data);
                            DB::update("update stock set quantite = quantite  -   $qte[$i]  where idmedicament = $med_id[$i] and iddepot = 2 ");


                        }
                    }

                }
                $values = $request->all();
                $depot = Depot::find($values['depot']);
                // dd($depot);
                return view('Facture.printSortir', compact('values', 'depot'));


            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //dd("Facture entree print");
        $invoice = Invoice::find($id);


        $items = DB::select('SELECT facture.montant , facture.date ,medicaments.nom ,elementsfacture.prixtotal,
                                          elementsfacture.quantite,medicaments.prixachat
                                  FROM    facture,elementsfacture,medicaments
                                  WHERE   facture.id =  elementsfacture.idFactrue
                                 AND     elementsfacture.idmedicament = medicaments.id
                                and        facture.id = ?', [$id]);

        return view('Facture.printentree', compact('items', 'invoice'));

    }

    public function showSortir($id)
    {

        $invoice = Invoice::find($id);


        $items = DB::select('
                SELECT facture.montant , facture.date ,medicaments.nom ,medicaments.id, elementsfacture.prixtotal,
                       elementsfacture.quantite,stock.prixVente
                FROM facture,elementsfacture,medicaments,stock
                WHERE facture.id = elementsfacture.idFactrue
                  AND  elementsfacture.idmedicament = medicaments.id
                  AND stock.idmedicament = medicaments.id
                  AND stock.datePeremption is null AND
                  facture.id = ?
                group BY medicaments.id',[$id]);

        return view('Facture.showSortir', compact('items', 'invoice'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect('invoices/')->with('success', 'Facture Deleted');
    }


}

<?php

namespace App\Http\Controllers;

use App\Recu;
use App\RecuItem;
use App\Sessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RecuController extends Controller
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
        if ((auth()->user()->idFonction !== 3) && (auth()->user()->idFonction !== 1)){
            return redirect()->route('home');
        }
        if (request()->ajax()){
            $from_date = request()->get('first_date');
            $add_one_day = strtotime("1 day", strtotime(request()->get('second_date')));
             $to_date = date('Y-m-d',$add_one_day);
            if (!empty($from_date) && !empty($to_date)){
                $recu =  Recu::whereBetween('date', [$from_date, $to_date])->get();
            }

            else{
                $recu = Recu::all();
            }
            return DataTables::of($recu)->setRowClass(function ($recu){
                return $recu->annulation == 1 ? 'alert alert-danger':'';
            })->addColumn('annuler', function($recu){
                $button = '<button type="button" name="annuler" id="'.$recu->id.'" class="cancel-btn btn btn-warning btn-sm">
            <i class="fa fa-times"></i> </button>';
                return $button;
            })->addColumn('elements', function($recu){
                $button = '<a href="/recu/'.$recu->id.'" target="_blank" class="btn btn-sm btn-primary">
                          <i class="fa fa-eye"></i>
                        </a>';
                return $button;
            })
                ->rawColumns(['annuler','elements'])
                ->make(true);
        }
        return view('Recu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Sessions::where('etat','ouvert')->exists()){
               $session = new Sessions();
               $session->dateouverture = date('Y-m-d H:i:s');
               $session->etat = 'ouvert';
               $session->idcaissier = auth()->user()->id;
               $session->datefermeture = null;
               $session->verser = 0;
               $session->idpersonnel =auth()->user()->id;
               $session->save();
        }


      if (request()->ajax()){
            $medicaments =DB::select('SELECT medicaments.nom ,stock.prixVente
                                                ,stock.quantite,
                                                stock.idMedicament,
                                                medicaments.pourcentage
                                                from medicaments,stock
                                                WHERE
                                                      medicaments.id = stock.idMedicament AND stock.quantite > 0 AND idDepot = ?',[auth()->user()->idDepot]);

            return DataTables::of($medicaments)
                ->addColumn('add', function ()
                {
                    return "<button class='btn btn-primary ml-2 btn-sm d-inline add_med_to_stock_btn'><i class='fas fa-plus'></i> </button>";
                })->addColumn('qte','<input type="number" class="form-control" min="1" id="quantite_input" oninput="validity.valid||(value=\'\');">')->rawColumns
                (['add'=>'add','qt'=>'qte'])
                ->make(true);
        }

        $session_id = DB::table('session')->latest('id')->where('etat','ouvert')->value('id');
     // dd($session_id);
      $session_montant = DB::table('recu')
          ->where([['idSession',$session_id],['annulation',0]] )
          ->sum('montant');
        return view('Recu.create',compact('session_montant','session_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          //dd($request->all());
        $idSession = DB::table('session')->latest('id')->value('id');
       // dd($idSession);
        $values = $request->all();
       $recu = new Recu();
        $recu->montant = $request->input('montant');
        $recu->date = date('Y-m-d H:i:s');
        $recu->idSession = $idSession;
        $recu->annulation = 0;
        $recu->nomprenompatient = $request->input('nom_patient');
        $recu->idmodepaiement  = 1;
        $recu->numpatient  = $request->input('num_patient');
        $recu->etatpaye = 0;
        $recu->datepaiement = date('Y-m-d H:i:s');
        $recu->save();
        $success = '';
          if ($recu){
              $prix = $request->get('prix_achat');
              $med_id = $request->get('med_id');
              $qte = $request->get('Qte');
              $pT = $request->get('pT');
              $med_pour = $request->get('med_pour');
          for ($i = 0; $i < count($med_id); $i++){
              $elementRecu = array(
                  'date' => date('Y-m-d'),
                  'idMedicament' => $med_id[$i],
                  'idrecu' =>  $recu->id,
                  'prix' => $prix[$i],
                  'quantite' => $qte[$i],
                  'prixtotal' => $pT[$i],
                  'pourcentage' => $med_pour[$i]
                   );
              DB::update('update stock set quantite = quantite  - ' . $qte[$i] . ' where idMedicament = ? And idDepot = ?', [$med_id[$i],Auth()->user()->idDepot]);
               $success = RecuItem::insert($elementRecu);
            }

          if ($success)
              $montantT = $request->input('montant');
              $dateRecu = date('d-m-Y H:i:s');
              $patient_nom = $request->input('nom_patient');
              $numPatient = $request->input('num_patient');
            $recuId = $recu->id;
              return view('Recu.print', compact('values', 'dateRecu',
                  'montantT', 'patient_nom', 'numPatient','recuId'));


          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Recu::find($id);
        $elements = DB::select('SELECT recu.date ,recu.id, medicaments.nom,elementsrecu.quantite,elementsrecu.prix,elementsrecu.prixtotal,recu.montant
                                    FROM `recu`,medicaments,elementsrecu
                                    WHERE medicaments.id = elementsrecu.idMedicament and elementsrecu.idRecu = recu.id
                                      and recu.id = ?',[$id]);
        return view('Recu.show',compact('elements','detail'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recu = Recu::find($id);
        $recu->delete();
        return redirect('/recu')->with('success','record Deleted');
    }


    public function annuler($id)
    {
        $med_info = DB::select('Select idMedicament,quantite from elementsrecu where idRecu = ?',[$id]);
                   //dd($med_info);


             for ($i = 0; $i < count($med_info); $i++) {
                 $update_stock = DB::update('update stock set quantite = quantite + ' . $med_info[$i] ->quantite.
                     ' where  idMedicament = ' . $med_info[$i] ->idMedicament . ' And idDepot = ' . auth()->user()->idDepot);
             }
             //dd($med_info);
             $recu = Recu::find($id);
             $recu->annulation=1;
             $recu->save();
             echo 'success';


    }

}

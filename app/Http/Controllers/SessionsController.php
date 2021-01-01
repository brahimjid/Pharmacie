<?php

namespace App\Http\Controllers;

use App\Sessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SessionsController extends Controller
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
        if (request()->ajax()){
            $from_date = request()->get('first_date');
            $add_one_day = strtotime("1 day", strtotime(request()->get('second_date')));
            $to_date = date('Y-m-d',$add_one_day);
            if (!empty($from_date) && !empty($to_date)){
                $sessions =   DB::select(" SELECT concat(users.nom ,' ',users.prenom) as fullName ,session.id ,
                                                SUM(recu.montant) as montant ,session.dateOuverture,session.dateFermeture
                                                FROM session,recu,users
                                                WHERE session.id = recu.idSession
                                                AND session.idCaissier = users.id and recu.annulation=0
                                                and dateOuverture >=$from_date
                                                AND  dateOuverture <=$to_date
                                                GROUP BY recu.idSession, ");
                //$sessions =  Sessions::whereBetween('dateOuverture', [$from_date, $to_date])->get();
            }

            else{
                $sessions =  DB::select(" SELECT concat(users.nom ,' ',users.prenom) as fullName ,
                                                           recu.idSession,
                                              session.id ,
                                                SUM(recu.montant) as montant ,session.dateOuverture,session.dateFermeture
                                                FROM session,recu,users
                                                WHERE session.id = recu.idSession
                                                AND session.idCaissier = users.id and recu.annulation=0
                                                GROUP BY recu.idSession,users.nom,users.prenom,
                                                         session.id,session.dateOuverture,session.dateFermeture");
            }
            return DataTables::of($sessions)->addColumn('action', function($sessions){
                $button = '<a href="/session/'.$sessions->id.'/edit" class="btn btn-sm btn-success">
                          <i class="fa fa-eye"></i>
                        </a>';

                return $button;
            })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('session.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $session = Sessions::find($id);
        $session->delete();
        return redirect('/session')->with('success','session supprimeé');
    }

    public function closeSession(){

        $session_id = DB::table('session')->latest('id')->value('id');
        $session = Sessions::find($session_id);
        $session->etat  ='Fermée' ;
        $session->datefermeture  =date('Y-m-d H:i:s');
        $session->save();
        return redirect()->route('recu.index');


    }
}

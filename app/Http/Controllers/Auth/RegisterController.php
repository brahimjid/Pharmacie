<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255','min:5'],
            'prenom' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
            'tel1' => ['numeric'],
            'tel2' => ['numeric'],
            'etat' => ['required'],
            'idFonction' => ['required'],
            'iddepot'  => ['required'],
            'idgroupe'  => ['required'],
            'address' => ['string'],
            'lieuN'   => ['string'],
            'dateN' => ['date'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
            //idFonction
            //tel1
            //tel2
            //lieuNaissance
            //dateNaissance
            //adresse
            //idGroupe
            //etat
            //idDepot
        return User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'username' => $data['username'],
            'email' => $data['email'],
            'tel1' => $data['tel1'],
            'tel2' => $data['tel2'],
            'etat' => $data['etat'],
            'idFonction' => $data['idFonction'],
            'idGroupe' => $data['idgroupe'],
            'idDepot' => $data['iddepot'],
            'adresse' => $data['address'],
            'dateNaissance' => $data['dateN'],
            'lieuNaissance' => $data['lieuN'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

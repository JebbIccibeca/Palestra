<?php

namespace App\Http\Controllers;

use App\Models\abbonamento;
use App\Models\Acquisti;
use App\Models\Upload;
use App\Models\carrello;
use App\Models\Uploadistr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Auth;
use Inventario;
use Session;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            $combatti=Upload::select()->where( 'tipo', 'like', '%' . 'combattimento' . '%')->get();

            $user = Auth::user('id');
            $corsi =  Uploadistr::join('corsi', 'istruttori.id_istr', '=', 'corsi.istruttore')->paginate(8);

            return view('corsi',['combatti'=>$combatti],['corsi'=>$corsi]);

        } elseif (Auth::user()->hasRole('admin')) {


            $array =  array();
            $array['nacquisti'] = acquisti::select()->count();
            $array['nuser'] = User::select()->count();
            $array['user'] = User::select()->get();
            $array['nistruttori'] = Uploadistr::select()->count();
            $array['istruttori'] = Uploadistr::select()->get();
            $array['ncorsi'] = Upload::select()->count();
            $array['nistruttori'] = Uploadistr::select()->count();
            $array['ncarrello'] = carrello::select()->count();
            $array['acquisti'] =  Acquisti::join('corsi', 'acquisti.id_corsi', '=', 'corsi.id_cors')->join('users', 'acquisti.id_utente', '=', 'users.id')->get();
            $array['corsirecenti'] = Upload::select()->orderBy('id_cors', 'desc')->get();
            $array['nabbonati'] = abbonamento::select()->count();
            $array['ncorsifine'] = Upload::select()->where('nmax', '=', 'niscr')->get();
            return view('admin.upload',compact("array"));



        } elseif (Auth::user()->hasRole('istruttore')) {
            $array = array();
            $name = Auth::user()->name;
            $istruttore = Uploadistr::select()->where('nome_istr','=', $name)->get();
            $array['utenti'] =  Acquisti::join('corsi', 'acquisti.id_corsi', '=', 'corsi.id_cors')->join('istruttori', 'corsi.istruttore', '=', 'istruttori.id_istr')->get();
            $array['corsi'] = Upload::Select()->where('istruttore','=',$istruttore[0]->id_istr)->get();

            return view('istruttore.istruttore',['istruttore'=>$istruttore],compact("array"));
        }
    }

    public function miei(){
        $array = array();
        $name = Auth::user()->name;
        $istruttore = Uploadistr::select()->where('nome_istr','=', $name)->get();
        $array['allievi'] =  Acquisti::join('corsi', 'acquisti.id_corsi', '=', 'corsi.id_cors')->join('users', 'acquisti.id_utente', '=', 'users.id')->where('corsi.istruttore','=',$istruttore[0]->id_istr)->get();
        return view('istruttore.miei',['istruttore'=>$istruttore],compact("array"));
    }

    public function dashboard() {

        $combatti=Upload::select()->where( 'tipo', 'like', '%' . 'combattimento' . '%')->get();

        $user = Auth::user('id');
        $corsi =  Uploadistr::join('corsi', 'istruttori.id_istr', '=', 'corsi.istruttore')->paginate(8);

        return view('corsi',['combatti'=>$combatti],['corsi'=>$corsi]);

    }

    public function addToCart(Request $req){

        $cart= new carrello;
        $user = Auth::user()->id;
        $ce = carrello::where('id_corso', '=', $req->product_id)->where('id_utente','=',$user)->first();
        if ($ce === null) {
            $cart->id_utente=Auth::user()['id'] ;
            $cart->id_corso=$req->product_id;
            $cart->save();
            return redirect('/dashboard')->with('ce', 'Corso aggiunto al carrello');
        }else{
            return redirect('/dashboard')->with('cegia', 'Corso già presente nel carrello!');
        }
    }

    public function carrello(){
        $user = Auth::user()->id;
        $cart =  carrello::join('corsi', 'carrello.id_corso', '=', 'corsi.id_cors')->where('carrello.id_utente','=', $user)->get();
        $nome =  Acquisti::join('corsi', 'acquisti.id_corsi', '=', 'corsi.id_cors')->where('acquisti.id_utente','=', $user)->get();
        $nome = $nome->unique('nome');

        return view('/carrello',['carrello'=>$cart],['nome'=>$nome]);
    }


    public function compra(Request $req){
        $user = Auth::user()['id'];
        $carrello = carrello::all();
        $now = Carbon::now();
        $scade = Carbon::now()->addMonth();
        $acquista = [];
        $ce =  Acquisti::join('carrello', 'acquisti.id_corsi', '=', 'carrello.id_corso')->where('acquisti.id_utente','=', $user)->get();

        $corsi = Upload::select()->get();
        $check = Upload::join('carrello', 'corsi.id_cors', '=', 'carrello.id_corso')->where('carrello.id_utente','=', $user)->get();
        if ($ce == '[]') {
            foreach($check as $item){
                if($item['nmax'] == $item['niscr'] or $item['nmax'] <= $item['niscr']){
                    $cart =  carrello::join('corsi', 'carrello.id_corso', '=', 'corsi.id_cors')->where('carrello.id_utente','=', $user)->get();
                    $nome =  Acquisti::join('corsi', 'acquisti.id_corsi', '=', 'corsi.id_cors')->where('acquisti.id_utente','=', $user)->get();
                    return redirect('/carrello')->with('pieno', $item['nome']);
                }
            }
            foreach ($carrello as $req) {
                Upload::select('nmax')->where('id_cors','=',$req['id_corso'])->increment('niscr');
                $acquista[] = [ 'id_corsi' => $req['id_corso'] ,'scade'=>$scade,'id_utente' => $user, 'created_at' => $now , 'updated_at' => $now];
            }

            Acquisti::insert($acquista);
            carrello::truncate();
            return redirect('/carrello')->with('successo', 'Acquisto avvenuto con successo.');

        }else{
            return redirect('/carrello')->with('errore', 'Eliminare dal carrello i seguenti corsi: ');
        }
    }

    public function deletecart($id)
    {
        carrello::where('id_cart','=',$id)->delete();
        $data=carrello::all();
        return redirect('/carrello');
    }

    public function abbonato()
    {
        $user = Auth::user()['id'];
        //$abbon = abbonamento::join('users', 'abbonamenti.id_utente', '=', 'users.id')->get();

        $abbon = abbonamento::select('id_utente')->where('abbonamenti.id_utente','=', $user)->get();
        if($abbon == '[]'){
            $abb= new abbonamento;
            $abb->id_utente = $user;
            $abb->save();
            return redirect('/abbonati')->with('abb', 'Abbonamento acquistato');
        }else{
            return redirect('/abbonati')->with('abbno', 'Abbonamento già acquistato');
        }


    }

    public function profilo()
    {
        $user = Auth::user()->id;
        $acquisti =  Acquisti::join('users', 'acquisti.id_utente', '=', 'users.id')->where('acquisti.id_utente','=', $user)->get();
        $count = $acquisti->count();
        return view('profile',['count'=>$count]);
    }

    public function edit(Request $req)
    {
        $data=User::find($req->id);
        $data->name=$req->name;
        $data->surname=$req->surname;
        $data->cf=$req->cf;

        $data->save();
        return redirect('/profilo')->with('fatto', 'Dati utente modificati.');
    }

    public function mycorsi()
    {
        $user = Auth::user()->id;

        $acquisti =  Acquisti::join('corsi', 'acquisti.id_corsi', '=', 'corsi.id_cors')->where('acquisti.id_utente','=', $user)->get();

        return view('mycorsi',['acquisto'=>$acquisti] );
    }

}


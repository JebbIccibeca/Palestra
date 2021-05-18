<?php

namespace App\Http\Controllers;

use App\Models\Acquisti;
use App\Models\Upload;
use App\Models\carrello;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Auth;
use Inventario;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {

            $data=Upload::all();

            $user = Auth::user()->id;

            $cart =  carrello::join('inventario', 'carrello.id_prodotto', '=', 'inventario.id')->where('carrello.id_utente','=', $user)->get();
            $count = carrello::count();

            return view('user.userdash',['film'=>$data],['carrello'=>$cart],['count'=>$count]);

        } elseif (Auth::user()->hasRole('admin')) {

            return view('admin.dashboard');
        }
    }
    public function calendario()
    {
        return view('admin.calendario');
    }

    public function addToCart(Request $req){
        $cart= new carrello;
        $cart->id_utente=Auth::user()['id'] ;
        $cart->id_prodotto=$req->product_id;
        $cart->save();
        return redirect('/dashboard');
    }

    public function deletecart($id)
    {
        carrello::where('id_cart','=',$id)->delete();
        $data=carrello::all();
        return redirect('/dashboard');
    }
    public function acquisti(){
        $user = Auth::user()->id;
        $acquisti =  Acquisti::join('inventario', 'acquisto.id_prodotto', '=', 'inventario.id')->where('acquisto.id_utente','=', $user)->get();

        return view('user.acquisti',['acquisto'=>$acquisti] );
    }
    public function compra(){

        $user = Auth::user()['id'];

        $carrello = carrello::all();

/*
        foreach ($carrello as $item) {
            $acquisto = new Acquisti();

            $acquisto->id_prodotto=$item['id_prodotto'];
            $acquisto->id_utente=$user;
            $acquisto->save();
            $acquisto = new Acquisti();
        }
        carrello::truncate();

        */



        $now = date('Y-m-d H:i:s');
        $acquista = [];


        foreach ($carrello as $reques) {
            $acquista[] = [ 'id_prodotto' => $reques['id_prodotto'] , 'id_utente' => $user, 'created_at' => $now , 'updated_at' => $now];
        }
        Acquisti::insert($acquista);
        carrello::truncate();
        return redirect('/dashboard')->with('successo', 'Acquisto avvenuto con successo.');
    }



}


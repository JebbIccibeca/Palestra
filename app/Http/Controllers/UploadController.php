<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\Uploadistr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function index()
    {
        $istr = Uploadistr::select('nome_istr', 'cognome','id_istr')->get();

        return view('admin.dashboard',['istruttori'=>$istr]);
    }
    public function index1()
    {
        return view('admin.uploadistr');
    }
    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'descrizione' => 'required',
            'tipo' => 'required',
            'durata' => 'required|min:0|max:100',
            'img' => 'required|mimes:jpeg|max:5048',
            'nmax' => 'required|min:0|max:100',
            'prezzo' => 'required|min:0|max:100',
            'istruttore' => 'required'
        ]);


        //$newImageName =  $request->img . '.' . $request->img->extension();

        $newImageName = $request->img->getClientOriginalName();

        $request->img->move(public_path('copertine'), $newImageName);

        $corsi = Upload::create([
            'nome' => $request->input('nome'),
            'descrizione' => $request->input('descrizione'),
            'durata' => $request->input('durata'),
            'tipo' => $request->input('tipo'),
            'image' => $newImageName,
            'nmax' => $request->input('nmax'),
            'niscr' => 0,
            'prezzo' => $request->input('prezzo'),
            'istruttore' => $request->istruttore
        ]);
        return redirect('upload')->with('success', 'Corso aggiunto.');

    }


    public function storeistr(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'cognome' => 'required',
            'nascita' => 'required',
            'cf' => 'required',
            'contratto' => 'required',
            'infocontatto' => 'required|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'
        ]);

        $istruttori = Uploadistr::create([
            'nome_istr' => $request->input('nome'),
            'cognome' => $request->input('cognome'),
            'nascita' => $request->input('nascita'),
            'cf' => $request->input('cf'),
            'contratto' => $request->input('contratto'),
            'infocontatto' => $request->input('infocontatto')
        ]);
        return redirect('uploadistr')->with('success', 'Istruttore aggiunto.');

    }
    //mostra
    public function corsi()
    {
        $array['upload'] = Upload::join('istruttori', 'corsi.istruttore', '=', 'istruttori.id_istr')->get();
        //$data = Upload::join('istruttori', 'corsi.istruttore', '=', 'istruttori.id_istr')->get();
        return view('admin.eliminacorsi',compact("array"));
    }
    //elimina
    public function eliminacorsi($id){
        $data=Upload::find($id);
        $data->delete();
        return redirect('eliminacorsi')->with('eliminato', 'Corso eliminato!');
    }
    //edit
    public function editcorsi($id_cors)
    {
        $array =  array();
        $array['data'] = Upload::join('istruttori', 'corsi.istruttore', '=', 'istruttori.id_istr')->get();
        $array['corsi'] = Upload::join('istruttori', 'corsi.istruttore', '=', 'istruttori.id_istr')->where('id_cors','=', $id_cors)->first();
        $array['istr'] = Uploadistr::select('nome_istr', 'cognome','id_istr')->get();
        $array['upload'] = Upload::join('istruttori', 'corsi.istruttore', '=', 'istruttori.id_istr')->get();

        return view('admin.editcorsi',compact("array"));
    }
    //modifica
    public function modifcorsi(Request $req)
    {
        $data = Upload::where('id_cors', '=' , $req->id)->first();
        $data->nome=$req->nome;
        $data->tipo=$req->tipo;
        $data->descrizione=$req->descrizione;
        $data->durata=$req->durata;
        $data->nmax=$req->nmax;
        $data->niscr=$req->niscr;
        $data->istruttore=$req->istruttore;
        $data->prezzo=$req->prezzo;
        $data->save();
        return redirect('eliminacorsi')->with('modificato', 'Corso modificato con successo!');
    }


    //mostra
    public function istruttori()
    {
        $data=Uploadistr::all();
        return view('admin.eliminaistr',['Upload'=>$data]);
    }
    //elimina
    public function eliminaistr($idd){
        $data = Uploadistr::find($idd);
        $data->delete();
        return redirect('eliminaistr')->with('eliminato', 'Istruttore eliminato!');
    }

    public function editistruttori($id_istr)
    {
        $data=Uploadistr::all();
        $istruttore = Uploadistr::select()->first();
        return view('admin.editistruttori',['istruttore'=>$istruttore],['Upload'=>$data]);
    }
    //modifica
    public function modifistr(Request $req)
    {
        $data = Uploadistr::where('id_istr', '=' , $req->id_istr)->first();
        $data->nome_istr=$req->nome_istr;
        $data->cognome=$req->cognome;
        $data->nascita=$req->nascita;
        $data->cf=$req->cf;
        $data->contratto=$req->contratto;
        $data->infocontatto=$req->infocontatto;
        $data->save();
        return redirect('eliminaistr')->with('modificato', 'Istruttore modificato con successo!');
    }

    //mostra
    public function utenti()
    {
        $data=User::all();
        return view('admin.eliminautent',['Upload'=>$data]);
    }
    //elimina
    public function eliminautent($id){
        $data = User::find($id);
        $data->delete();
        return redirect('eliminautent')->with('eliminato', 'Utente eliminato!');
    }
    public function editutenti($id_utent)
    {
        $data=User::all();
        $utente = User::select()->where('id', '=', $id_utent)->first();
        return view('admin.editutenti',['utente'=>$utente],['Upload'=>$data]);
    }
    //modifica
    public function modifutenti(Request $req)
    {
        $data = User::where('id', '=' , $req->id)->first();
        $data->name=$req->name;
        $data->surname=$req->surname;
        $data->cf=$req->cf;
        $data->email=$req->email;
        $data->save();
        return redirect('eliminautent')->with('modificato', 'Utente modificato con successo!');
    }


    public function galleria(){
        $copertine = Upload::select('image','nome')->get();
        return view('admin.galleria',['foto'=>$copertine]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Acquisti;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function index()
    {
        return view('admin.upload');
    }

    public function store(Request $request)
    {

        $request->validate([
            'titolo' => 'required',
            'data_uscita' => 'required',
            'img' => 'required|mimes:jpeg|max:5048',
            'protagonista' => 'required',
            'regista' => 'required',
            'etamin' => 'required|min:1|max:150',
            'stock' => 'required|min:0|max:100',
            'prezzo' => 'required|min:0|max:100'
        ]);


        //$newImageName =  $request->img . '.' . $request->img->extension();

        $newImageName = $request->img->getClientOriginalName();

        $request->img->move(public_path('copertine'), $newImageName);

        $film = Upload::create([
            'titolo' => $request->input('titolo'),
            'data_uscita' => $request->input('data_uscita'),
            'image' => $newImageName,
            'protagonista' => $request->input('protagonista'),
            'regista' => $request->input('regista'),
            'etamin' => $request->input('etamin'),
            'stock' => $request->input('stock'),
            'prezzo' => $request->input('prezzo')
        ]);
        return redirect('upload')->with('success', 'Film aggiunto.');

    }

    public function show()
    {
        $data=Upload::all();
        return view('admin.galleria',['film'=>$data]);
    }

    public function elimina()
    {
        $data=Upload::all();
        return view('admin.elimina',['Upload'=>$data]);
    }

    public function delete($id)
    {
        $del=Upload::find($id);
        $del->delete();
        $data=Upload::all();
        return view('admin.elimina',['Upload'=>$data]);
    }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BiodataMahasiswa;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateBiodata;
use DataTables;

class BiodataController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware("auth");
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = BiodataMahasiswa::all();
        return view("biodata.index", compact("mahasiswa"));
        //compact : proses parsing data dari controller ke view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // BiodataMahasiswa::create($request->all());

        // return redirect()->route("biodata.index");
        return view("biodata.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filePath = $request->file("photo")->store("public");

        BiodataMahasiswa::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'address' => $request->address,
            'photo' => $filePath
            ]); //menyimpan filePath yg didapatkan
        return redirect()->route("biodata.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = BiodataMahasiswa::find($id);
        return view("biodata.show", compact("data"));

        // //return view bukan return JSON
        // return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BiodataMahasiswa::find($id);
        return view("biodata.edit", compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBiodata  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBiodata $request, $id)
    {

        //nama nim alamat
        // $validation = Validator::make($request->all(), [
        //     "name" => "string|min:3|max:10|alpha",
        //     "nim" => "string|min:8",
        //     "alamat" => "string|min:10",
        // ]);

        // if ($validation->fails()) {
        //     return redirect()->back()->withErrors($validation)->withInput();
        // }

        BiodataMahasiswa::where("id", $id)->update($request->except("_token"));

        return redirect()->route("biodata.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BiodataMahasiswa::where("id", $id)->delete();
        return redirect()->route("biodata.index");
    }
}

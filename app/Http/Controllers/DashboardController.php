<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PythonController;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use App\Models\Gambar;

class DashboardController extends Controller
{
    protected $detek;
    public function __construct(PythonController $detek)
    {
        $this->detek =$detek;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detek = $this->detek->index();
       // dd($detek);
        return view('dashboard', compact('detek'));
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
        //
    }

// public function upload(){
//     $gambar = Gambar::get();
//     return view('dashboard',['gambar' => $gambar]);
// }

public function proses_upload(Request $request){
	$this->validate($request, [
		'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		// 'keterangan' => 'required',
	]);
 
	// menyimpan data file yang diupload ke variabel $file
	$file = $request->file('file');
 
	$nama_file = time()."_".$file->getClientOriginalName();
 
    // isi dengan nama folder tempat kemana file diupload
	$tujuan_upload = 'data_file';
	$file->move($tujuan_upload,$nama_file);
 
 
	Gambar::create([
		'file' => $nama_file,
		// 'keterangan' => $request->keterangan,
	]);
 
	return redirect()->back();
}

}
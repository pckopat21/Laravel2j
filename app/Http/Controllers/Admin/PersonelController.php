<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$datalist = DB::table('personel')->get(); // bu kısım da bütün verileri çekmektedir
        $datalist = DB::select("SELECT * FROM personel WHERE personel_durum='1'");
        return view('admin.personel', ['datalist' => $datalist]);


        /* $dataunvan = DB::table('durum')
             ->get()
             ->where('durum_aktif','1');
         return  view('admin.personel',['dataunvan'=> $dataunvan]);*/
        //print_r($datalist);
        //exit();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $datalist = DB::table('personel')->get()->where('personel_durum', 1);
        return view('admin.personel', ['datalist' => $datalist]);
        //print_r($datalist);
        //exit();
    }

    /**
     * Insert Data
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        DB::table('personel')->insert([
            'personel_adsoyad' => $request->input('personel_adsoyad'),
            'personel_tc' => $request->input('personel_tc'),
            'personel_sicilno' => $request->input('personel_sicilno'),
            'personel_telefon' => $request->input('personel_telefon'),
            'unvan_id' => $request->input('unvan_id'),
            'personel_gorev' => $request->input('personel_gorev'),
            'personel_unvan' => $request->input('personel_unvan'),
            'personel_gorevyeri' => $request->input('personel_gorevyeri'),
            'personel_dogumtarihi' => $request->input('personel_dogumtarihi'),
            'personel_isegiristarih' => $request->input('personel_isegiristarih'),
            'personel_eposta' => $request->input('personel_eposta'),
            'personel_siralama' => $request->input('personel_siralama'),
            'personel_il' => $request->input('personel_il'),
            'personel_ilce' => $request->input('personel_ilce'),
            'personel_derece' => $request->input('personel_derece'),
            'personel_kademe' => $request->input('personel_kademe'),
            'personel_sozlesmelimi' => $request->input('personel_sozlesmelimi'),
            'personel_engellimi' => $request->input('personel_engellimi'),
            'personel_kan' => $request->input('personel_kan'),
            'personel_ogrenim' => $request->input('personel_ogrenim'),
            'personel_okul' => $request->input('personel_okul'),
            'personel_adres' => $request->input('personel_adres'),
            'personel_aciklama' => $request->input('personel_aciklama')


        ]);
        return redirect()->route('admin_personel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Personel $personel
     * @return \Illuminate\Http\Response
     */
    public function show(Personel $personel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Personel $personel
     * @return \Illuminate\Http\Response
     */
    public function edit(Personel $personel, $personel_id)
    {
        $data = Personel::find($personel_id);
        $datalist = DB::table('personel')->get()->where('personel_durum', 1);

        return view('admin.personel_edit', ['data' => $data, 'datalist' => $datalist]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Personel $personel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personel $personel, $id)
    {
        $data = Personel::find($id);
        $data->personel_adsoyad = $request->input('personel_adsoyad');
        $data->personel_tc = $request->input('personel_tc');
        $data->personel_sicilno = $request->input('personel_sicilno');
        $data->personel_telefon = $request->input('personel_telefon');
        $data->unvan_id = $request->input('unvan_id');
        $data->personel_gorev = $request->input('personel_gorev');
        $data->personel_unvan = $request->input('personel_unvan');
        $data->personel_gorevyeri = $request->input('personel_gorevyeri');
        $data->personel_dogumtarihi = $request->input('personel_dogumtarihi');
        $data->personel_isegiristarih = $request->input('personel_isegiristarih');
        $data->personel_eposta = $request->input('personel_eposta');
        $data->personel_siralama = $request->input('personel_siralama');
        $data->personel_il = $request->input('personel_il');
        $data->personel_ilce = $request->input('personel_ilce');
        $data->personel_derece = $request->input('personel_derece');
        $data->personel_kademe = $request->input('personel_kademe');
        $data->personel_sozlesmelimi = $request->input('personel_sozlesmelimi');
        $data->personel_engellimi = $request->input('personel_engellimi');
        $data->personel_kan = $request->input('personel_kan');
        $data->personel_ogrenim = $request->input('personel_ogrenim');
        $data->personel_okul = $request->input('personel_okul');
        $data->personel_adres = $request->input('personel_adres');
        $data->personel_aciklama = $request->input('personel_aciklama');
        $data->save();
        return redirect()->route('admin_personel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Personel $personel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personel $personel)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;

class HomeController extends Controller
{

    public function index()
    {
            $data ['nama']            = 'Sheryn Afifa Salsabila';
            $data ['username']        = 'Laravel 2 TI D';
            $data ['last_login']      = date('Y-m-d H:i:s');
            $data ['list_pendidikan'] = ['SD','SMP','SMA','S1','S2','S3'];									    
            return view('home', $data );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

    }
}

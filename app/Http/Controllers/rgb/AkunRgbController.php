<?php

namespace App\Http\Controllers\rgb;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use App\Models\SuratP;
use App\Models\User;
use Illuminate\Http\Request;

class AkunRgbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        $suratStatus = Surat::whereIn('nik', $data->pluck('nik'))
            ->get()
            ->groupBy('nik');
        $suratStatus2 = SuratP::whereIn('nik', $data->pluck('nik'))
            ->get()
            ->groupBy('nik');
        return view('admin.hrd.rgb.akun.index', [
            'data' => $data,
            'suratStatus' => $suratStatus,
            'suratStatus2' => $suratStatus2,
        ]);
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
        $account = User::findOrFail($id);

        // Return the edit view with the account data
        return view('admin.hrd.rgb.akun.surat', compact('account'));
    }

    public function card(string $id)
    {
        $account = User::findOrFail($id);

        // Return the edit view with the account data
        return view('admin.hrd.rgb.akun.edit', compact('account'));
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
}

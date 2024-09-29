<?php

namespace App\Http\Controllers;

use App\Jobs\ImportExcel;
use Illuminate\Http\Request;

class UserImportController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ImportExcel::dispatch();
        
        return redirect('/')->with('success', 'All good!');
    }
}

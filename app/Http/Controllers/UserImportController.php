<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExcelUploadRequest;
use Inertia\Inertia;
use App\Jobs\ImportExcel;
use App\Models\UserImport;

class UserImportController extends Controller
{
    public function index()
    {
        $uploadedData = UserImport::paginate(10);

        return Inertia::render('UploadExcel/Index',  [
            'uploadedData' => $uploadedData,
        ]);
    }


    public function create()
    {
        return Inertia::render('UploadExcel/Form');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(ExcelUploadRequest $request)
    {
         // Store the uploaded file
         $filePath = $request->file('file')->store('uploads');

        ImportExcel::dispatch($filePath);
        
        return back()->with('success', 'Your file is being processed in the background.');
    }
}

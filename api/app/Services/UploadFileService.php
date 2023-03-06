<?php

namespace App\Services;

use App\Imports\PokemonImport;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;

class UploadFileService
{
    public function uploadFile(UploadedFile $uploadedFile)
    {
        Excel::import(new PokemonImport, $uploadedFile, null, \Maatwebsite\Excel\Excel::CSV);

        return true;
    }
}
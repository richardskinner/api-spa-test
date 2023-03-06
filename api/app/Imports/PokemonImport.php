<?php

namespace App\Imports;

use App\Models\Pokemon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PokemonImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Pokemon([
            'name' => trim($row['name']),
            'weight' => $row['weight'],
            'height' => $row['height'],
        ]);
    }
}
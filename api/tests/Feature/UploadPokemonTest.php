<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class UploadPokemonTest extends TestCase
{
    public function testApplicationReturnsSuccessfulResponse(): void
    {
        Excel::fake();

        $response = $this->post(
            route('pokemon.upload'),
            ['file' => $this->stubCsv()]
        );

        Excel::assertImported('pokemon.csv');
        $response->assertStatus(200);
    }

    public function testReturnsErrorResponseWhenFileUploadThrowsException()
    {
        $content = "";

        $response = $this->post(
            route('pokemon.upload'),
            ['file' => UploadedFile::fake()->createWithContent('pokemon.csv', $content)]
        );

        $response->assertStatus(400);
        $response->assertJson([
            'code' => 400,
            'message' => 'Error uploading file.'
        ]);
    }

    private function stubCsv(): UploadedFile
    {
        $content = "Name,Weight,Height\r
                    Pikachu,60,4\r
                    Blastoise,855,16\r
                    Squirtle,90,5\r";

        return UploadedFile::fake()->createWithContent('pokemon.csv', $content);
    }
}

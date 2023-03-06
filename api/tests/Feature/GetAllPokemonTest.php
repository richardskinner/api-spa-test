<?php

namespace Tests\Feature;

use App\Http\Resources\PokemonResource;
use Tests\TestCase;

class GetAllPokemonTest extends TestCase
{
    public function testApplicationReturnsSuccessfulResponse(): void
    {
        $response = $this->get(route('pokemon.all'));

        $response->assertStatus(200);
        $response->assertJson([
            [
                "id" => null,
                "name" => "Pikachu",
                "weight" => 60,
                "height" => 4,
            ]
        ]);
        $this->assertInstanceOf(PokemonResource::class, $response->original[0]);
    }
}

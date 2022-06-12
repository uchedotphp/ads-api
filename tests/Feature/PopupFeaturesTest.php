<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PopupFeaturesTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @return void
     * @test
     */
    public function can_get_paginated_list_of_popups(): void
    {
        $endpoint = route("popups.index");

        $response = $this->getJson($endpoint);
        $response->assertSuccessful();

        $response->assertJsonStructure([
            "popups" => [
                "current_page", "last_page", "data"
            ]
        ]);
    }
}

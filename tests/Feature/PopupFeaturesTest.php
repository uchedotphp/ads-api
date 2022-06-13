<?php

namespace Tests\Feature;

use App\Models\Popup;
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

    /**
     * @return void
     * @test
     */
    public function can_fetch_the_details_of_a_single_popup(): void
    {
        $samplePopup = Popup::factory()->create();
        $endpoint = route("popups.show", ["popup" => $samplePopup->id]);

        $response = $this->getJson($endpoint);
        $response->assertSuccessful();

        $response->assertJsonStructure([
            "popup" => ["id", "idem", "data"],
        ]);
    }

    /**
     * @return void
     * @test
     */
    public function can_create_a_new_popup(): void
    {
        $samplePopup = Popup::factory()->make();
        $endpoint = route("popups.store");

        $response = $this->postJson($endpoint, [
            "idem" => $samplePopup->idem,
            "data" => json_decode($samplePopup->data),
        ]);

        $response->assertSuccessful();

        $response->assertJsonStructure([
            "popup" => ["id", "idem", "data"],
        ]);

        $this->assertDatabaseHas(
            (new Popup())->getTable(),
            [
                "idem" => $samplePopup->idem,
            ]
        );
    }

    /**
     * @return void
     * @test
     */
    public function can_update_an_existing_popup(): void
    {
        $samplePopup = Popup::factory()->create();
        $endpoint = route("popups.update", ["popup" => $samplePopup->id]);

        $response = $this->putJson($endpoint, [
            "idem" => $samplePopup->idem,
            "data" => json_decode($samplePopup->data),
        ]);

        $response->assertSuccessful();
        $response->assertJsonStructure([
            "popup" => ["id", "idem", "data"],
        ]);
    }

    /**
     * @return void
     * @test
     */
    public function can_delete_an_existing_popup(): void
    {
        $samplePopup = Popup::factory()->create();
        $endpoint = route("popups.destroy", ["popup" => $samplePopup->id]);

        $response = $this->deleteJson($endpoint);

        $response->assertSuccessful();

        $this->assertDatabaseMissing(
            (new Popup())->getTable(),
            [
                "idem" => $samplePopup->idem,
            ]
        );
    }

    /**
     * @return void
     * @test
     */
    public function can_fetch_popup_by_idem(): void
    {
        $samplePopup = Popup::factory()->create();
        $endpoint = route("popups.serve", ["idem" => $samplePopup->idem]);

        $response = $this->getJson($endpoint);
        $response->assertSuccessful();

        $response->assertJsonStructure([
            "popup" => ["id", "idem", "data"],
        ]);
    }
}

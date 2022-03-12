<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

class Count extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

     public function testCount()
    {

        $count = [
            "click_counts" => 1,
            "user_id" => 1,
            "date_clicked" => Carbon::now()
        ];

        $this->json('POST', '/sendrequest', $count , ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJsonStructure([
         "count" => [
             'id',
             'click_counts',
             'user_id',
             'date_clicked',
         ],
     ]);


    }
}

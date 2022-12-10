<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\Response;

class ProviderXTest extends TestCase
{
    /**
     * @return void
     */
    public function test_get_all_data()
    {
        $this->get('api/v1/users')
        ->assertStatus(Response::HTTP_OK)
        ->assertJsonStructure(
            [
                '0' => [
                    'parentAmount',
                    'Currency',
                    'parentEmail',
                    'statusCode',
                    'registerationDate',
                    'parentIdentification'
                ],
                '1' => [
                    'balance',
                    'currency',
                    'email',
                    'status',
                    'created_at',
                    'id'
                ]
            ]
        );
    }

    /**
     * @return void
     */
    public function test_get_provider_x_data()
    {
        $this->get('api/v1/users?provider=DataProviderX')
        ->assertStatus(Response::HTTP_OK)
        ->assertJsonStructure(
            [
                '*' => [
                    'parentAmount',
                    'Currency',
                    'parentEmail',
                    'statusCode',
                    'registerationDate',
                    'parentIdentification'
                ],
            ]
        );
    }

    /**
     * @return void
     */
    public function test_get_provider_y_data()
    {
        $this->get('api/v1/users?provider=DataProviderY')
        ->assertStatus(Response::HTTP_OK)
        ->assertJsonStructure(
            [
                '*' => [
                    'balance',
                    'currency',
                    'email',
                    'status',
                    'created_at',
                    'id'
                ],
            ]
        );
    }
}

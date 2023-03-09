<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class ZipCodesTest extends TestCase
{

    protected $EXISTING_ZIPCODE = '01210';
    protected $NON_EXISTING_ZIPCODE = '00000';

    /**
     * Testing if the response of an existing zip code is ok
     *
     * @return void
     */
    public function testExistingZipCode()
    {
        $url = sprintf('/api/zip-codes/%s', $this->EXISTING_ZIPCODE);

        $this->json('get', $url)
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'zip_code',
                    'locality',
                    'settlements' => [
                        '*' => [
                            'key',
                            'name',
                            'zone_type',
                            'settlement_type' => [
                                'name',
                            ]
                        ]
                    ],
                    'municipality' => [
                        'key',
                        'name',
                    ]
                ]
            );
    }

    /**
     * Testing if the response of a non existing zip code is not found
     *
     * @return void
     */
    public function testNonExistingZipCode()
    {
        $url = sprintf('/api/zip-codes/%s', $this->NON_EXISTING_ZIPCODE);

        $this->json('get', $url)
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJsonStructure(
                [
                    'result',
                    'message',
                ]
            );
    }
}

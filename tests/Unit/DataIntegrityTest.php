<?php

namespace Tests\Feature;

use Tests\TestCase;

class DataIntegrityTest extends TestCase
{

    /**
     * Testing if the DB has federal entities table
     *
     * @return void
     */
    public function testFederalEntities()
    {
        $this->assertDatabaseHas('federal_entities', ['name' => 'Ciudad de México']);
    }

    /**
     * Testing if the DB has municipalities table
     *
     * @return void
     */
    public function testMunicipalities()
    {
        $this->assertDatabaseHas('municipalities', ['key' => 10]);
    }

    /**
     * Testing if the DB has settlements table
     *
     * @return void
     */
    public function testSettlements()
    {
        $this->assertDatabaseHas('settlements', ['key' => 10]);
    }

    /**
     * Testing if the DB has zip_codes table
     *
     * @return void
     */
    public function testZipCodes()
    {
        $this->assertDatabaseHas('zip_codes', ['code' => '01210']);
    }
}

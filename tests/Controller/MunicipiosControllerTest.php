<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class MunicipiosControllerTest extends WebTestCase
{
    /**
     * @test
     * @covers getByNombreDeProvinciaAction
     */
    public function getByNombreDeProvinciaActionTest()
    {
        $client = static::createClient();
        $client->request('GET', 'api/municipios/Teruel');
        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
        $content = $client->getResponse()->getContent();
        $this->assertJson($content);
        $content = json_decode($content, true);
        $this->assertGreaterThan(1,  sizeof($content));

        $client->request('GET', 'api/municipios/Berlin');
        $this->assertEquals(Response::HTTP_NOT_FOUND, $client->getResponse()->getStatusCode());
    }
}
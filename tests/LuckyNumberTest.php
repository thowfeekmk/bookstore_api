<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class LuckyNumberTest extends ApiTestCase
{
    public function testSomething(): void
    {
        $response = static::createClient()->request('GET', '/lucky/number');
        $data = json_decode($response->getContent());
        echo "\nNumber : " . $data->data->number . "\n";
        $this->assertResponseIsSuccessful();
        //$this->assertJsonContains(['@id' => '/']);
    }
}

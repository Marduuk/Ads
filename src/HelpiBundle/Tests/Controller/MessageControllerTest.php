<?php

namespace HelpiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MessageControllerTest extends WebTestCase
{
    public function testCustom()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/custom');
    }

}

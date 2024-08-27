<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Factories\UserFactory;


class UserTest extends UserFactory
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        
        $this->actingAs(factory(Gouvernorat::class)->create());
        $Gouvernorat = $this->get('/gouvernorat/index')->assertOK();

        $Gouvernorat->assertStatus(200);
    }
    public function test()
    {
        $this->withoutExceptionHandLing();
        
        GouvernoratFactory::count(50)->create();
        $this->actingAs(factory(Gouvernorat::class)->create());
        $Gouvernorat = $this->post('/gouvernorat/create/store',[
            'nom_gouvernorat_fr' => '',
            'nom_gouvernorat_fr' => 'test@test.tn',
            
        ]);
        $this->assertOK();

        $this->assertStatus(200);

    }
}

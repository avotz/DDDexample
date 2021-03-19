<?php

namespace Tests\Feature\Invoice;

use App\Domain\Account\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvoicesTest extends TestCase
{
    use RefreshDatabase;

   /** @test */
    public function invoices_component_is_rendered()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->get('/invoices')
                ->assertStatus(200)
                ->assertSeeLivewire('invoices');

    
    }
}

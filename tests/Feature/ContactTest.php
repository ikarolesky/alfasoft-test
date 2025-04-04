<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Str;


class ContactTest extends TestCase
{
    public function test_contact_show_page_is_displayed(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create();


        $response = $this
        ->actingAs($user)
        ->get('/contacts/show/' . $contact->id);

        $response->assertOk();
    }

    public function test_contact_information_can_be_updated(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create();

        $response = $this
        ->actingAs($user)
        ->patch('/contacts/update/' . $contact->id, [
            'name' => 'Test Name',
            'email' => 'test@email.com',
            'contact' => '123456789',
        ]);

        $response
        ->assertSessionHasNoErrors();

        $contact->refresh();

        $this->assertSame('Test Name', $contact->name);
        $this->assertSame('test@email.com', $contact->email);
        $this->assertSame('123456789', $contact->contact);
    }
    
    public function test_contact_can_be_deleted(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create();

        $response = $this
        ->actingAs($user)
        ->delete('/contacts/delete/1');

        $contact->delete();

        $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/contacts');

        $this->assertSoftDeleted($contact);
    }
}

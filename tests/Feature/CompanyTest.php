<?php

namespace Tests\Feature;

use App\Company;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function logged_out_users_are_redirected_to_login_when_viewing_company_list()
    {
       $this->get(route('company.index'))->assertRedirect('/login');
    }

    /** @test */
    public function logged_in_user_can_view_company_list()
    {
        $this->actingAs(factory(User::class)->create())
            ->get(route('company.index'))->assertOk();
    }

    /** @test */
    public function company_can_be_created()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->post(route('company.store'), [
            'name' => 'Test Company',
        ]);

        $response->assertStatus(302);
        $this->assertCount(1, Company::all());
    }

    /** @test */
    public function company_can_be_updated()
    {
        $this->actingAs(factory(User::class)->create());

        $this->post(route('company.store'), [
           'name' => 'Test Name',
        ]);

        $this->assertCount(1, Company::all());

        $this->patch(route('company.update', Company::first()->id), [
            'name' => 'Updated name',
        ]);

        $this->assertEquals('Updated name', Company::first()->name);
    }

    /** @test */
    public function company_can_be_deleted()
    {
        $this->actingAs(factory(User::class)->create());

        $this->post(route('company.store'), [
            'name' => 'Test Name',
        ]);

        $this->assertCount(1, Company::all());

        $response = $this->delete(route('company.destroy', Company::first()));
        $this->assertCount(0, Company::all());
        $response->assertRedirect(route('company.index'));
    }

    /** @test */
    public function company_name_is_required_in_the_create_form()
    {
        $this->actingAs(factory(User::class)->create());

        $this->json('post', route('company.store'),[])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name']);
    }
}


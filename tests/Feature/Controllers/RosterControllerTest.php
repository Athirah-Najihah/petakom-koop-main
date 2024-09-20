<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Roster;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RosterControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_rosters(): void
    {
        $rosters = Roster::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('rosters.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.rosters.index')
            ->assertViewHas('rosters');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_roster(): void
    {
        $response = $this->get(route('rosters.create'));

        $response->assertOk()->assertViewIs('app.rosters.create');
    }

    /**
     * @test
     */
    public function it_stores_the_roster(): void
    {
        $data = Roster::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('rosters.store'), $data);

        $this->assertDatabaseHas('rosters', $data);

        $roster = Roster::latest('id')->first();

        $response->assertRedirect(route('rosters.edit', $roster));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_roster(): void
    {
        $roster = Roster::factory()->create();

        $response = $this->get(route('rosters.show', $roster));

        $response
            ->assertOk()
            ->assertViewIs('app.rosters.show')
            ->assertViewHas('roster');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_roster(): void
    {
        $roster = Roster::factory()->create();

        $response = $this->get(route('rosters.edit', $roster));

        $response
            ->assertOk()
            ->assertViewIs('app.rosters.edit')
            ->assertViewHas('roster');
    }

    /**
     * @test
     */
    public function it_updates_the_roster(): void
    {
        $roster = Roster::factory()->create();

        $user = User::factory()->create();

        $data = [
            'day' => $this->faker->date(),
            'time' => '',
            'user_id' => $user->id,
        ];

        $response = $this->put(route('rosters.update', $roster), $data);

        $data['id'] = $roster->id;

        $this->assertDatabaseHas('rosters', $data);

        $response->assertRedirect(route('rosters.edit', $roster));
    }

    /**
     * @test
     */
    public function it_deletes_the_roster(): void
    {
        $roster = Roster::factory()->create();

        $response = $this->delete(route('rosters.destroy', $roster));

        $response->assertRedirect(route('rosters.index'));

        $this->assertSoftDeleted($roster);
    }
}

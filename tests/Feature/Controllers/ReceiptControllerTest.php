<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Receipt;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReceiptControllerTest extends TestCase
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
    public function it_displays_index_view_with_receipts(): void
    {
        $receipts = Receipt::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('receipts.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.receipts.index')
            ->assertViewHas('receipts');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_receipt(): void
    {
        $response = $this->get(route('receipts.create'));

        $response->assertOk()->assertViewIs('app.receipts.create');
    }

    /**
     * @test
     */
    public function it_stores_the_receipt(): void
    {
        $data = Receipt::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('receipts.store'), $data);

        $this->assertDatabaseHas('receipts', $data);

        $receipt = Receipt::latest('id')->first();

        $response->assertRedirect(route('receipts.edit', $receipt));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_receipt(): void
    {
        $receipt = Receipt::factory()->create();

        $response = $this->get(route('receipts.show', $receipt));

        $response
            ->assertOk()
            ->assertViewIs('app.receipts.show')
            ->assertViewHas('receipt');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_receipt(): void
    {
        $receipt = Receipt::factory()->create();

        $response = $this->get(route('receipts.edit', $receipt));

        $response
            ->assertOk()
            ->assertViewIs('app.receipts.edit')
            ->assertViewHas('receipt');
    }

    /**
     * @test
     */
    public function it_updates_the_receipt(): void
    {
        $receipt = Receipt::factory()->create();

        $user = User::factory()->create();

        $data = [
            'total_payment' => $this->faker->randomNumber(2),
            'total_price' => $this->faker->randomNumber(2),
            'total_change' => $this->faker->randomNumber(2),
            'user_id' => $user->id,
        ];

        $response = $this->put(route('receipts.update', $receipt), $data);

        $data['id'] = $receipt->id;

        $this->assertDatabaseHas('receipts', $data);

        $response->assertRedirect(route('receipts.edit', $receipt));
    }

    /**
     * @test
     */
    public function it_deletes_the_receipt(): void
    {
        $receipt = Receipt::factory()->create();

        $response = $this->delete(route('receipts.destroy', $receipt));

        $response->assertRedirect(route('receipts.index'));

        $this->assertSoftDeleted($receipt);
    }
}

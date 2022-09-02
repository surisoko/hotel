<?php

namespace Tests\Feature\Controllers;

use App\Events\BookingCreated;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class BookingControllerTest extends TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpFaker();
    }

    /** @test */
    public function it_dispatch_a_new_booking_event()
    {
        Event::fake();
        $this->postJson(route('booking.create'), [
            'hotel_uuid' => $this->faker->uuid,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
        ])->assertOk();

        Event::assertDispatched(BookingCreated::class);
    }
}

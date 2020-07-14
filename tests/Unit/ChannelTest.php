<?php

namespace Tests\Unit;

use App\Channel;
use App\Thread;
use App\User;
use Illuminate\Support\Collection;
use Tests\TestCase;

class ChannelTest extends TestCase
{
    protected $channel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->channel = factory(Channel::class)->create();
    }

    /** @test */
    public function it_consists_of_threads()
    {
        $thread = factory(Thread::class)->create(['channel_id' => $this->channel->id]);

        $this->assertInstanceOf(Collection::class, $this->channel->threads);
        $this->assertCount(1, $this->channel->threads);
        $this->assertTrue($this->channel->threads->contains($thread));
    }

    /** @test */
    public function it_can_be_archived()
    {
        $this->assertFalse($this->channel->archived);

        $this->channel->archive();

        $this->assertTrue($this->channel->archived);
    }

    /** @test */
    public function archived_channels_are_excluded_by_default()
    {
        $active = $this->channel;
        $archived = factory(Channel::class)->create(['archived' => true]);

        $this->assertEquals($active->fresh(), Channel::all()->first());
    }
}

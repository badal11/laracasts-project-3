<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MentionUsersTest extends TestCase
{
    /** @test */
    public function user_that_is_mentioned_in_a_reply_receives_notification()
    {
        $john = factory(User::class)->create(['username' => 'john']);
        $jane = factory(User::class)->create(['username' => 'jane']);
        $thread = factory(Thread::class)->create();
        $reply = ['body' => '@jane, look at this!'];

        $this->actingAs($john)
            ->post(route('threads.replies.store', [$thread->channel, $thread]), $reply);
        $this->assertCount(1, $jane->notifications);
    }
}

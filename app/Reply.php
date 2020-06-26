<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Spatie\Activitylog\Traits\LogsActivity;

class Reply extends Model
{
    use Favoriteable;
    use LogsActivity;

    protected static $logAttributes = ['body'];
    protected static $logName = 'replies_log';
    protected static $ignoreChangedAttributes = ['updated_at'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;
    protected static $recordEvents = ['created', 'updated'];
    // logs
    protected $fillable = ['body', 'thread_id', 'user_id', 'created_at'];
    protected $with = ['user', 'favorites', 'thread.channel'];
    protected $withCount = ['favorites'];
    protected $touches = ['thread'];
    protected $appends = ['link', 'isFavorited'];

    //Relations

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    //Helpers

    public function getLinkAttribute()
    {
        return $this->getLink();
    }

    public function getLink(): string
    {
//    $commentableResourceName = str_plural(strtolower(class_basename($comment->commentable_type)));
        $threadUrl = route('threads.show', [$this->thread->channel, $this->thread]);
        $replyUrl = "{$threadUrl}#reply-{$this->id}";
        return $replyUrl;
    }

    public function getIsFavoritedAttribute()
    {
        return Auth::check() && $this->isFavoritedBy(Auth::user());
    }

    public function mentionedUsers()
    {
        preg_match_all("/\B\@([\w\-]+)/", $this->body, $matches);
        return $matches[1];
    }

    public function setBodyAttribute($body)
    {
        $this->attributes['body'] = preg_replace(
            "/\B\@([\w\-]+)/",
            '<a href="/profiles/$1" class="text-blue-500 hover:text-opacity-75">$0</a>',
            $body
        );
    }
}

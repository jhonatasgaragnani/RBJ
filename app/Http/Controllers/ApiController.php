<?php

namespace App\Http\Controllers;

use Admin\Models\Event;
use Admin\Models\Partner;
use Admin\Models\Photo;
use Admin\Models\Post;
use Admin\Models\Team;
use Admin\Models\Video;
use Admin\Models\Top;
use Admin\Models\Poll;
use Admin\Models\PollOption;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Message;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Cache;

class ApiController extends Controller
{
    public function news(Request $request)
    {
        $key = 'news';

        $news = $this->cachedResults($key, Post::whereHas('type', function ($query) {
            $query->where('slug', 'news');
        })->where('active', 1)->orderBy('created_at', 'desc'),
            false,
            true,
            10);

        return response($news, 200);
    }

    public function latestNews(Request $request)
    {
        $key = 'news-latest';
        $news = $this->cachedResults($key,
            Post::whereHas('type', function ($query) {
                $query->where('slug', 'news');
            })->where('active', 1)->orderBy('created_at', 'desc')->take(5));

        return response($news, 200);
    }

    public function interviews(Request $request)
    {
        $key = 'interviews';
        $interviews = $this->cachedResults($key,
            Post::whereHas('type', function ($query) {
                $query->where('slug', 'interview');
            })->where('active', 1)->orderBy('created_at', 'desc'),
            false,
            true,
            10);

        return response($interviews, 200);
    }

    public function posts(Request $request)
    {
        $key = 'posts';
        $posts = $this->cachedResults($key,
            Post::whereHas('type', function ($query) {
                $query->where('slug', 'post');
            })->where('active', 1)->orderBy('created_at', 'desc'),
            false,
            true,
            10);

        return response($posts, 200);
    }

    public function latestPosts(Request $request)
    {
        $key = 'posts-latest';
        $posts = $this->cachedResults($key,
            Post::whereHas('type', function ($query) {
                $query->where('slug', 'post');
            })->where('active', 1)->orderBy('created_at', 'desc')->take(5));

        return response($posts, 200);
    }

    public function post(Request $request, Post $post)
    {
        return response($post, 200);
    }

    public function photos(Request $request)
    {
        $key = 'photos';
        $photos = $this->cachedResults($key,
            Photo::orderBy('created_at', 'desc'),
            false,
            true,
            16);

        return response($photos, 200);
    }

    public function videos()
    {
        $key = 'videos';
        $videos = $this->cachedResults($key, Video::orderBy('created_at', 'desc'),
            false,
            true,
            16);

        return response($videos, 200);
    }

    public function teams()
    {
        $key = 'teams';
        $teams = $this->cachedResults($key, Team::orderBy('created_at', 'asc'), false, true, 16);

        return response($teams, 200);
    }

    public function events()
    {
        $key = 'events';
        $events = $this->cachedResults($key, Event::where('happen_at', '>',
            Carbon::now())->where('active', 1)->orderBy('created_at', 'desc'),
            false,
            true,
            16);

        return response($events, 200);
    }

    public function event(Event $event)
    {
        return response($event, 200);
    }

    public function messages(Message $message)
    {
        $key = 'messages';
        $messages = $this->cachedResults($key, Message::orderBy('created_at', 'desc')->take(50));

        return response($messages, 200);
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'body' => 'required|string',
            'email' => 'required|string|email',
        ]);

        $message = Message::create($request->only(['name', 'email', 'body']));

        broadcast(new MessageSent($message));

        return response('ok', 200);
    }

    public function tops()
    {
        $key = 'tops';
        $tops = $this->cachedResults($key, Top::orderBy('position', 'asc'), true);

        return response($tops, 200);
    }

    public function polls(Request $request)
    {
        $voted = collect(json_decode($request->cookie('VOTED')));

        if (count($voted) > 0) {
            $poll = Poll::has('options')->whereNotIn('id', $voted)->inRandomOrder()->first();
            if (!$poll) {
                return response(null, 200);
            }
            $poll->load('options');
        } else {
            $poll = Poll::has('options')->inRandomOrder()->first();
            if (!$poll) {
                return response(null, 200);
            }
            $poll->load('options');
        }

        return response($poll, 200);
    }

    public function partners()
    {
        $key = 'partners';
        $partners = $this->cachedResults($key, Partner::orderBy('name', 'asc'), false, true);

        return response($partners, 200);
    }

    public function cachedResults($key, $query, $get = true, $paginate = false, $perPage = 10)
    {
        if ($paginate) {
            return $query->paginate($perPage);
        }
        return $query->get();
    }
}

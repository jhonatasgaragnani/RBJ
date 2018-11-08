<?php

namespace Admin\Http\Controllers\Dashboard;

use Admin\Models\Photo;
use Admin\Models\Post;
use Admin\Models\Video;
use Admin\Models\Team;
use Admin\Models\Event;
use Admin\Models\Poll;
use Admin\Models\Schedule;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {
    public function index() {
        $users = User::count();
        $posts = Post::count();
        $photos = Photo::count();
        $videos = Video::count();
        $teams = Team::count();
        $events = Event::count();
        $polls = Poll::count();
        $schedules = Schedule::count();
        return view('Admin::pages.general.dashboard', compact(['users', 'posts', 'photos', 'videos', 'teams', 'events', 'polls', 'schedules']));
    }
}
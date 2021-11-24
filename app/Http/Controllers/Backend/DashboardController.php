<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Commodity;
use App\Models\Community;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rangeTimeFrom = date('Y-m-d').' 00:00:00';
        $rangeTimeTo = date('Y-m-d', strtotime('+1 day')).' 00:00:00';

        $users = User::role(['bod', 'webmaster', 'admin'])->count();
        $categories = Category::count();
        $commodities = Commodity::count();
        $communities = Community::count();
        $publicationsDraft = Publication::where('published_status', 'Draft')->count();
        $publicationsPublish = Publication::where('published_status', 'Publish')->count();
        $messagesToday = Contact::whereBetween('created_at', [$rangeTimeFrom, $rangeTimeTo])->count();
        $messagesAll = Contact::count();

        return view('backend.dashboard', [
            'users'                 => $users,
            'categories'            => $categories,
            'commodities'           => $commodities,
            'communities'           => $communities,
            'publicationsDraft'     => $publicationsDraft,
            'publicationsPublish'   => $publicationsPublish,
            'messagesToday'         => $messagesToday,
            'messagesAll'           => $messagesAll,
        ]);
    }
}

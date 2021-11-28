<?php

namespace App\Http\Controllers\Landing;

use App\Models\UserLog;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $news = Publication::where('published_status', 'Publish')
                                    ->where('type', 'News')
                                    ->limit(9)
                                    ->get();
        $articles = Publication::where('published_status', 'Publish')
                                    ->where('type', 'Article')
                                    ->limit(9)
                                    ->get();

        UserLog::create([
            'user_id'       => \Auth::user() != NULL ? \Auth::user()->id : NULL,
            'description'   => 'telah mengakses halaman landing page (Index)',
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return view('welcome', [
            'heroTitle' => NULL,
            'news'      => $news,
            'articles'  => $articles,
        ]);
    }
}

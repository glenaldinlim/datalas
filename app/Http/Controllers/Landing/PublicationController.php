<?php

namespace App\Http\Controllers\Landing;

use App\Models\UserLog;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicationController extends Controller
{
    public function index(Request $request)
    {
        $publications = Publication::where('published_status', 'Publish')
                                    ->limit(9)
                                    ->latest()
                                    ->get();
        $news = Publication::where('published_status', 'Publish')
                                    ->where('type', 'News')
                                    ->limit(6)
                                    ->get();
        $articles = Publication::where('published_status', 'Publish')
                                    ->where('type', 'Article')
                                    ->limit(6)
                                    ->get();

        UserLog::create([
            'user_id'       => \Auth::user() != NULL ? \Auth::user()->id : NULL,
            'description'   => 'telah mengakses halaman landing page (publikasi)',
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return view('landing.publication.index', [
            'heroTitle'     => 'Publikasi',
            'news'          => $news,
            'articles'      => $articles,
            'publications'  => $publications,
        ]);
    }
}

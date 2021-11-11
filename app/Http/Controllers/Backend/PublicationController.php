<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicationController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:webmaster|admin');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::all();

        return view('backend.publications.index', [
            'no'           => 1,
            'publications' => $publications,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('backend.publications.create', [
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            'type'          => 'required',
            'title'         => 'required|max:100',
            'content'       => 'required',
            'cover'         => 'required|image|max:2048',
        ])->validate();

        $path = $request->file('cover')->store('publications', 'public');

        $publication = Publication::create([
            'user_id'       => $request->get('user'),
            'type'          => $request->get('type'),
            'title'         => $request->get('title'),
            'slug'          => \Str::slug($request->title, '-'),
            'content'       => $request->get('content'),
            'cover'         => $path,
        ]);

        return redirect()->route('backend.publications.index')->with('success', 'Berhasil menambahkan Publikasi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publication = Publication::findOrFail($id);

        return view('backend.publications.edit', [
            'publication'  => $publication,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(), [
            'type'              => 'required',
            'title'             => 'required|max:100',
            'content'           => 'required',
            'cover'             => 'nullable|image|max:2048',
            'published_status'  => 'required',
        ])->validate();

        $publication = Publication::findOrFail($id);
        $publication->type              = $request->get('type');
        $publication->title             = $request->get('title');
        $publication->slug              = \Str::slug($request->title, '-');
        $publication->content           = $request->get('content');
        $publication->published_status  = $request->get('published_status');
        if ($request->file('cover')) {
            $path = $request->file('cover')->store('publications', 'public');
            $publication->cover = $path;
        }
        if ($request->get('published_status') == 'Publish') {
            $publication->published_by = \Auth::user()->id;
            $publication->published_at = Carbon::now()->format('Y-m-d H:i:s');
        } else {
            $publication->published_by = NULL;
            $publication->published_at = NULL;
        }
        $publication->save();

        return redirect()->route('backend.publications.index')->with('success', 'Berhasil melakukan Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        $publication->delete();


        return redirect()->route('backend.publications.index')->with('success', 'Berhasil Menghapus Publikasi ' . $publication->title . '!');
    }
}

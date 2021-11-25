<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserLog;
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
        $this->middleware('auth')->except(['create', 'show', 'store', 'edit', 'update', 'destroy']);
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
        return view('backend.publications.create');
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
            'user_id'       => \Auth::user()->id,
            'type'          => $request->get('type'),
            'title'         => $request->get('title'),
            'slug'          => \Str::slug($request->get('title'), '-'),
            'content'       => $request->get('content'),
            'cover'         => $path,
        ]);

        UserLog::create([
            'user_id'       => \Auth::user()->id,
            'description'   => 'telah menambahkan publikasi '.$request->get('title'),
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
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
        $publication = Publication::with(['user', 'publishedBy'])->findOrFail($id);

        return view('backend.publications.show', [
            'publication' => $publication,
        ]);
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
            'type'           => 'required',
            'title'          => 'required|max:100',
            'content'        => 'required',
            'cover'          => 'nullable|image|max:2048',
            'status_option'  => 'required',
        ])->validate();

        $publication                    = Publication::findOrFail($id);
        $publication->type              = $request->get('type');
        $publication->title             = $request->get('title');
        $publication->slug              = \Str::slug($request->title, '-');
        $publication->content           = $request->get('content');
        $publication->published_status  = $request->get('status_option');
        if ($request->file('cover')) {
            $path = $request->file('cover')->store('publications', 'public');
            $publication->cover = $path;
        }
        if ($request->get('status_option') == 'Publish') {
            $publication->published_by = \Auth::user()->id;
            $publication->published_at = Carbon::now()->format('Y-m-d H:i:s');
        } else {
            $publication->published_by = NULL;
            $publication->published_at = NULL;
        }
        $publication->save();

        UserLog::create([
            'user_id'       => \Auth::user()->id,
            'description'   => 'telah mengubah publikasi '.$request->get('title'),
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

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
        if ($publication->published_status == 'Draft') {
            $publication->delete();

            return redirect()->route('backend.publications.index')->with('success', 'Berhasil Menghapus Publikasi ' . $publication->title . '!');
        }

        UserLog::create([
            'user_id'       => \Auth::user()->id,
            'description'   => 'telah menghapus publikasi '.$publication->title,
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return redirect()->route('backend.publications.index')->with('danger', 'Gagal Menghapus Publikasi! Ubah Status Publikasi Terlebih dahulu ke Draft!');
    }
}

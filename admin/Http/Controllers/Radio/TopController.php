<?php

namespace Admin\Http\Controllers\Radio;

use Admin\Models\Top;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tops = Top::orderBy('position')->limit(10)->get();
        return view('Admin::pages.tops.browse', compact('tops'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Top $top)
    {
        return view('Admin::pages.tops.edit', compact('top'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Top $top
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Top $top)
    {
        $this->validate($request, $this->rules());

        $top->update($request->only([
            'artist',
            'title',
            'music'
        ]));

        return redirect()->route('admin.radio.tops');
    }

    public function reorder(Request $request)
    {
        if (!$request->ajax()) {
            return response('Não é uma chamada assincrona', 500);
        }

        if ($request->has('musics')) {
            $pos = 0;

            foreach ($request->musics as $music) {
                $pos++;

                $music = Top::findOrFail($music['id']);
                $music['position'] = $pos;
                $music->save();
                $musics[] = $music;
            }

            return response([
                'success' => true,
                'musics' => $musics
            ], 200);
        } else {
            return response(['success' => false], 500);
        }
    }

    public function rules()
    {
        return [
            'artist' => 'required|string',
            'title' => 'required|string',
            'music' => 'required|string',
        ];
    }
}

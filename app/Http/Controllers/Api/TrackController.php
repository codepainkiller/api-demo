<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TrackStore;
use App\Track;
use Illuminate\Http\Request;

class TrackController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = request('limit') ?: 50;
        $tracks = Track::paginate($limit);

        return $this->respondWithPagination($tracks, [
            'data' => $tracks->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TrackStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrackStore $request)
    {
        Track::create($request->all());

        return $this->respondCreated('La pista ha sido creada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $track = Track::find($id);

        if (! $track) {
            return $this->respondNotFound('Pista no encontrada.');
        }

        return $this->respond([
            'data' => $track
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
        $track = Track::find($id);

        if (! $track) {
            return $this->respondNotFound('Pista no encontrado.');
        }
        $track->update($request->all());

        return $this->respond([
            'message' => "La pista $id ha sido actualizada.",
            'data'    => $track
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $track = Track::find($id);

        if (! $track) {
            return $this->respondNotFound('Pista no encontrada.');
        }

        $track->delete();

        return $this->respond(['message' => "La pista $id ha sido eliminada."]);
    }
}

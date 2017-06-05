@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de pistas musicales</div>

                <div class="panel-body">
                    <track-list></track-list>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">API</div>

                <div class="panel-body">
                    <h5>Ejemplo</h5>
                    <pre>{
	"name": "Fix you",
	"artist": "Coldplay",
	"duration": 296
}</pre>

                    <h5>Listar pistas</h5>
                    <code>
                        GET api.martincruz.me/v1/tracks
                    </code>

                    <h5>Mostrar pista por ID</h5>
                    <code>
                        GET api.martincruz.me/v1/tracks/{id}
                    </code>

                    <h5>Crear pista</h5>
                    <code>
                        POST api.martincruz.me/v1/tracks
                    </code>

                    <h5>Editar pista</h5>
                    <code>
                        PUT api.martincruz.me/v1/tracks/{id}
                    </code>

                    <h5>Eliminar pista</h5>
                    <code>
                        DELETE api.martincruz.me/v1/tracks/{id}
                    </code>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">API</h3>
        </div>

        <div class="panel-body">
            <h5>Ejemplo</h5>
            <pre v-text="example"></pre>

            <h5>Obtener todas las pistas</h5>
            <code class="http">GET /v1/tracks</code>

            <h5>Obtener pista por ID</h5>
            <code class="http">GET /v1/tracks/{id}</code>

            <h5>Crear pista</h5>
            <code class="http">POST /v1/tracks</code>

            <h5>Editar pista</h5>
            <code class="http">PUT /v1/tracks/{id}</code>

            <h5>Eliminar pista</h5>
            <code class="http">DELETE /v1/tracks/{id}</code>
        </div>
    </div>
</template>

<script type="text/babel">

    export default {
        data: function () {
            return {
                example: {
                    name: 'Fix You',
                    artist: 'Coldplay',
                    duration: 296
                }
            }
        },
        mounted: function () {

        },
        methods: {

        },

    }
</script>

<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Lista de pistas musicales</h3>
        </div>

        <div class="panel-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Artista</th>
                        <th>Duración</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="track in tracks">
                        <td v-text="track.id"></td>
                        <td v-text="track.name"></td>
                        <td v-text="track.artist"></td>
                        <td>{{ track.duration | time }}</td>
                    </tr>
                    </tbody>
            </table>
        </div>
    </div>
</template>

<script type="text/babel">
    import moment from 'moment';

    export default {
        data: function () {
            return {
                tracks: [],
                formatJSON: {
                    indent: '   ',
                    singleQuotes: false
                }
            }
        },
        mounted: function () {
            moment.locale('es');

            this.getTracks();

            Echo.channel('tracks')
                    .listen('TracksUpdated', (data) => {
                        this.getTracks();
                    })
        },
        methods: {
            getTracks: function () {
                axios.get('/v1/tracks')
                        .then(response => {
                            console.log(response.data);
                            this.tracks = response.data.data;
                        });
            }
        },
        filters: {
            time: function (lenght) {
                let minutes = parseInt(lenght / 60).toString();
                let seconds = (lenght % 60).toString();

                minutes = minutes.length < 2 ? `0${minutes}` : minutes;
                seconds = seconds.length < 2 ? `0${seconds}` : seconds;

                return `${minutes}:${seconds}`;
            },
            diffForHumans: function (date) {
                return moment(date).fromNow();
            }
        }
    }
</script>

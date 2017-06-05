<template>
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
</template>

<script type="text/babel">
    export default {
        data: function () {
            return {
                tracks: []
            }
        },
        mounted: function () {
            axios.get('/v1/tracks')
                    .then(response => this.tracks = response.data.data);
        },

        filters: {
            time: function (lenght) {
                let minutes = parseInt(lenght / 60).toString();
                let seconds = (lenght % 60).toString();

                minutes = minutes.length < 2 ? `0${minutes}` : minutes;
                seconds = seconds.length < 2 ? `0${seconds}` : seconds;

                return `${minutes}:${seconds}`;
            }
        }
    }
</script>

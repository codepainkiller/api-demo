<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Pusher Activity</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Tipo</th>
                    <th>URI</th>
                    <th>Hora</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="log in lastLogs">
                    <td v-text="log.type"></td>
                    <td v-text="log.uri"></td>
                    <td v-text="log.time"></td>
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
                logs: []
            }
        },
        mounted: function() {
            Echo.channel('tracks')
                    .listen('TracksUpdated', (data) => {
                        console.log(data);

                        this.logs.push({
                            type: data.type,
                            uri: data.uri,
                            time: this.now()
                        });
                    })
        },
        methods: {
            now: function () {
                return moment().format('h:mm:ss a');
            }
        },
        computed: {
            lastLogs: function () {
                return this.logs.reverse().slice(0, 4);
            }
        }
    }
</script>

<script>
    export default {
        computed: {
            link () {
                return this.$store.getters['Config/key']['player_url']['value']
            },
            volumeIcon() {
                let volume = this.volume

                if (volume > 50) return 'volume_up'
                else if (volume <= 50 && volume > 25) return 'volume_down'
                else if (volume <= 25 && volume > 0) return 'volume_mute'
                else if (volume <= 0) return 'volume_off'
            },
            volumeMedia () {
                return this.volume / 100
            },
            isMuted () {
                return this.volume <= 0
            }
        },
        data: () => ({
            loaded: false,
            playing: false,
            volume: 100,
            message: ''
        }),
        mounted () {
            setTimeout(this.updateSchedule, 10)
            setInterval(this.updateSchedule, 5000)
        },
        methods: {
            _handlePlayingUi (ev) {

            },
            _handleLoaded (ev) {
                this.togglePlaying()
            },
            _handlePause (ev) {

            },
            _handlePlay (ev) {

            },
            togglePlaying () {
                this.playing = !this.playing

                this.playing ? this.$refs.audio.play() : this.$refs.audio.pause()
            },
            toggleVolume () {
                if (this.volume !== 0) this.volume = 0
                else this.volume = 100
            },
            updateSchedule () {
                let schedule = this.$store.getters['Schedules/current'].schedules.filter(schedule => {

                    let getTime = (date, string) => {
                        let arr = string.split(':')
                        date.setHours(parseInt(arr[0], 10))
                        date.setMinutes(parseInt(arr[1], 10))
                        return date.getTime()
                    }

                    let now = new Date().getTime()

                    return now >= getTime(new Date(), schedule.pivot.starts_at) && now <= getTime(new Date(), schedule.pivot.ends_at)
                })[0]

                if (schedule) {
                    let name = schedule.name.length > 60 ? schedule.name.slice(0, 57) + '...' : schedule.name
                    let speaker = schedule.speaker.length > 30 ? schedule.speaker.slice(0, 27) + '...' : schedule.speaker
                    this.message = `No ar: ${name} com ${speaker}`
                } else {
                    this.message = 'Programação inativa'
                }
            }
        },
        watch: {
            volumeMedia(value) {
                this.$refs.audio.volume = value
            }
        }
    }
</script>

<template>
    <div>
        <span style="margin-right: 80px" class="hidden-sm-and-down">{{ message }}</span>
        <v-chip style="margin-right: 80px;position: absolute; bottom: -25px; right: 0;" id="volume_control"
                class="elevation-2">
            <v-avatar style="cursor: pointer" @click="toggleVolume">
                <v-icon light>{{ volumeIcon }}</v-icon>
            </v-avatar>
            <v-slider style="position: relative; top: 10px" v-model="volume" light thumb-label snap step="10"></v-slider>
        </v-chip>
        <v-btn dark fab absolute bottom right @click.native.stop="togglePlaying" class="blue">
            <v-icon>{{ playing ? 'pause' : 'play_arrow' }}</v-icon>
        </v-btn>
        <audio :src="link"
               preload="auto"
               style="display: none"
               ref="audio"
               @timeupdate="_handlePlayingUi"
               @loadeddata="_handleLoaded"
               @pause="_handlePause"
               @play="_handlePlay"></audio>
    </div>
</template>
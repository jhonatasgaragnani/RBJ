<script>
    export default {
        props: {
            classes: {
                type: String,
                required: false,
                default: ''
            },
            title: {
                type: String,
                required: true
            },
            src: {
                type: String,
                required: false,
                default: ''
            },
            placeholder: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                currentSrc: ''
            }
        },
        mounted() {
            this.currentSrc = this.src
        },
        computed: {
            link() {
                return this.currentSrc ? this.getVideo(this.currentSrc) : ''
            }
        },
        methods: {
            createYoutubeEmbed(key) {
                return `
                <iframe width="560"
                        height="315"
                        frameborder="0"
                        allowfullscreen
                        style="display: block; margin: 0 auto"
                        src="https://www.youtube.com/embed/${key}"></iframe><br/>
                `
            },
            getVideo(text) {
                const vm = this;

                const fullreg = /(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)([^& \n<]+)(?:[^ \n<]+)?/g;
                const regex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([^& \n<]+)(?:[^ \n<]+)?/g;

                // get all the matches for youtube links using the first regex
                const match = text.match(fullreg);
                if (match && match.length > 0) {
                    let resultHtml = text;
                    // go through the matches one by one
                    for (var i = 0; i < match.length; i++) {
                        // get the key out of the match using the second regex
                        let matchParts = match[i].split(regex);
                        // replace the full match with the embedded youtube code
                        resultHtml = resultHtml.replace(match[i], vm.createYoutubeEmbed(matchParts[1]));
                    }
                    return resultHtml;

                } else {
                    return text;
                }
            }
        }
    }
</script>

<template>
    <div>
        <div class="form-group has-feedback" :class="classes">
            <label for="music">{{ title }}</label>
            <input type="text"
                   class="form-control"
                   id="music"
                   name="music"
                   :value="src"
                   :placeholder="placeholder"
                   v-model="currentSrc">

            <slot></slot>
        </div>

        <div v-show="currentSrc" v-html="link">

        </div>
    </div>
</template>
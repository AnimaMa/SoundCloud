<template>
    <div class="facebookLink">
        <div class="fb-button" @click="popup"></div>

        <div class="fb-feed">
            <div id="fb-root">
            </div>
            <div class="fb-page" data-href="https://www.facebook.com/lignatoolsk-803886629741487/" data-tabs="timeline"
                 data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                 data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/lignatoolsk-803886629741487/" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/lignatoolsk-803886629741487/">lignatool.sk</a></blockquote>
            </div>
        </div>

    </div>

</template>

<script>
    import $ from 'jquery';

    export default {
        name: "facebook-link",

        methods: {
            popup() {
                let containsClass = this.$el.classList.contains('fb-up');

                if (containsClass) {
                    this.$el.classList.remove('fb-up');

                } else {
                    this.$el.classList.add('fb-up');
                }

            },

        }
    }
</script>


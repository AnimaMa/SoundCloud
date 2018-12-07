<template>
    <div class="magnific-gallery">
        <slot></slot>
    </div>
</template>

<script>
    var $ = require('jquery');
    var magnificPopup = require('magnific-popup');

    module.exports = {

        props: [],

        mounted: function() {
            this.$nextTick(() => {
                if(!$(this.$el).is(':empty')) {
                    $(this.$el).find('.photo-item').magnificPopup({
                        type: 'image',
                        gallery: {
                            enabled: true
                        }
                    });
                }
            });
        }
    };

</script>

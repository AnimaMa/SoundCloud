<template>
    <div>
        <slot></slot>
    </div>
</template>

<script>
    import $ from 'jquery';
    import slick from 'slick-carousel';

    export default {

        props: {
            settings: {
                type: Object
            },
            autoplay: {
                type: Boolean,
                default: true
            },
            autoplaySpeed: {
                type: Number,
                default: 4000
            },
            slidesToShow: {
                type: Number,
                default: 1
            },
            slidesToScroll: {
                type: Number,
                default: 1
            },
            fade: {
                type: Boolean,
                default: false
            },
            infinite: {
                type: Boolean,
                default: true
            },
            speed: {
                type: Number,
                default: 1200
            },
            pauseOnHover: {
                type: Boolean,
                default: false
            },
            arrows: {
                type: Boolean,
                default: true
            },
            variableWidth: {
                type: Boolean,
                default: false
            },
            centerMode: {
                type: Boolean,
                default: false
            },
            dots: {
                type: Boolean,
                default: false
            },
            draggable: {
                type: Boolean,
                default: true
            },
            swipe: {
                type: Boolean,
                default: true
            },
            vertical: {
                type: Boolean,
                default: false
            }
        },

        mounted() {
            this.$nextTick(() => {
                if(this.settings) {
                    $(this.$el).slick(this.settings);
                } else {
                    $(this.$el).slick({
                        slidesToShow: this.slidesToShow,
                        slidesToScroll: this.slidesToScroll,
                        fade: this.fade,
                        speed: this.speed,
                        infinite: this.infinite,
                        autoplay: this.autoplay,
                        autoplaySpeed: this.autoplaySpeed,
                        pauseOnHover: this.pauseOnHover,
                        arrows: this.arrows,
                        variableWidth: this.variableWidth,
                        centerMode: this.centerMode,
                        dots: this.dots,
                        draggable: this.draggable,
                        swipe: this.swipe,
                        vertical: this.vertical
                    });
                }
            });
        }
    }
</script>
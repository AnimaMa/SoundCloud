<template>
    <div class="scrollable-wrap">
        <div class="scrollable" ref="scrollable">
            <slot></slot>
        </div>
        <div class="more-icon" v-show="moreIconVisible" title="skroluj pre viac textu"></div>
    </div>
</template>

<style>
    .scrollable-wrap {
        position: relative;
    }

    .scrollable-wrap .more-icon {
        background-image: url(/img/common/dots.svg);
        position: absolute;
        bottom: -18px;
        left: 0;
        right: 0;
        margin: 0 auto;
        width: 36px;
        height: 10px;
    }
</style>

<script>
    import $ from 'jquery';
    import Ps from 'perfect-scrollbar';

    export default {
        props: {
            turnOffBreakpoint: {
                type: Number,
                default: 0
            }
        },

        data() {
            return {
                loaded: false,
                moreIconVisible: false,
                config: {
                    swipePropagation: true,
                    wheelPropagation: true,
                    wheelSpeed: 0.3
                }
            }
        },

        mounted() {
            this.$nextTick(() => {
                if(screen.width > this.turnOffBreakpoint) {
                    Ps.initialize(this.$refs.scrollable, this.config);
                    this.loaded = true;
                    if($(this.$refs.scrollable).hasClass('ps-active-y')) {
                        this.moreIconVisible = true;
                    }
                }

                this.$refs.scrollable.addEventListener('ps-y-reach-end', () => {
                    this.moreIconVisible = false;
                });

                this.$refs.scrollable.addEventListener('ps-scroll-up', () => {
                    this.moreIconVisible = true;
                });
            });

            $(window).resize(() => {
                if(this.loaded && screen.width <= this.turnOffBreakpoint) {
                    Ps.destroy(this.$refs.scrollable);
                    this.loaded = false;

                }
                if(!this.loaded && screen.width > this.turnOffBreakpoint) {
                    Ps.initialize(this.$refs.scrollable, this.config);
                    this.loaded = true;
                }
            })

        }
    }
</script>
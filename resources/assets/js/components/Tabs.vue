
<template>
    <div class="tabs">
        <div class="nav-container">

            <div class="nav-wrap">
                <div class="nav">
                    <div class="nav-scroll big-padding" ref="nav">
                        <a href="#" v-for="(tab, index) in tabs"
                           @click.prevent="onClick(index)"
                           :class="{'active': index === activeIndex}"
                        >{{tab.title}}</a>
                    </div>

                </div>
                <a href="/odmena" v-show="isPath('/sluzby')" class="button fill"> Odmena za služby</a>


            </div>

        </div>


        <div class="tab-content">
            <slot></slot>
        </div>
    </div>
</template>
<style>
    .tabs .nav-scroll {
        list-style: none;
        display: flex;
        justify-content: flex-start;
        width: 100%;
        position: relative;
    }

    .tabs .nav {
        position: relative;
    }


</style>
<script type="text/ecmascript-6">
    import $ from 'jquery';
    import Tab from './Tab.vue';
    import scrollToElement from 'scroll-to-element';
    import eventBus from '../EventBus';

    export default {
        components: {
            Tab
        },

        data: function () {
            return {
                tabs: [],
                activeIndex: 0,
            }
        },

        created() {
            eventBus.$on('change-service-slide', (index) => {
                let zeroIndex = index - 1;
                this.activeIndex = zeroIndex;

                let hash = '#' + this.tabs[zeroIndex].slug;
                this.setHash(hash);

                scrollToElement('.tab-content', {
                    duration: 500,
                    ease: 'inOutCube'
                });
            });
        },

        mounted() {
            this.setActual(window.location.hash.substr(1));
        },

        computed: {
            actualContent: function () {
                return this.tabs[this.activeIndex] ? this.tabs[this.activeIndex].content : '';
            }
        },

        methods: {

            setActual(hash) {
                let tabToSet = 0;

                this.tabs.forEach((tab, index) => {
                    if (tab.slug == hash) {
                        tabToSet = index;
                    }
                });

                this.activeIndex = tabToSet;

            },

            onClick(index) {
                this.activeIndex = index;

                let hash = '#' + this.tabs[index].slug;

                this.setHash(hash);

                if (window.mobilecheck()) {
                    scrollToElement('.tab-content', {
                        duration: 500,
                        ease: 'inOutCube'
                    });
                }
            },

            setHash(hash) {
                if (history.pushState) {
                    history.pushState(null, null, hash);
                } else {
                    location.hash = hash;
                }
            },

            isPath(path) {
                return path == window.location.pathname;
            }
        }
    }
</script>
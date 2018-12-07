<!-- example of use
<basic-header :height="120" single-page sticky>
    <span slot="logo">COMPANY</span>
    <nav slot="nav">
        <a href="#section1">Link 1</a>
        <a href="#section2">Link 2</a>
        <a href="#section3">Link 3</a>
        <a href="#section4">Link 4</a>
    </nav>
</basic-header>
-->

<template>
    <div class="header-wrap" :class="{'sticky': sticky}">
        <header class="basic" ref="main">
            <a href="/" class="logo">
                <slot name="logo"></slot>
            </a>
            <div class="nav-normal">
                <slot name="nav"></slot>
            </div>
            <hamburger type="slider" @click.native="toggleMobileNav" :activated="mobileNavOpened"></hamburger>
        </header>
        <div class="nav-mobile" ref="mobileNav">

        </div>
    </div>
</template>

<style>
    .header-wrap {

    }

    .header-wrap.sticky {
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 10;
    }

    header.basic {
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 100px;
        position: relative;
        z-index: 4;
    }

    .hamburger {
        display: none !important;
    }

    .nav-mobile {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: #ddd;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding-bottom: 70px;
        color: white;
        padding-top: 140px;

        transform: translateY(-100vh);
        transition: transform 0.7s;
    }

    .nav-mobile.opened {
        transform: translateY(0);
    }

    .nav-mobile nav {
        height: 82%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }


    @media(max-width: 1140px) {
        .hamburger {
            display: block !important;
        }

        .nav-normal {
            display: none;
        }
    }
</style>

<script>
    import $ from 'jquery';
    import scrollToElement from 'scroll-to-element';

    export default {
        components: {
            Hamburger: require('./Hamburger.vue')
        },

        props: {
            sticky: {
                type: Boolean
            },

            singlePage: {
                type: Boolean
            },

            height: {
                type: Number,
                default: 100
            }
        },

        data() {
            return {
                mobileNavOpened: false
            }
        },

        mounted() {
            this.$nextTick(() => {
                this.setInitialHeight();

                this.copyNavToMobile();

                this.setNavLinksScrolling();
            });
        },

        methods: {
            copyNavToMobile() {
                let nav = $('.nav-normal').html();
                $(this.$refs.mobileNav).html(nav);
            },

            setInitialHeight() {
                $(this.$refs.main).css('height', this.height);
//                $(this.$refs.mobileNav).css({
//                    top: this.height,
//                    height: 'calc(100vh - '+this.height+'px)'
//                });

                if(this.sticky) {
                    $('body').css('paddingTop', this.height);
                }
            },

            setNavLinksScrolling() {
                let vm = this;
                if(this.singlePage) {
                    $(this.$el).on('click', 'nav a', function(e) {
                        e.preventDefault();
                        scrollToElement(e.target.hash, {
                            duration: 1500,
                            ease: 'inOutCube',
                            offset: -1 * vm.height
                        });
                        if(vm.mobileNavOpened) {
                            vm.toggleMobileNav();
                        }
                    });
                }
            },

            toggleMobileNav() {
                $(this.$refs.mobileNav).toggleClass('opened');
                this.mobileNavOpened = !this.mobileNavOpened;

                if($(this.$refs.mobileNav).hasClass('opened')) {
                    $('body').css('overflow', 'hidden');
                    document.ontouchmove = function(e){ e.preventDefault(); }
                } else {
                    $('body').css('overflow', 'auto');
                    document.ontouchmove = function(e){ return true; }
                }
            }
        }
    }
</script>
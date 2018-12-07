<!-- example of use
use in BasicHeader.vue

<custom-hamburger open-img="/img/menu_burger.svg" close-img="/img/menu_close.svg" @click.native="toggleMobileNav" :activated="mobileNavOpened"></custom-hamburger>
-->

<template>
    <button class="custom-hamburger">
        <img :src="activeImage" alt="">
    </button>
</template>

<style>
    .custom-hamburger {
        border: 0;
        background: transparent;
        outline: 0;
    }

    .custom-hamburger img {
        display: block;
        height: 54px;
    }
</style>

<script>
    export default {
        props: ['openImg', 'closeImg', 'activated'],

        computed: {
            activeImage() {
                return (this.activated) ? this.closeImg : this.openImg;
            }
        }
    }
</script>
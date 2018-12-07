<template>
    <div class="notification" :class="{'opened': opened}">
        <div class="notification-bg" @click="close"></div>
        <div class="notification-box">
            <div class="notification-close" @click="close">&times;</div>
            <div v-html="msg"></div>
        </div>
    </div>
</template>

<style>
    .notification {
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        bottom: 0;
        z-index: 100;
        align-items: center;
        justify-content: center;
    }

    .notification.opened {
        display: flex;
    }

    .notification-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: -1;
    }

    .notification-box {
        background: white;
        width: 310px;
        min-height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 101;
        padding: 30px;
        line-height: 26px;
        font-size: 16px;
        text-align: center;
    }

    .notification-close {
        position: absolute;
        right: 9px;
        top: 0;
        font-size: 26px;
        font-family: "Trebuchet MS", Verdana, sans-serif;
        cursor: pointer;
        padding: 4px;
    }
</style>

<script>
    import eventBus from '../EventBus';

    export default{
        data() {
            return {
                opened: false,
                msg: '',
                type: 'info'
            }
        },

        created() {
            eventBus.$on('notification', (msg, type) => {
                this.msg = msg;
                this.type = type;
                this.open();
            });
        },

        methods: {
            open() {
                this.opened = true;
            },

            close() {
                this.opened = false;
            }
        }
    }
</script>
<!--
use:

<cookies-notification
        language="{{ craft.locale }}"
        background-color="#f9f8f7"
        text-main="{{ 'Pri poskytovaní našich služieb nám pomáhajú súbory cookie. Využívaním našich služieb s ich používaním súhlasíte.' | t }}"
        text-more-information="{{ 'Viac informácií' | t }}"
        text-agree="{{ 'Súhlasím' | t }}"
>
</cookies-notification>
-->

<template>
    <div class="cookies-notification" v-show="!alreadySeen">
        <div class="cookies-notification-wrap">
            <p>
                {{ textMain }}
                <a :href="cookieInfoLink" target="_blank">{{ textMoreInformation }}</a>
            </p>
            <button class="button cookies-button" @click="hide">{{ textAgree }}</button>
        </div>
    </div>
</template>

<style>
    .cookies-notification {
        position: fixed;
        z-index: 100;
        bottom: 0;
        left: 0;
        width: 100%;
        min-height: 60px;
        background-color: #000;
        color: #000;
        font-size: 12px;
        transition: transform 0.4s;
    }

    .cookies-notification.hidden {
        transform: translateY(100%);
    }

    .cookies-notification-wrap {
        max-width: 1400px;
        height: 100%;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 20px;
        padding-bottom: 20px;
        padding-left: 20px;
        padding-right: 20px;
    }

    .cookies-notification-wrap p {
        margin: 0;
    }

    .cookies-notification button {
        cursor: pointer;
        margin-left: 40px;
        min-width: 140px;
        margin-top: 0;
        margin-bottom: 0;
    }

    .cookies-notification p a {
        text-decoration: underline;
    }

    .cookies-notification p a:hover {
        text-decoration: none;
    }

    @media(max-width: 500px) {
        .cookies-notification-wrap {
            flex-direction: column;
            text-align: center;
        }

        .cookies-notification button {
            margin-left: 0;
            margin-top: 10px;
        }
    }

</style>

<script>
    import Cookies from 'js-cookie';

    export default {
        props: {
            backgroundColor: {
                type: String,
                default: 'black'
            },
            language: {
                type: String,
                default: 'sk'
            },
            textMain: {
                type: String
            },
            textMoreInformation: {
                type: String
            },
            textAgree: {
                type: String
            }

        },

        computed: {
            cookieInfoLink() {
                return 'https://www.google.com/intl/' + this.language + '/policies/technologies/cookies/'
            },

            alreadySeen() {
                         return Cookies.get('cookies-notification-seen');
            }
        },

        mounted() {
            this.$nextTick(() => {
                this.$el.style.backgroundColor = this.backgroundColor;
                this.$el.classList.add('hidden');

                setTimeout(() => {
                    this.$el.classList.remove('hidden');

                }, 2000);
            });

        },

        methods: {
            hide() {
                this.$el.classList.add('hidden');

                Cookies.set('cookies-notification-seen', true, { expires: 365 });
            },
        }
    }
</script>
<!--
Example usage:

<craft-contact-form success="Správa bola úspešne odoslaná">
    <input type="text" name="fromName" placeholder="Meno">
    <input type="text" name="fromEmail" placeholder="Email">
    <input type="text" name="message[phone]" placeholder="Telefón">
    <textarea name="message[body]" placeholder="Podrobnejšie napíšte, o čo máte záujem"></textarea>
    <button type="submit" class="button small">Odoslať</button>
</craft-contact-form>
-->

<template>
    <form method="post" action="" accept-charset="UTF-8" @submit.prevent="send">
        <input type="hidden" name="action" value="contactForm/sendMessage">
        <div class="errors"><div class="error" v-for="error in errors">{{ error }}</div></div>
        <slot></slot>
    </form>
</template>

<script>
    import $ from 'jquery';
    import eventBus from '../EventBus';

    export default {

        props: ['success'],

        data: function() {
            return {
                errors: []
            }
        },

        methods: {
            send() {
                var data = $(this.$el).serialize();
                this.errors = [];

                $.post('/', data, (response) => {
                    if (response.success) {
                        eventBus.$emit('notification', this.success, 'success');
                        this.resetForm();
                        this.errors = [];
                    } else {
                        for (var property in response.error) {
                            if (response.error.hasOwnProperty(property)) {
                                this.errors.push(response.error[property][0]);
                            }
                        }
                    }
                });
            },

            resetForm() {
                $(this.$el)[0].reset();
            }
        }

    };
</script>
<template>
    <span :id="encodeId">

    </span>
</template>

<script>
    export default {
        props: ['encodeId', 'encrypted'],

        mounted() {
            this.$nextTick(() => {
                console.log(this.$el);

                let emailAnchor = this.encrypted.replace(/[a-zA-Z]/g, function(c){return String.fromCharCode((c<="Z"?90:122)>=(c=c.charCodeAt(0)+13)?c:c-26);});

                this.$el.innerHTML = emailAnchor;
            });
        }
    }
</script>
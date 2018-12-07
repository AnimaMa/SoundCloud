

<template>
    <div class="tab" v-show="show" :id="slugWithHash">
        <h3 class="h3">Naše služby</h3>
        <h2 class="h1">{{ title }}</h2>

        <slot></slot>
    </div>
</template>
<style>
    .tabs {

    }

</style>
<script>
    export default {
        props: ['title', 'slug'],

        data() {
            return {
                index: 0
            }
        },

        computed: {
            show() {
                return (this.$parent.activeIndex == this.index);
            },

            slugWithHash() {
                return '#' + this.slug;
            }
        },

        mounted() {
            this.$parent.tabs.push({
                title: this.title,
                slug: this.slug
            });

            for (var c in this.$parent.$children)
            {
                if (this.$parent.$children[c].$el == this.$el)
                {
                    this.index = c;
                    break;
                }
            }
        }

    }
</script>
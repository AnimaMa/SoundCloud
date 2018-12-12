<template>
    <div class="" v-on:scroll="handleScroll" >
        <slot></slot>

    </div>

</template>

<script>
    import $ from 'jquery';

    export default {
        data() {
            return {

            }
        },

        created () {
            console.log('nana');

            window.addEventListener('scroll', this.handleScroll);

        },
        methods: {
            handleScroll () {
                // Any code to be executed when the window is scrolled
                let section = $('.media-holder');
                let sections= $('.sections-holder');

                // sections.style("translate3d", clientHeight )


                section.css( "background-color", "blue" );
                // section.css(  "transform", " scale(1, 1)" );

                section.addClass("trans");


let  docHeight = document.documentElement.offsetHeight;
                let scrolled = window.scrollY / ( docHeight - window.innerHeight ),
                    transformValue = 'scale('+scrolled+')';

                var clientWidth= Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
                let clientHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
                //
                // console.log(w);
                // console.log('-----');
                // console.log(h);


                let trans = "(0," + clientHeight +",0)";

                section.scrollTop(clientHeight);

                var scrollTop = $(window).scrollTop()
                console.log(scrollTop);


            }
        },




        }
</script>
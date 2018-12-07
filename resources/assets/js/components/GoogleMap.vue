<!--
pridat pred /body a vytvorit API_KEY
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY" async defer></script>

use:
<google-map
        :lat="{{ entry.latitude }}"
        :lng="{{ entry.longitude }}"
        :zoom="14"
        title="MM Fitness"
        marker-path="/img/marker.svg"
        :marker-size="[34, 34]"
        :marker-anchor="[17, 17]"
></google-map>
-->

<template>
    <div class="google-map"></div>
</template>

<style scoped>
    .google-map {
        min-height: 300px;
    }
</style>

<script>
    export default {

        props: {
            lat: {
                type: Number,
                required: true
            },
            lng: {
                type: Number,
                required: true
            },
            zoom: {
                type: Number,
                default: 12
            },
            label: {
                type: String
            },
            markerPath: {
                type: String
            },
            markerSize: {
                type: Array
            },
            markerAnchor: {
                type: Array,
                default() {
                    return [0, 0]
                }
            }
        },

        mounted() {
            this.$nextTick(() => {
                let position = {lat: this.lat, lng: this.lng};

                let map = new google.maps.Map(this.$el, {
                    center: position,
                    zoom: this.zoom,
                    scrollwheel: false,
                    styles: [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}]
                });

                let marker = new google.maps.Marker({
                    position,
                    map,
                    title: this.label,
                    icon: this.getIcon()
                });
            });
        },

        methods: {
            getIcon() {
                if(this.markerPath) { //path is set, return custom icon
                    return {
                        url: this.markerPath,
                        size: new google.maps.Size(this.markerSize[0], this.markerSize[1]),
                        origin: new google.maps.Point(0, 0), //position in sprite
                        anchor: new google.maps.Point(this.markerAnchor[0], this.markerAnchor[1]) //pointing part of image
                    };
                } else {
                    return null; //default icon will be used
                }
            }
        }
    }
</script>
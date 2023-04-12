
<template>


 
</template>
 
<script>
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";
 
// swiper bundle styles
import "swiper/swiper-bundle.min.css";
 
// swiper core styles
import "swiper/swiper.min.css";
 
// modules styles
import "swiper/components/navigation/navigation.min.css";
import "swiper/components/pagination/pagination.min.css";
 
// import Swiper core and required modules
import SwiperCore, { Pagination, Navigation } from "swiper";
 
// install Swiper modules
SwiperCore.use([Pagination, Navigation]);
export default {
  components: {
    Swiper,
    SwiperSlide,
  },
};
</script>
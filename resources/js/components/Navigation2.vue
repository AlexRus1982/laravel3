<template>
<ul class="panel__table">

    <router-link class="nav-link" to="/">
        <li></li>
    </router-link  >
    <router-link class="nav-link" to="/Mo">
        <li>Хорека</li>
    </router-link>
    <router-link class="nav-link" to="/Sa">
        <li >Частные интерьеры</li>
    </router-link>
    <router-view name="a"></router-view>

</ul>


</template>

<script>
 
export default{
data(){


},
  
}
</script>


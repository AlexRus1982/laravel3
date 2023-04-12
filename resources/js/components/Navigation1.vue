<template>
<div>
<ul class="panel__table">

    <router-link to="/">
      <li class="table__col table__col_start">Все</li>
    </router-link>
    <router-link to="/Moscow">
      <li class="table__col">Москва</li>
    </router-link>
    <router-link to="/SanctPeterburg">
      <li class="table__col">Санкт-Петербург</li>
    </router-link>

    <router-link to="/Sklad">
      <li class="table__col">Склад</li>
    </router-link>
    <router-link to="/Contacts">
      <li class="table__col">Контакты</li>
    </router-link>
    <router-link to="/Requisites">
      <li class="table__col table__col_end">Реквизиты</li>
    </router-link>
  </ul>
  
 
</div>
</template>
<script>
 
export default{
data(){


},
  
}
</script>
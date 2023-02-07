<template>
  <div class="test">
    <HomeHeader/>
    <FirstContent title="Votre partenaire au Maroc pour toutes vos demandes de visa" msg1="Bienvenue " msg2=" " />
    <div>
      
    </div>
  </div>
</template>

<script>
import FirstContent from "@/components/FirstContent.vue"
import HomeHeader from "@/components/HomeHeader.vue"


export default {
  name: 'HomeView',
  components: {
    FirstContent,
    HomeHeader,
  }
  ,
}
</script>

<style scoped>
.first{
  width: 100%;
  height: 100vh;
  background: linear-gradient(to top, rgb(0,0,0,0.3) ,rgb(0,0,0,0.3)), url(../assets/11.jpg);
  background-position: center;
  background-size: cover;
}

</style>
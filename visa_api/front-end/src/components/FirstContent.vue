<template>
    <div class="first">
      <div class="first-section container">
        <div class="content">
          <div class="title">
            <span>{{ title }} </span>
            <h1> {{ msg1 }} <br> {{ msg2 }} <br> {{ msg3 }} </h1>
          </div>
          <button class="btn  bg-black text-light col-3" @click="goToSignIn()" >Book Online</button>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    name: 'FirstContent',
    props: {
    title: String,
    msg1: String,
    msg2: String,
    msg3: String,
  },
   methods:{
   goToSignIn(){
   this.$router.push('/signIn'); 
      }
  }
} 
</script>

<style scoped>
*{
  margin: 0;
  padding: 0;
}

.first-section{
  width: 100%;
  height: 100%;
}
.content{
  display: flex;
  flex-direction: column;
  height: 100%;
  justify-content: center;
}
.title{
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-bottom: 1rem !important;
  font-family: 'ubuntu';
}
.title span{
  font-weight: 700;
  color: #c6d1d0;
  font-size: 1.2rem;
}
.title h1{
  font-weight: 900;
  color: #fff ;
  font-size: 3rem;
}
</style>
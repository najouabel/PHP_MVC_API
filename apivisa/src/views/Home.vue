<template>
<div class="all">
  <div id="nav">
    <div class="box">
      <router-link class="link" :to="{ path: '/'}">Home</router-link>
      <router-link class="link" :to="{ path: '/Signup'}">Register</router-link>
      <router-link class="link" :to="{ path: '/Login'}">Login</router-link>

    </div>
  </div>
 
  <div class="container">
        <div class="btns">
          <button class="btns_more">
            <router-link :to="{ path: '/Signup'}">NewUser</router-link>
          </button>
          <button class="btns_more">
            <router-link :to="{ path: '/Login'}">Login</router-link>
          </button>
    </div> 
  </div>
  </div>
</template>
<script>
export default {
  name: "Home",
};
</script>
<style>

#nav {
  display: flex;
  justify-content: space-between;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
.link {
  margin: 10px;
  text-decoration: none;
}

.link {
  text-decoration: none;
  color: black;
  padding-top: 15px;
  padding-bottom: 15px;
  padding-right: 79px;
  padding-left: 80px;
  font-weight: bold;
}
.all{
background: no-repeat center/100% url("../assets/img.jpg"); 
}
.container {
  display: flex;
  height: 100vh;
   
  /* background-color:#bd8181; */
  justify-content: space-around;
  align-items: center;
  color: black;
  /* position: relative; */
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
    Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}

/* .container_content {
  width: 50%;
} */
/* 
.container_content_inner {
  width: 80%;
  margin-left: 80px;
} */

/* .container_outer_img {
  margin: 50px;
  width: 50%;
  overflow: hidden;
}

.container_img {
  width: 100%;
} */

.par {
  height: auto;
  overflow: hidden;
}

.btns {
  height: 100%;
  position: relative;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
  /* margin:auto; */
}

.btns_more {
  background: #4e7af3;
  /* border: 1px solid #392399; */
  border-radius: 10px;
  /* color: #f6fcf9; */
  cursor: pointer;
  font-size: 16px;
  position: relative;
  margin: 15px;
  width: 200px;
  height: 50px;
  outline: none;
  /* padding-left: -15px */
}

.title {
  overflow: hidden;
  height: auto;
}

h1 {
  font-size: 40px;
  color: #48cae4;
  margin-bottom: 20px;
  transform: translateY(100px);
  animation: slideUp 0.8s ease forwards 0.5s;
}

@keyframes slideIn {
  0% {
    transform: translateX(500px) scale(0.2);
  }
  100% {
    transform: translateX(0px) scale(1);
  }
}

@keyframes slideUp {
  0% {
    transform: translateY(300px);
  }
  100% {
    transform: translateY(0px);
  }
}

@keyframes expand {
  0% {
    transform: translateX(1400px);
  }
  100% {
    transform: translateX(0px);
  }
}
@media only screen and (max-width: 1020px) {
  .container {
    flex-direction: column-reverse;
  }
  .container_content {
    width: 100%;
  }
  .container_outer_img {
    width: 95%;
    border-radius: 10px;
  }
}
</style>

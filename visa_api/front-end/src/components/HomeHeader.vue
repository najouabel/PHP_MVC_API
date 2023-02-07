<template>

<!-- Nav Bar -->
<div class="home">
    <nav class="navbar navbar-expand-lg navbar-dark ">
      <div class="container">
        <!-- <a class="navbar-brand" href="#">Web Zone</a> -->
        <img src="../assets/S2.png" style="width:130px;" alt="">
        <button
          class="navbar-toggler btn-dark"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mx-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link class="nav-link text-light link-r" to="/">Home</router-link>
            </li>
            
            <li class="nav-item">
              <router-link class="nav-link text-light link-r" to="/signIn">Sign In</router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</div>

    
</template>

<script>
export default {
    name: 'HomeHeader',
  components: {
  }
}
</script>


<style scop>
.link-r{
  font-weight: 500;
  font-size: 1.1rem;
}
.home{
 background-color: black;
}
</style>



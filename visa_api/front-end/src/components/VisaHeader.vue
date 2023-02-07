<template>
  <!-- Nav Bar -->
  <div class="home">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <!-- <a class="navbar-brand" href="#">Web Zone</a> -->
        <img src="../assets/S2.png" style="width: 130px" alt="" />
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
              <router-link class="nav-link text-dark link-r" to="/search"
                >Home</router-link
              >
            </li>
            <li class="nav-item">
              <router-link class="nav-link text-dark link-r" to="/MyBooking"
                >My visa</router-link
              >
            </li>
            <li class="nav-item">
              <a id="logout" href="" v-on:click="logout" > Log Out </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  watch: {
  },
  name: "VisaHeader",
  components: {},
  methods: {
    logout() {
      localStorage.removeItem("storedData");
      this.$router.push("/signIn");
    },
  },
};
</script>

<style scop>
.link-r {
  font-weight: 500;
  font-size: 1.1rem;
}
#logout {
    display: block;
    padding: 0.5rem 1rem;
    color: #758cad;
    text-decoration: none;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;
    color: black;
    font-weight: 500;
    font-size: 1.1rem;
}
</style>

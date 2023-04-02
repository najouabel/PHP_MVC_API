<template>
  <section class="vh-100 all" style="background-color: ">
      <div id="nav">
    <div class="box">
      <router-link class="link" :to="{ path: '/'}">Home</router-link>
      <router-link class="link" :to="{ path: '/Signup'}">Register</router-link>
      <router-link class="link" :to="{ path: '/Login'}">Login</router-link>
    </div>
    <!-- <button class="logout" @click="logout">LOGOUT</button> -->
  </div>
    <!-- <div class="container h-100"> -->
      <div class="row d-flex justify-content-center align-items-center h-100 ">
        <div class="">
          <div class="" style="border-radius: ">
            <div class="card-body p-md-5 ">
              <div class="row justify-content-center">
                <div
                  class="col-md-10 col-lg-6 d-flex justify-content-center align-items-center col-xl-5 order-2 order-lg-1 soma"
                >
                  <div class="row" v-if="ref">
                    <label for="inputEmail4">Your ID </label>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <input
                          type="text"
                          class="form-control"
                          id="inputEmail4"
                          :value="ref"
                          required
                          placeholder="Your ID"
                          readonly
                        />
                      </div>
                    </div>
                    <router-link
                      :to="{ path: '/rdv/' + ref }"
                      class="btn btn-primary btnref"
                      tag="button">Login</router-link>
                  </div>
                  <div v-else>
                    <label
                      for="inputEmail4"
                      class="text-center h2 fw-bold mb-5 mx-1 mx-md-4 mt-4"
                      >Welcome</label
                    ><br /><br />
                    <input
                      type="text"
                      v-model="refl"
                      class="form-control"
                      id="inputEmail4"
                      placeholder="Your ID"
                      required
                    />
                    <button
                      class="btn btn-primary btn-lg btnref mt-3"
                      @click="search()"
                    >
                      Login
                    </button>
                    <div>
                      <p class="mt-5 pb-lg-2" style="color: #393f81">
                        Don't have an account ?
                        <router-link :to="{ path: '/' }"
                          >Signup</router-link
                        >
                      </p>
                    </div>
                  </div>
                  <div class="alert alert-danger" role="alert" v-if="erreur">
                    {{ erreur }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- </div> -->
  </section>
</template>
<script>
/* eslint-disable */
export default {
  name: "Reference",
  data() {
    return {
      ref: "",
      refl: "",
      erreur: "",
    };
  },
  mounted() {
    let refer_1 = localStorage.getItem("refl");
    if (!refer) {
      this.$router.push("/");
    }
  },
  methods: {
    async search() {
      const response = await fetch(
        "http://localhost/apivisa/back-end/api/User/Signin/" + this.refl
      );
      const data = await response.json();

      if (data.message) {
        this.erreur = data.message;
        console.log(this.erreur);
      } else {
        localStorage.setItem("refl", this.refl);
        this.$router.push("/rdv");
        console.log(this.refl);
      }
    },
  },
  mounted: function () {
    this.ref = this.$route.params.ref;
  },
};
</script>
<style >

.soma{
  background: #3a5cb9;
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
  border-radius: 10px;
}
.all{
   height: 100vh;
  background: no-repeat center/100% url("../assets/img.jpg"); 
}
</style>
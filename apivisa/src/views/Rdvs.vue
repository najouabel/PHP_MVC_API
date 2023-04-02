<template>
  <div class="all">
    <div id="nav">
      <div class="box">
        <router-link class="link" :to="{ path: '/' }">Home</router-link>
        <router-link class="link" :to="{ path: '/Signup' }"
          >Register</router-link
        >
        <router-link class="link" :to="{ path: '/Login' }">Login</router-link>
      </div>
      <!-- <button class="logout" @click="logout">LOGOUT</button> -->
    </div>
    <div class="container-fluid affcont">
      
      <div class="row rdvherd">
        <div class="col-10" style="text-align: left"></div>
        <div class="col-12">
       
          <router-link
            class="btn btn-primary"
            style="width: 10vh"
            :to="{ path: '/reservation/' }" v-if="rdvs.length == 0"
            >+</router-link
          >
        </div>
      </div>
      <div class="row">
        <div class="card-body">
          Reference : {{ ref }}
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Timeframe</th>
                  <th>type de visa</th>
                  <th>type of document</th>
                  <th>depart</th>
                  <th>arrive</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="elemt in rdvs" v-bind:key="elemt.id">
                  <template v-if="editClient.id == elemt.id">
                    <td><input v-model="date" type="date" /></td>
                    <!-- <td><input v-model="editClient.horaire" type="text"></td> -->
                    <td>
                      <select
                        class="form-control"
                        id="exampleFormControlSelect1"
                        v-model="editClient.horaire"
                      >
                        <option disabled>choisir un horaire</option>
                        <option
                          v-for="(el, index) in horairesPr"
                          :key="index"
                          :disabled="el.etat"
                        >
                          {{ el.val }}
                        </option>
                      </select>
                    </td>
                    <td>
                      <select  v-model="editClient.typeVisa" aria-label=".form-select-sm example">
                
                            <option value="Visa de travail" >Visa de travail</option>
                            <option value="Visa étudiant">Visa étudiant</option>
                            <option value="Visa Affaires">Visa Affaires</option>
                            <option value="Visa vacances">Visa vacances</option>
                            <option value="Visa medical">Visa medical</option>
                </select></td>
                    <td>
                      <select  v-model="editClient.typeDoc" aria-label=".form-select-sm example">
                  
                        <option value="passport">passport</option>
                        <option value="CIN">CIN</option>
                </select>
              </td>
                    <td><input v-model="editClient.depart" type="date" /></td>
                    <td><input v-model="editClient.arrive" type="date" /></td>
                    <td>
                      <button
                        class="btn btn-success btn-sm rounded-0"
                        @click="update()"
                      >
                        UPDATE <i class="fa fa-check"></i>
                      </button>
                      &nbsp;<button
                        class="btn btn-sm rounded-0"
                        @click="cancel()"
                      >
                        <i class="fa fa-ban"></i>
                      </button>
                    </td>
                  </template>
                  <template v-else>
                    <td>{{ elemt.date }}</td>
                    <td>{{ elemt.horaire }}</td>
                    <td>{{ elemt.typeVisa }}</td>
                    <td>{{ elemt.typeDoc }}</td>
                    <td>{{ elemt.depart }}</td>
                    <td>{{ elemt.arrive }}</td>
                    <td>
                      <button
                        class="btn btn-danger btn-sm rounded-0"
                        @click="
                          slectU(elemt.id);
                          del();
                        "
                      >
                        DELETE <i class="bi bi-trash"></i>
                      </button>
                      &nbsp;
                      <button
                        class="btn btn-primary btn-sm rounded-0"
                        @click="edit(elemt.id)"
                      >
                        UPDATE
                        <i
                          class="fa fa-pencil fa-fw"
                          aria-hidden="true"
                          style="color: #fff"
                        ></i>
                      </button>
                    </td>
                  </template>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
/* eslint-disable */
export default {
  name: "RendezVous",
  data() {
    return {
      rdvs: [],
      ref: "",
      date: "",
      curentElment: "",
      editReser: "",
      editClient: {
        id: "",
        date: "",
        horaire: "",
        typeVisa: "",
        typeDoc: "",
        depart: "",
        arrive: "",
      },
      horairesPr: [
        { val: "08:00-09:00", etat: false },
        { val: "09:00-10:00", etat: false },
        { val: "10:00-11:00", etat: false },
        { val: "11:00-12:00", etat: false },
        { val: "13:00-14:00", etat: false },
        { val: "14:00-15:00", etat: false },
        { val: "15:00-16:00", etat: false },
        { val: "16:00-17:00", etat: false },
        { val: "17:00-18:00", etat: false },
      ],
      horaires: [],
    };
  },
  mounted(){
     this.refer();
     this.getAll();
 
  },
  methods:{
    async getAll(){
    const response = await fetch('http://localhost/apivisa/back-end/api/rdv/afficherRdv/'+this.ref);
    const data = await response.json();
    console.log(data);
    this.rdvs=data;
    },
    refer(){
        this.ref = localStorage.getItem('refl');
        },
    slectU(x){
       this.curentElment=x;
    },

    async del() {
        await fetch('http://localhost/apivisa/back-end/api/rdv/supprimerRdv/'+this.curentElment,{
            method:"DELETE",
            
        });
       await this.getAll();
               this.$swal("Success!", "Your reservation has been deleted!", "success");

    },
    async edit(x){
        fetch('http://localhost/apivisa/back-end/api/rdv/getoneRdv/'+x)
        .then(response => response.json())
        .then(data =>{
            this.editReser=data.id;
            this.editClient.id=data.id;
            this.editClient.date=data.date;
            this.date=data.date;
            this.editClient.horaire=data.horaire;
            this.editClient.typeVisa=data.typeVisa;
            this.editClient.typeDoc=data.typeDoc;
            this.editClient.depart=data.depart;
            this.editClient.arrive=data.arrive;
            this.filtrerH(data.date);
            // console.log(this.editClient.horaire);
            
        })
    },
   async update(){
        console.log(JSON.stringify(this.editClient));
       await fetch(' http://localhost/apivisa/back-end/api/rdv/modifierRdv/'+this.editClient.id,{
            method: 'PUT',
            headers:{
                'Content-Type': 'application/json',
            },
            body:JSON.stringify(this.editClient),
        });
        await this.getAll();
        this.editReser='';
        this.editClient.id='';
        this.editClient.date='';
        this.editClient.horaire='';
        this.editClient.typeVisa='';
        this.editClient.typeDoc='';
        this.editClient.depart='';
        this.editClient.arrive='';
        console.log(JSON.stringify(this.editClient));
        this.$swal("Success!", "Your reservation has been update!", "success");

        
    },
    cancel(){
        this.editReser='';
        this.editClient.id=''
        this.editClient.date='';
        this.editClient.horaire='';
        this.editClient.typeVisa='';
        this.editClient.typeDoc='';
        this.editClient.depart='';
        this.editClient.arrive='';
    },
     async getTime(val) {
            
            const response = await fetch(
                "http://localhost/apivisa/back-end/api/rdv/afficherHr/" + val
            );
            const data = await response.json();
            this.horaires = data;
        },
         async filtrerH (val) {
            
            await this.getTime(val);
            await (this.editClient.date = val);
            await (this.editClient.reference = this.$route.params.ref);
            await console.log(this.editClient);
            //    await (console.log(this.horaires.length));
             for (var i = 0; i < this.horairesPr.length; i++) {
                await (this.horairesPr[i].etat = false);
                for (var j = 0; j < this.horaires.length; j++) {
                    if (this.horairesPr[i].val == this.horaires[j]) {
                        // console.log(this.horairesPr[i].etat);
                         await (this.horairesPr[i].etat = true);
                        console.log( this.horaires[j] + "///eg///");
                       
                    }
                }
            }
        }


  },
  watch: {
        date: async function (val) {
            this.editClient.horaire = "choisir un horaire";
            this.filtrerH (val);
        },
    },
 
};
</script>

<style>
.affcont {
  position: absolute;
  /* top: 10%; */
  padding: 5%;
  /* left: 5%; */
  /* transform: translate(-50%, -50%); */
}
.rdvherd {
  height: 20vh;
}
.btn-info {
  color: #fff;
}
table th {
  color: #162229;
}
.all {
  /* display: flex; */
  height: 100vh;
  background: no-repeat center/100% url("../assets/img.jpg");
  /* justify-content: space-around;
  align-items: center;
  color: black;
  position: relative;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
    Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif; */
}
</style>
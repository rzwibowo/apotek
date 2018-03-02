<template>
  <div class="Autorization">
    <div class="container">
        <div class="form-horizontal">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Please Login</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" >Username</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <input type="text" class="form-control" v-model="User.Username"
                              placeholder="Username"  required autofocus>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close"></i> Example error message
                        </span>
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="password">Password</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="password" class="form-control" id="password"  v-model="User.Password"
                                   placeholder="Password" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        <!-- Put password error message here -->
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="padding-top: .35rem">
                    <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                        <label class="form-check-label">
                            <input class="form-check-input" name="remember"
                                   type="checkbox" >
                            <span style="padding-bottom: .15rem">Remember me</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-lg btn-primary btn-block" v-on:click="LoginUser"> Login</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>
<script>
/* eslint-disable */
import axios from 'axios'
export default {
  name: 'Autorization',
  created() {
    this.Initialization()
  },
  data () {
    return {
      errors: [],
      User: {
        IdUser: Number,
        Username: String,
        Password: String,
      },
    }
  },
  methods:{
    GetCokies () {
      return this.$cookies.get("tokenUserApp")
    },
    LoginUser () {
      axios.post('http://localhost/apotek/webService/index.php/api/Login/UserAutorization', {
        body: this.User
      })
      .then(response => {
         if(response.data.length > 0){
          this.$cookies.set("tokenUserApp",response.data[0].idKaryawan,"7d");
          this.$router.go('/Index')
         }

      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    Initialization(){
      if(this.GetCokies() !== "" && this.GetCokies() !== null && this.GetCokies() !== "undefined"){
         this.$router.push("/Index");
      }else{
        this.User = {
            IdUser:0,
            Username:"",
            Password:"",
      }
     }
   }
  }
}
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<!-- <style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style> -->

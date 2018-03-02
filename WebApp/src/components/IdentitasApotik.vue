<template>
  <div class="ApotikController">
    <div class="row">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Identitas Apotik</h5>
          <form>
            <div class="form-group row required">
              <label class="col-form-label col-sm-5 text-right">Nama Apotik</label>
              <div class="col-sm-6">
                <input class="form-control" name="NamaApotik" v-model="Apotik.NamaApotik" type="text" :disabled="!IsEdit" maxlength="30">
              </div>
            </div>
            <div class="form-group row required">
              <label class="col-form-label col-sm-5 text-right">Alamat Apotik</label>
              <div class="col-sm-6">
                <textarea  class="form-control" rows="5" v-model="Apotik.AlamatApotik" name="AlamatApotik" :disabled="!IsEdit"></textarea>
              </div>
            </div>
            <div class="form-group row required">
              <label class="col-form-label col-sm-5 text-right">Kota</label>
              <div class="col-sm-6">
                <select name="kota" class="form-control" v-model="Apotik.IdKota" :disabled="!IsEdit">
                  <option value="">Pilih</option>
                  <option v-for="option in Kota" :value="option.IdKota">{{option.NamaKota}}</option>
                </select>
              </div>
            </div>
            <div class="form-group row required">
              <label class="col-form-label col-sm-5 text-right">Nomor Registrasi</label>
              <div class="col-sm-6">
                <input class="form-control" name="NoRegistrasi" v-model="Apotik.NoRegistrasi" type="text" maxlength="30" :disabled="!IsEdit">
              </div>
            </div>
            <div class="form-group row required">
              <label class="col-form-label col-sm-5 text-right">Nomor Telepon Apotik</label>
              <div class="col-sm-6">
                <input class="form-control" name="NoTelepon" v-model="Apotik.NoTelepon" type="text" maxlength="30" :disabled="!IsEdit">
              </div>
            </div>
            <div class="form-group row required">
              <label class="col-form-label col-sm-5 text-right">Nama Pemilik</label>
              <div class="col-sm-6">
                <input class="form-control" name="NamaPemilik" v-model="Apotik.NamaPemilik" type="text" maxlength="30" :disabled="!IsEdit">
              </div>
            </div>
            <div class="form-group row required">
              <label class="col-form-label col-sm-5 text-right">Slogan Apotik</label>
              <div class="col-sm-6">
                  <textarea  class="form-control" rows="5" v-model="Apotik.Slogan" name="Slogan" :disabled="!IsEdit"></textarea>
              </div>
            </div>
          </form>
          <div class="row">
            <button class="btn btn-primary" v-on:click="SaveDataApotik()" v-show="IsEdit" >Save</button>
            <button class="btn btn-success" v-on:click="EditApotik" v-show="!IsEdit">Edit</button>
            <button class="btn btn-default">Cancel</button>
          </div>
        </div>
     </div>
    </div>
  </div>
</template>
<script src="../App/IdentitasApotik.js"></script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
/*h1, h2 {
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
}*/
</style>

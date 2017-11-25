document.addEventListener('DOMContentLoaded', function () {
new Vue({
        el: '#obat',
        data: {
         openModal : false
        },
   methods: {
     openModel(){
         $('#modalForm').modal('show');
     },
     CloseModal(){
       $('#modalForm').modal('hide');
     },
     GetAllGolObat(){
       this.$http.get('/message').then((response) {
        // this.message = response.data.message;
        console.log(response);
      });
     }
  }
})
});

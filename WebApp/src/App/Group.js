
import axios from 'axios'
import Aut from '../App/Aut.js'

export default {
  name: 'GroupController',
  created(){
    this.GetDataGroup();
  },
  mixins: [Aut],
  data () {
    return {
      Groups: [],
      errors: [],
      Group: {
        IdGroup: Number,
        NamaGroup: String,
        Keterangan:String,
        DiBuatOleh:Number,
        DiUbahOleh:Number,
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      FilterModel:{
        IdGroup: "",
        NamaGroup: "",
        Keterangan:"",
        Group:"",
        DiUbahOleh:"",
        TanggalDiBuat:"",
        TanggalDiUbah:"",
      },
    }
  },
  methods: {
    GetDataGroup () {
      axios.post('http://localhost/apotek/WebService/index.php/api/GroupUser/GetGroupAll',{
        body: this.Filter()
      }).then(response => {
        // JSON responses are automatically parsed.
        this.Groups = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataGroup(){
      this.Group.DiUbahOleh = this.GetIdUser()
      axios.post('http://localhost/apotek/webService/index.php/api/GroupUser/SaveDataGroup', {
        body: this.Group
      })
      .then(response => {
           console.log(response.data);
        this.CloseModal('ModalGroupForm');
        this.GetDataGroup();
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditGroup(IdGroup){
      this.GetDataById(IdGroup);
      this.OpenModal('ModalGroupForm');
    },
    ViewGroup(IdGroup){
      this.GetDataById(IdGroup);
      this.OpenModal('ModalGroupView');
    },
    GetDataById(IdGroup){
      this.Group= { },
      axios.get('http://localhost/apotek/WebService/index.php/api/GroupUser/GetDataGroupById/'+IdGroup)
      .then(response => {
        // JSON responses are automatically parsed.
        this.Group = response.data;
        console.log(this.Group);
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    AddGroup(){
      this.Group= {
        IdGroup: null,
        NamaGroup: null,
        Keterangan:null,
        DiBuatOleh:this.GetIdUser(),
        DiUbahOleh:this.GetIdUser(),
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      this.OpenModal ('ModalGroupForm');
    },
    Filter(){
      var FilterParam = {};
      if(this.FilterModel.KodeGroup !== "" && this.FilterModel.KodeGroup !== null ){
        FilterParam.KodeGroup =this.FilterModel.KodeGroup;
      }
      if(this.FilterModel.NamaGroup !== null && this.FilterModel.NamaGroup !== "" ){
        FilterParam.NamaGroup =this.FilterModel.NamaGroup;
      }
      return FilterParam;
    },
    ChangeFilter(Param){
      if(Param.length > 2){
        this.GetDataGroup();
      }else if(Param.length == 0){
          this.GetDataGroup();
      }
    },
    OpenModal (Modal){
      $('#'+Modal).modal('show');
    },
    CloseModal (Modal){
      $('#'+Modal).modal('hide');
    }
  },

}

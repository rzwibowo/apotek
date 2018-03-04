import Vue from 'vue'
import Router from 'vue-router'
import Aut from '@/components/Autorization'
import Index from '@/components/Index'
import Obat from '@/components/Obat'
import Kategori from '@/components/Kategori'
import Kota from '@/components/Kota'
import Bank from '@/components/Bank'
import Pajak from '@/components/Pajak'
import Satuan from '@/components/Satuan'
import Group from '@/components/Group'
import Karyawan from '@/components/Karyawan'
import IdentitasApotik from '@/components/IdentitasApotik'
import Supplier from '@/components/Supplier'
import Pembelian from '@/components/Pembelian'
import PembelianForm from '@/components/PembelianForm'
import PembelianView from '@/components/PembelianView'
import PenjualanForm from '@/components/PenjualanForm'
import StokOpname from '@/components/StokOpname'
import Priode from '@/components/Priode'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/Index',
      name: 'Index',
      component: Index
    },
    {
      path: '/Aut',
      name: 'Autorization',
      component: Aut
    },
    {
      path: '/obat',
      name: 'Obat',
      component: Obat
    },
    {
      path: '/Kategori',
      name: 'Kategori',
      component: Kategori
    },
    {
      path: '/supplier',
      name: 'Supplier',
      component: Supplier
    },
    {
      path: '/Pembelian',
      name: 'PembelianFormController',
      component: Pembelian
    },
    {
      path: '/PembelianForm',
      name: 'PembelianFormController',
      component: PembelianForm
    },
    {
      path: '/PembelianForm/:IdPembelian',
      name: 'UpdatePembelian',
      component: PembelianForm
    },
    {
      path: '/PembelianView/:IdPembelian',
      name: 'ViewPembelian',
      component: PembelianView
    },
    {
      path: '/PenjualanForm/',
      name: 'PenjualanForm',
      component: PenjualanForm
    },
    {
      path: '/Priode/',
      name: 'Priode',
      component: Priode
    },
    {
      path: '/Kota',
      name: 'Kota',
      component: Kota
    },
    {
      path: '/Bank',
      name: 'Bank',
      component: Bank
    },
    {
      path: '/IdentitasApotik',
      name: 'Identitas Apotik',
      component: IdentitasApotik
    },
    {
      path: '/Pajak',
      name: 'Pajak',
      component: Pajak
    },
    {
      path: '/Satuan',
      name: 'Satuan',
      component: Satuan
    },
    {
      path: '/Group',
      name: 'Group',
      component: Group
    },
    {
      path: '/Karyawan',
      name: 'Karyawan',
      component: Karyawan
    },
    {
      path: '/StokOpname',
      name: 'StokOpname',
      component: StokOpname
    }
  ]
})

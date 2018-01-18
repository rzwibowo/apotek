import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/components/Index'
import Obat from '@/components/Obat'
import Golongan from '@/components/Golongan'
import Supplier from '@/components/Supplier'
import Pembelian from '@/components/Pembelian'
import PembelianForm from '@/components/PembelianForm'
import PembelianView from '@/components/PembelianView'
import PenjualanForm from '@/components/PenjualanForm'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Index',
      component: Index
    },
    {
      path: '/obat',
      name: 'Obat',
      component: Obat
    },
    {
      path: '/golongan',
      name: 'Golongan',
      component: Golongan
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
    }
  ]
})

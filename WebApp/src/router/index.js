import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Obat from '@/components/Obat'
import Golongan from '@/components/Golongan'
import Supplier from '@/components/Supplier'
import Pembelian from '@/components/Pembelian'
import PembelianForm from '@/components/PembelianForm'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
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
      name: 'pembelian',
      component: Pembelian
    },
    {
      path: '/PembelianForm',
      name: 'pembelianForm',
      component: PembelianForm
    }
  ]
})

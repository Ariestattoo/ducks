import getters from './getters'
import actions from './actions'
import mutations from './mutations'

const state = {
  foods: null,
  feedings: null,
  pending: null,
  create_feeding:
    {
      quantity: false,
      duck_count: false,
      location_id: false,
      food_id: false,
      time: false
    }
}

export default {
  state,
  getters,
  actions,
  mutations
}

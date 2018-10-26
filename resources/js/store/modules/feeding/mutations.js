import * as types from '../../mutation-types'

export default {
  [types.SET_APPLICATION_DATA](state, data) {
    console.log(data);
    state.foods = data['foods'];
    state.feedings = data['feedings'];
    state.pending = data['pending'];
  },
  
  
}

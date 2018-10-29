import * as types from '../../mutation-types'
import Vue from 'vue'
export default {
  [types.SET_APPLICATION_DATA](state, data) {
    console.log(data);
    state.foods = data['foods'];
    state.feedings = data['feedings'];
    state.pending = data['pending'];
  },
  
  [types.SET_PREVIOUS_FEEDINGS](state,data) {
    Vue.set(state.feedings,state.feedings.length,data)
  }
  
}

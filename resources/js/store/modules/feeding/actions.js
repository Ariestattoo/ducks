import * as mutations from '../../mutation-types'
import * as actions from '../../action-types'
import feedingApi from "../../../api/feeding";

export default {
  [ actions.CREATE_FEEDING ] (context, feeding) {
    return new Promise((resolve, reject) => {
      feedingApi.create_feeding(feeding).then(response => {
        context.commit(mutations.SET_PREVIOUS_FEEDINGS, response)
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
}

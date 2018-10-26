import axios from 'axios'

export default {
  create_feeding (feeding) {
    return axios.post('/feeding/create', feeding)
  },
}

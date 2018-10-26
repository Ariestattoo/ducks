import axios from 'axios'

export default {
  create_feeding (feeding) {
    return axios.post('/api/v1/feeding/create', feeding)
  },
}

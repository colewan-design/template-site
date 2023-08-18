export default {
    data () {
        var access_token = JSON.parse(localStorage.getItem("access_token"))
        return {
          access_token:access_token ? access_token : null,
        }
      }
}
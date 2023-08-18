<template>
<div>
  <v-bottom-navigation
      class="d-sm-none"
      dark app
      :value="selectedItem"
      color="cyan"
      grow
  >
      <v-btn v-for="(item, i) in items" :key="i">
        <span>{{item.title}}</span>
        <v-icon>{{item.icon}}</v-icon>
      </v-btn>
  </v-bottom-navigation>
</div>

</template>

<script>
export default {
  data() {
    return {
      drawer: true,
      selectedItem: 0,
        items: [
          { title: 'Home', icon: 'mdi-home' },
          { title: 'QR', icon: 'mdi-qrcode' },
          { title: 'Profile', icon: ' mdi-clipboard-account' },
          { title: 'Activity', icon: 'mdi-view-list' },
        ],
      value: 2
    }
  },
}
</script>

<template>
<div>
      <v-toolbar class="mt-5" flat>
      <v-toolbar-title class="flex text-center text-h4">
        <span>Activity</span>
      </v-toolbar-title>
    </v-toolbar>
    <v-divider></v-divider>

  <v-simple-table
    fixed-header
    height="6php00px"
  >
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">
            Transaction & Date
          </th>
          <th class="text-left">
            Details
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="item in desserts"
          :key="item.name"
        >
          <td>{{ item.name }}</td>
          <td>      
              
        <v-icon
        small
        class="mr-2"
        color="cyan"
        dark
      >
        mdi-eye
      </v-icon></td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
</div>
</template>
<script>
  export default {
    data () {
      return {
        desserts: [
          {
            name: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, itaque.',
            calories: 159,
          },
          {
            name: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, itaque.',
            calories: 237,
          },
        ],
      }
    },
  }
</script>
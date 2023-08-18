<template>
    <v-data-table
      :headers="headers"
      :items="dataItems"
      :items-per-page="5"
      class="elevation-1"
    ></v-data-table>
  </template>
  
  <script>
  
  // Import your data (you can replace this with your actual data)
  const dataItems = [
    { id: 1, name: 'John Doe', age: 30 },
    { id: 2, name: 'Jane Smith', age: 25 },
    // Add more data here...
  ];
  
  export default {
    data() {
      return {
        // Define table headers
        headers: [
          { text: 'ID', value: 'id' },
          { text: 'Name', value: 'name' },
          { text: 'Age', value: 'age' },
        ],
        dataItems: dataItems,
      };
    },
  };
  </script>
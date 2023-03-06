<template>
  <div class="pokemon">
    <table>
      <tr>
        <th>Name</th>
        <th>Weight</th>
        <th>Height</th>
      </tr>
      <tr v-for="pokemon in data" :key="pokemon.id">
        <td>{{ pokemon.name }}</td>
        <td>{{ pokemon.weight }}</td>
        <td>{{ pokemon.height }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
import DataService from "@/services/DataService";

export default {
  name: "UploadFile",
  props: {
    pokemon: {
      type: Array,
      default: null,
    },
  },
  data() {
    return {
      data: [],
      endpoint: process.env.VUE_APP_API_URL + "/pokemon",
    };
  },
  methods: {
    loadData() {
      const payload = {
        endpoint: this.endpoint,
      };
      DataService.loadData(payload)
        .then((response) => (this.data = response.data))
        .catch((error) => console.log(error));
    },
  },
  mounted() {
    this.loadData();
  },
};
</script>

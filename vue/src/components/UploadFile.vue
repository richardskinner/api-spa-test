<template>
  <div class="upload">
    <button v-if="uploadSuccessful" @click="loadData">Show Data</button>
    <form @submit.prevent="uploadFile">
      <FlashMessage :error="error" :message="message" />
      <input type="file" @change="fileChange" />
      <button>Upload</button>
      <Pokemon v-if="showPokemon" :key="forcePokemonUpdate" />
    </form>
  </div>
</template>

<script>
import { ref } from "vue";
import FileService from "@/services/FileService";
import Pokemon from "@/components/Pokemon";
import FlashMessage from "@/components/FlashMessage.vue";
import { getError } from "@/utils/helpers";

export default {
  name: "UploadFile",
  components: { FlashMessage, Pokemon },
  data() {
    return {
      file: null,
      uploadSuccessful: false,
      message: null,
      error: null,
      showPokemon: false,
      forcePokemonUpdate: ref(0),
      endpoint: process.env.VUE_APP_API_URL + "/pokemon",
    };
  },
  methods: {
    fileChange(event) {
      this.file = event.target.files[0];
    },
    loadData() {
      this.showPokemon = true;
      this.forcePokemonUpdate += 1;
    },
    uploadFile() {
      const payload = {};
      const formData = new FormData();
      formData.append("file", this.file);
      payload.file = formData;
      payload.endpoint = this.endpoint;
      FileService.uploadFile(payload)
        .then(() => {
          this.error = null;
          this.uploadSuccessful = true;
          this.forcePokemonUpdate += 1;
          this.message = "Uploaded Successfully!";
        })
        .catch((error) => {
          this.message = null;
          this.uploadSuccessful = false;
          this.error = getError(error);
        });
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
h3 {
  margin: 40px 0 0;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>

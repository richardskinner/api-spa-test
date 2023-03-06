<template>
  <div class="home">
    <UploadFile />
  </div>
</template>

<script>
// @ is an alias to /src
import UploadFile from "@/components/UploadFile.vue";

export default {
  name: "HomeView",
  components: {
    UploadFile,
  },
};
</script>

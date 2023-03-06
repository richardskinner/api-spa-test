import * as API from "@/services/API";

export default {
  loadData(payload) {
    return API.apiClient.get(payload.endpoint);
  },
};

/*
 * This is the initial API interface
 * we set the base URL for the API
 */

import axios from "axios";

export const apiClient = axios.create({
  baseURL: process.env.VUE_APP_API_URL + "/api",
  withCredentials: false, // required to handle the CSRF token
});

/*
 * Add a response interceptor
 */
apiClient.interceptors.response.use(
  (response) => {
    return response;
  },
  function (error) {
    return Promise.reject(error);
  }
);

import axios from "axios";
window.axios = axios;

// jquery
window.$ = require("jquery");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

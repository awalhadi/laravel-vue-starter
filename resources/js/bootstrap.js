import axios from "axios";
window.axios = axios;

// import metismenu and initialize
import Metismenu from "metismenu";
window.metisMenu = Metismenu;

// jquery
window.$ = require("jquery");
window.jQuery = window.$;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

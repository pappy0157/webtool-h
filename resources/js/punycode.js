import punycode from "punycode.js";

window.encodePuny = (str) => punycode.encode(str);
window.decodePuny = (str) => punycode.decode(str);
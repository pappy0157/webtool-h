import convert from "convert";

window.convertUnits = (data, from, to) => convert(data, from).to(to);
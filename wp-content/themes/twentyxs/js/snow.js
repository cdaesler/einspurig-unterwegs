<!--
var no = 15; // number of snowflakes
var speed = 20; // speed of 'snowfall'; the smaller the number, the higher the speed
var snowflake = "http://kevinw.de/images/snow.gif"; // image of the snowflake
// ***** As from now don't change anything! ********************
var ns4up = (navigator.appName=="Netscape" && navigator.appVersion.charAt(0)=="4") ? 1 : 0; // Browser Tester
var ie4up = (document.all) ? 1 : 0;
var ns6up = (document.getElementById&&!document.all) ? 1 : 0;
var dx, xp, yp; // Variablen für Koordinaten und Position
var am, stx, sty; //Variablen für Amplitude und Schrittweite
var i, doc_width = 800, doc_height = 100;
if (ns4up||ns6up) { // Bildschirm-Aufloesung holen, Netscape-Funktion
doc_width = self.innerWidth;
doc_height = self.innerHeight;
} else if (ie4up) { // Bildschirm-Aufloesung holen, Internet Explorer-Funktion
doc_width = document.body.clientWidth;
doc_height = document.body.clientHeight;
}
dx = new Array();
xp = new Array();
yp = new Array();
am = new Array();
stx = new Array();
sty = new Array();
for (i = 0; i < no; ++ i) {
dx[i] = 0; // Koordinaten-Variable setzen
xp[i] = Math.random()*(doc_width-50); // Position-Variable setzen
yp[i] = Math.random()*doc_height;
am[i] = Math.random()*20; // Amplituden-Variable setzten
stx[i] = 0.02 + Math.random()/10; // Variable für Schrittweite setzen
sty[i] = 0.7 + Math.random(); // Variable für Schrittweite setzen
// ----------------------------------------------------------------------
// Layer konfigurieren für Netscape
if (ns4up) {
if (i == 0) {
document.write("<layer name=\"dot"+ i +"\" left=\"15\" ");
document.write("top=\"15\" visibility=\"show\"><img src=\"");
document.write(snowflake + "\" border=\"0\"></layer>");
} else {
document.write("<layer name=\"dot"+ i +"\" left=\"15\" ");
document.write("top=\"15\" visibility=\"show\"><img src=\"");
document.write(snowflake + "\" border=\"0\"></layer>");
}
// ----------------------------------------------------------------------
// Layer konfigurieren für <> NS4
} else if (ie4up||ns6up) {
if (i == 0) {
document.write("<div id=\"dot"+ i +"\" style=\"POSITION: ");
document.write("absolute; Z-INDEX: "+ i +"; VISIBILITY: ");
document.write("visible; TOP: 15px; LEFT: 15px;\"><img src=\"");
document.write(snowflake + "\" border=\"0\"></div>");
} else {
document.write("<div id=\"dot"+ i +"\" style=\"POSITION: ");
document.write("absolute; Z-INDEX: "+ i +"; VISIBILITY: ");
document.write("visible; TOP: 15px; LEFT: 15px;\"><img src=\"");
document.write(snowflake + "\" border=\"0\"></div>");
}
}
}
// ----------------------------------------------------------------------
// Haupt-Animations-Funktion für Netscape
function snowNS() {
for (i = 0; i < no; ++ i) {
yp[i] += sty[i];
if (yp[i] > doc_height-50) {
xp[i] = Math.random()*(doc_width-am[i]-30);
yp[i] = 0;
stx[i] = 0.02 + Math.random()/10;
sty[i] = 0.7 + Math.random();
doc_width = self.innerWidth;
doc_height = self.innerHeight;
}
dx[i] += stx[i];
document.layers["dot"+i].top = yp[i];
document.layers["dot"+i].left = xp[i] + am[i]*Math.sin(dx[i]);
}
setTimeout("snowNS()", speed);
}
// ----------------------------------------------------------------------
// Haupt-Animations-Funktion für Internet Explorer
function snowIE() {
for (i = 0; i < no; ++ i) {
yp[i] += sty[i];
if (yp[i] > doc_height-50) {
xp[i] = Math.random()*(doc_width-am[i]-30);
yp[i] = 0;
stx[i] = 0.02 + Math.random()/10;
sty[i] = 0.7 + Math.random();
doc_width = document.body.clientWidth;
doc_height = document.body.clientHeight;
}
dx[i] += stx[i];
document.all["dot"+i].style.pixelTop = yp[i];
document.all["dot"+i].style.pixelLeft = xp[i] + am[i]*Math.sin(dx[i]);
}
setTimeout("snowIE()", speed);
}
// Haupt-Animations-Funktion für Netscape6 und Mozilla
function snowNS6() {
for (i = 0; i < no; ++ i) {
yp[i] += sty[i];
if (yp[i] > doc_height-50) {
xp[i] = Math.random()*(doc_width-am[i]-30);
yp[i] = 0;
stx[i] = 0.02 + Math.random()/10;
sty[i] = 0.7 + Math.random();
doc_width = self.innerWidth;
doc_height = self.innerHeight;
}
dx[i] += stx[i];
document.getElementById("dot"+i).style.top = yp[i]+"px";
document.getElementById("dot"+i).style.left = xp[i] + am[i]*Math.sin(dx[i])+"px";
}
setTimeout("snowNS6()", speed);
}
if (ns4up) {
snowNS();
} else if (ie4up) {
snowIE();
}else if (ns6up) {
snowNS6();
}
// End -->
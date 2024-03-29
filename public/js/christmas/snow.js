/*!
// Snow.js - v0.0.3
// kurisubrooks.com
//
// Modified by floppydisk
// - Changed snowflakes to "Heavy chevron snowflake" (U+2746)
// - Made snowflakes randomly rotate slowly either right or left
*/

// Amount of Snowflakes
var snowMax = 80;

// Snowflake Colours
var snowColor = [
    "#cad3f5",
    "#a5adcb",
    "#5b6078"
];

// Snow Entity
var snowEntity = "&#10054" //"&#x2022;";

// Falling Velocity
var snowSpeed = 0.5;

// Minimum Flake Size
var snowMinSize = 8;

// Maximum Flake Size
var snowMaxSize = 24;

// Refresh Rate (in milliseconds)
var snowRefresh = 50;

// Additional Styles
var snowStyles = "cursor: default; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; -o-user-select: none; user-select: none;";

/*
// End of Configuration
// ----------------------------------------
// Do not modify the code below this line
*/

var snow = [],
    pos = [],
    coords = [],
    lefr = [],
    marginBottom,
    marginRight;

function randomise(range) {
    rand = Math.floor(range * Math.random());
    return rand;
}

function initSnow() {
    var snowSize = snowMaxSize - snowMinSize;
    marginBottom = Math.max(document.body.scrollHeight, window.innerHeight) - 5;
    marginRight = document.body.clientWidth - 15;

    for (i = 0; i <= snowMax; i++) {
        coords[i] = 0;
        lefr[i] = Math.random() * 15;
        pos[i] = 0.03 + Math.random() / 10;
        snow[i] = document.getElementById("flake" + i);
        snow[i].style.fontFamily = "inherit";
        snow[i].size = randomise(snowSize) + snowMinSize;
        snow[i].style.fontSize = snow[i].size + "px";
        snow[i].style.color = snowColor[randomise(snowColor.length)];
        snow[i].style.zIndex = 1000;
        snow[i].sink = snowSpeed * snow[i].size / 5;
        snow[i].posX = randomise(marginRight - snow[i].size);
        snow[i].posY = randomise(2 * marginBottom - marginBottom - 2 * snow[i].size);
        snow[i].style.left = snow[i].posX + "px";
        snow[i].style.top = snow[i].posY + "px";
        snow[i].rotation = Math.random() * 360; // add a random initial rotation
        snow[i].direction = Math.random() > 0.5 ? 1 : -1; // add a random direction
    }

    moveSnow();
}

function resize() {
    marginBottom = Math.max(document.body.scrollHeight, window.innerHeight) - 5;
    marginRight = document.body.clientWidth - 15;
}

function moveSnow() {
    for (i = 0; i <= snowMax; i++) {
        coords[i] += pos[i];
        snow[i].posY += snow[i].sink;
        snow[i].style.left = snow[i].posX + lefr[i] * Math.sin(coords[i]) + "px";
        snow[i].style.top = snow[i].posY + "px";
        

        if (snow[i].posY >= marginBottom - 2 * snow[i].size || parseInt(snow[i].style.left) > (marginRight - 3 * lefr[i])) {
            snow[i].posX = randomise(marginRight - snow[i].size);
            snow[i].posY = 0;
        }
        snow[i].rotation += snow[i].sink * snow[i].direction; // increment rotation based on direction
        snow[i].style.transform = "rotate(" + snow[i].rotation + "deg)"; // rotate the snowflake
    }

    setTimeout("moveSnow()", snowRefresh);
}

for (i = 0; i <= snowMax; i++) {
    document.write("<span id='flake" + i + "' style='" + snowStyles + "position:absolute;top:-" + snowMaxSize + "'>" + snowEntity + "</span>");
}

window.addEventListener('resize', resize);
window.addEventListener('load', initSnow);


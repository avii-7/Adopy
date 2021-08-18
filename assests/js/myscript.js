let offset = 0;
let WRAPPER = null;
let ERROR_MSG = null;
const NAVBAR = document.querySelector(".nav-bar");
const HEADER = document.getElementsByTagName("header")[0];
const MAIN = document.getElementById("main");

function openMenu() {
  NAVBAR.classList.toggle("change");
}

async function updateMenu() {
  const RESPONSE = await fetch("components/nav-bar.php");
  const RESULT = await RESPONSE.text();
  NAVBAR.innerHTML = RESULT;
}

async function doit(action) {
  await fetch(action);
  updateMenu();
  fetchData();
}

async function fetchData() {
  if (offset == 0) {
    MAIN.innerHTML = `<div id='card-wrapper'>`;
    WRAPPER = document.getElementById("card-wrapper");
  }
  console.log("Yes");
  const RESPONSE = await fetch("posts.php?offset=" + offset);
  let result = await RESPONSE.text();
  WRAPPER.innerHTML += result;
  if (offset == 0) {
    MAIN.innerHTML += `</div>
    <div class="center" id="fetch-data">
    <i class="fas fa-arrow-circle-down fa-2x" onclick="fetchData()"></i>
    </div>`;
  }
  console.log(WRAPPER);
  offset += 3;
}

fetchData();

function home() {
  offset = 0;
  MAIN.innerHTML = "";
  fetchData();
}

async function getData(page) {
  const RESPONSE = await fetch(page);
  const RESULT = await RESPONSE.text();
  MAIN.innerHTML = RESULT;
}

async function setData(url) {
  const RESPONSE = await fetch("authentication/" + url + ".php", {
    method: "POST",
    body: new FormData(check),
  });
  const RESULT = await RESPONSE.text();
  genError(RESULT);
}

function genError(result) {
  ERROR_MSG = document.getElementsByClassName("error-msg");
  const intResult = parseInt(result);
  clearPrevErrors();
  switch (intResult) {
    case 1:
      ERROR_MSG[0].innerText = "Please enter your first name.";
      break;
    case 2:
      ERROR_MSG[0].innerText = "Only alphabets are allowed.";
      break;
    case 3:
      ERROR_MSG[1].innerText = "Please enter the last name.";
      break;
    case 4:
      ERROR_MSG[1].innerText = "Only alphabets are allowed.";
      break;
    case 5:
      ERROR_MSG[2].innerText = "Please enter your phone number.";
      break;
    case 6:
      ERROR_MSG[2].innerText = "Please enter a valid 10 digit number.";
      break;
    case 7:
      ERROR_MSG[3].innerText = "Please enter your email.";
      break;
    case 8:
      ERROR_MSG[3].innerText = "Please enter a valid email.";
      break;
    case 9:
      ERROR_MSG[4].innerText = "Please enter your password.";
      break;
    case 10:
      ERROR_MSG[4].innerText = "Password must be minumum 5 characters long.";
      break;
    case 11:
      ERROR_MSG[2].innerText = "Number is already registered.";
      break;
    case 12:
      ERROR_MSG[3].innerText = "Email is already registered.";
      break;
    case 13:
      getData("authentication/login.html");
      break;
    case 14:
      ERROR_MSG[0].innerText = "Please enter your email.";
      break;
    case 15:
      ERROR_MSG[0].innerText = "Please enter your password.";
      break;
    case 16:
      ERROR_MSG[0].innerText = "Email is not registered.";
      break;
    case 17:
      ERROR_MSG[0].innerText = "Invalid Credentials.";
      break;
    case 18:
      offset = 0;
      updateMenu();
      fetchData();
      break;
  }
}

function clearPrevErrors() {
  for (const msg of ERROR_MSG) {
    msg.innerText = "";
  }
}

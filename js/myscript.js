/* ------------------------------- Declartions ------------------------------ */
let offset = 0;
let WRAPPER = null;
let phpError = null;
let error_msg = null;
const NAVBAR = document.querySelector(".nav-bar");
const HEADER = document.getElementsByTagName("header")[0];
const MAIN = document.getElementById("main");

/* ----------------------------- Async Function ----------------------------- */

// Get Data
async function getData(url, callback) {
  const RESPONSE = await fetch(url);
  const RESULT = await RESPONSE.text();
  callback(RESULT);
}

// Set Data
async function setData(url) {
  const RESPONSE = await fetch("php/" + url + ".php", {
    method: "POST",
    body: new FormData(check),
  });
  const RESULT = await RESPONSE.text();
  action(RESULT);
}

// Logout
async function doit() {
  await fetch(getURL(6));
  getData(getURL(4), updateNavBar);
}

/* ----------------------------- Home Page Setup ---------------------------- */

fetchPosts();

function setHome(RESULT) {
  MAIN.innerHTML = RESULT;
  WRAPPER = document.getElementById("card-wrapper");
  getData(getURL(1), updateWrapper);
}

function fetchPosts() {
  offset = 0;
  getData(getURL(5), setHome);
}

/* ----------------------------- Other consts ---------------------------- =>*/

// Updatation
function updateMain(RESULT) {
  RESULT == 4 ? action(4) : (MAIN.innerHTML = RESULT);
}

function updateNavBar(RESULT) {
  NAVBAR.innerHTML = RESULT;
}

function updateWrapper(result) {
  WRAPPER.innerHTML += result;
  offset += 3;
}
/* --- x --- */

// GetUrl
function getURL(id) {
  switch (id) {
    case 1:
      return "php/posts.php?offset=" + offset;
    case 2:
      return "pages/signup.html";
    case 3:
      return "pages/login.html";
    case 4:
      return "components/nav-bar.php";
    case 5:
      return "pages/home.html";
    case 6:
      return "php/logout.php";
    case 7:
      return "pages/add-post.html";
    case 8:
      return "php/my-profile.php";
    case 9:
      return "php/check-auth.php";
  }
}

// Open Menu
function openMenu() {
  NAVBAR.classList.toggle("change");
}

// Redirect And Embbed Error
function action(RESULT) {
  error_msg = document.getElementsByClassName("error-msg");
  let phpError = document.getElementById("phpError");
  RESULT = parseInt(RESULT);
  switch (RESULT) {
    case 1:
      phpError.innerText = "Enter valid data in all fields";
      break;
    case 2:
      phpError.innerText = "Number is already registered.";
      break;
    case 3:
      phpError.innerText = "Email is already registered.";
      break;
    case 4:
      getData(getURL(3), updateMain);
      break;
    case 5:
      phpError.innerText = "Invalid Credentials.";
      break;
    case 6:
      phpError.innerText = "Email is not registered.";
      break;
    case 7:
      offset = 0;
      getData(getURL(4), updateNavBar);
      fetchPosts();
      break;
    case 8:
      fetchPosts();
      break;
  }
}

// Clear Previous Msg
function clearPrevErrors() {
  for (const msg of error_msg) {
    msg.innerText = "";
  }
}

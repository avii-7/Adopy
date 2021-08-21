let offset = 0;
let WRAPPER = null;
let phpError = null;
let ERROR_MSG = null;
const NAVBAR = document.querySelector(".nav-bar");
const HEADER = document.getElementsByTagName("header")[0];
const MAIN = document.getElementById("main");

async function getData(url, callback) {
  const RESPONSE = await fetch(url);
  const RESULT = await RESPONSE.text();
  callback(RESULT);
}

function fetchPosts() {
  offset = 0;
  getData(getURL(5), setHome);
}

const setHome = (RESULT) => {
  MAIN.innerHTML = RESULT;
  getData(getURL(1), getPosts);
};

function getPosts(result) {
  if (offset == 0) {
    WRAPPER = document.getElementById("card-wrapper");
  }
  WRAPPER.innerHTML += result;
  offset += 3;
}

fetchPosts();

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
  }
}

function updateMain(RESULT) {
  MAIN.innerHTML = RESULT;
}

function updateNavBar(RESULT) {
  NAVBAR.innerHTML = RESULT;
}

async function doit() {
  await fetch(getURL(6));
  getData(getURL(4), updateNavBar);
}

function openMenu() {
  NAVBAR.classList.toggle("change");
}

function home() {
  offset = 0;
  MAIN.innerHTML = "";
  fetchPosts();
}

async function setData(url) {
  const RESPONSE = await fetch("php/" + url + ".php", {
    method: "POST",
    body: new FormData(check),
  });
  const RESULT = await RESPONSE.text();
  genError(RESULT);
}

function genError(RESULT) {
  ERROR_MSG = document.getElementsByClassName("error-msg");
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
      offset = 0;
      fetchPosts();
      break;
  }
}

function clearPrevErrors() {
  for (const msg of ERROR_MSG) {
    msg.innerText = "";
  }
}

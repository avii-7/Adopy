let offset = 0;
let WRAPPER = null;
let ERROR_MSG = null;
const NAVBAR = document.querySelector(".nav-bar");
const HEADER = document.getElementsByTagName("header")[0];
const MAIN = document.getElementById("main");

const WrapperTemplate = (result) => {
  return wrapperStart + result + wrapperEnd + fetchBtn;
};

async function getData(url, callback) {
  const RESPONSE = await fetch(url);
  const RESULT = await RESPONSE.text();
  callback(RESULT);
}

function fetchPosts() {
  offset = 0;
  getData(getURL(5), setWrapper);
  getData(getURL(1), getPosts);
}

const setWrapper = (RESULT) => {
  MAIN.innerHTML = RESULT;
};

fetchPosts();

function getURL(id) {
  switch (id) {
    case 1:
      return "posts.php?offset=" + offset;
    case 2:
      return "authentication/signup.html";
    case 3:
      return "authentication/login.html";
    case 4:
      return "components/nav-bar.php";
    case 5:
      return "pages/home.html";
    case 6:
      return "authentication/logout.php";
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

function getPosts(result) {
  if (offset == 0) {
    WRAPPER = document.getElementById("card-wrapper");
  }
  WRAPPER.innerHTML += result;
  offset += 3;
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
  const RESPONSE = await fetch("authentication/" + url + ".php", {
    method: "POST",
    body: new FormData(check),
  });
  const RESULT = await RESPONSE.text();
  console.log(RESULT);
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
      getData(getURL(3), updateMain);
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
      console.log("eys");
      offset = 0;
      getData(getURL(4), updateNavBar);
      fetchPosts();
      break;
  }
}

function clearPrevErrors() {
  for (const msg of ERROR_MSG) {
    msg.innerText = "";
  }
}
// const WRAPPER = document.getElementsByClassName("content-wrapper")[0];
const ERROR_MSG = document.getElementsByClassName("error-msg");
// const page = document.scripts[0].getAttribute("data-page");
// const TITLE = document.title;
const MAIN = document.getElementById("main");

async function loadData(x = 0) {
  if (x == 1) {
    url = "login";
    TITLE.innerText = "Login - Adopy";
  } else if (x == 2) {
    url = "signup";
    TITLE.innerText = "Sign Up- Adopy";
  }
  const RESPONSE = await fetch(url + ".html");
  const RESULT = await RESPONSE.text();
  WRAPPER.innerHTML = RESULT;
  submitData();
}

loadData();

function submitData() {
  submitIt.onsubmit = async (e) => {
    e.preventDefault();
    const RESPONSE = await fetch(url + ".php", {
      method: "POST",
      body: new FormData(submitIt),
    });
    const RESULT = await RESPONSE.text();
    genError(RESULT);
  };
}





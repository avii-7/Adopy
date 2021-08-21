/* ---------------------------- SignUp Validtion ---------------------------- */

function validateSignUp() {
  const ERROR = document.getElementsByClassName("error-msg");
  const fname = check.fname;
  const lname = check.lname;
  const number = check.number;
  const email = check.email;
  const pass = check.passwd;
  if (fname.value === "" || fname.validity.patternMismatch) {
    ERROR[0].style.display = "inline-block";
    return;
  } else ERROR[0].style.display = "none";
  if (lname.value === "" || lname.validity.patternMismatch) {
    ERROR[1].style.display = "inline-block";
    return;
  } else ERROR[1].style.display = "none";
  if (number.value === "" || number.validity.patternMismatch) {
    ERROR[2].style.display = "inline-block";
    return;
  } else ERROR[2].style.display = "none";
  if (email.value === "" || email.validity.patternMismatch) {
    ERROR[3].style.display = "inline-block";
    return;
  } else ERROR[3].style.display = "none";
  if (pass.value === "" || pass.validity.patternMismatch) {
    ERROR[4].style.display = "inline-block";
    return;
  } else ERROR[4].style.display = "none";
  setData("signup");
}

/* ---------------------------- Login Validation ---------------------------- */

function validateLogin() {
  const ERROR = document.getElementsByClassName("error-msg");
  const email = check.email;
  const pass = check.password;
  if (email.value === "" || email.validity.patternMismatch) {
    ERROR[0].style.display = "inline-block";
    return;
  } else ERROR[0].style.display = "none";
  if (pass.value === "") {
    ERROR[1].style.display = "inline-block";
    return;
  } else ERROR[1].style.display = "none";
  setData("login");
}

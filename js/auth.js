// * Login
const formLogin = document.getElementById("formLogin"),
  submitLogin = document.getElementById("submitLogin"),
  alertErrLogin = document.getElementById("loginError"),
  loadingLogin = document.getElementById("loadingLogin");

formLogin.onsubmit = (e) => {
  e.preventDefault();
};

submitLogin.onclick = () => {
  submitLogin.classList.toggle("d-none");
  loadingLogin.classList.toggle("d-none");

  //   * AJAX
  let xhr = new XMLHttpRequest();

  xhr.open("POST", "php/login.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "success") {
          location.href = "home.php";
        } else {
          alertErrLogin.style.display = "block";
          alertErrLogin.innerHTML = `<strong>${data}</strong>`;
          submitLogin.classList.toggle("d-none");
          loadingLogin.classList.toggle("d-none");
        }
      }
    }
  };

  let formData = new FormData(formLogin);
  xhr.send(formData);
};

// * Register
const formRegister = document.getElementById("formRegister"),
  submitRegister = document.getElementById("submitRegister"),
  loadingRegister = document.getElementById("loadingRegister"),
  alertErr = document.getElementById("registerError");

formRegister.onsubmit = (e) => {
  e.preventDefault();
};

submitRegister.onclick = () => {
  submitRegister.classList.toggle("d-none");
  loadingRegister.classList.toggle("d-none");

  //   * AJAX
  let xhr = new XMLHttpRequest();

  xhr.open("POST", "php/register.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "success") {
          location.href = "home.php";
        } else {
          alertErr.style.display = "block";
          alertErr.innerHTML = `<strong>${data}</strong>`;
          submitRegister.classList.toggle("d-none");
          loadingRegister.classList.toggle("d-none");
        }
      }
    }
  };

  let formData = new FormData(formRegister);
  xhr.send(formData);
};

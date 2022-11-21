const formCurhat = document.getElementById("formCurhat"),
  submit = document.querySelector("#formCurhat button[type='submit']"),
  curhatMsg = document.getElementById("curhatMsg");

formCurhat.onsubmit = (e) => {
  e.preventDefault();
};

submit.onclick = () => {
  submit.classList.add("disabled");
  submit.innerHTML = "<i class='fas fa-spinner spinner'></i> &nbsp; Hang On...";

  //  * AJAX
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/addCard.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "success") {
          submit.classList.remove("disabled");
          submit.innerHTML = "Submit";
          curhatMsg.style.display = "block";
          curhatMsg.classList.remove("alert-danger");
          curhatMsg.classList.add("alert-success");
          curhatMsg.innerHTML = `<strong>${data}</strong>`;
          setTimeout(() => {
            location.href = "home.php";
          }, 2000);
        } else {
          submit.classList.remove("disabled");
          submit.innerHTML = "Submit";
          curhatMsg.style.display = "block";
          curhatMsg.classList.remove("alert-success");
          curhatMsg.classList.add("alert-danger");
          curhatMsg.innerHTML = `<strong>${data}</strong>`;
        }
      }
    }
  };

  let formData = new FormData(formCurhat);
  xhr.send(formData);
};

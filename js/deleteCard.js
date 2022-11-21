const formDeleteCard = document.getElementById("deleteCard");
(submit = document.getElementById("submitDeleteCard")),
  (msg = document.getElementById("modalBody"));

formDeleteCard.onsubmit = (e) => {
  e.preventDefault();
};

submit.onclick = () => {
  submit.classList.add("disabled");
  submit.innerHTML =
    "<i class='fas fa-spinner spinner'></i> &nbsp; Deleting...";

  //  * AJAX
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/deleteCard.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "success") {
          msg.classList.remove("d-none");

          setTimeout(() => {
            location.href = "home.php";
          }, 1000);
        }
      }
    }
  };

  let formData = new FormData(formDeleteCard);
  xhr.send(formData);
};

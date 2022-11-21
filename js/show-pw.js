function showPw(input, icon) {
  const pwInput = document.getElementById(input);
  const pwIcon = document.querySelector(icon);

  if (pwInput.type === "password") {
    pwInput.type = "text";
    pwIcon.className = "fas fa-eye pw-btn";
  } else {
    pwInput.type = "password";
    pwIcon.className = "fas fa-eye-slash pw-btn";
  }
}

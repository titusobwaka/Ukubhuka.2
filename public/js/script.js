document.getElementById("login-link").addEventListener("click", function() {
    document.getElementById("login-form").classList.add("active");
    document.getElementById("register-form").classList.remove("active");
  });
  
  document.getElementById("register-link").addEventListener("click", function() {
    document.getElementById("register-form").classList.add("active");
    document.getElementById("login-form").classList.remove("active");
  });
  
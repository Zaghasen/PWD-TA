const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

registerBtn.addEventListener("click", () => {
  container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
  container.classList.remove("active");
});

const formSignUp = document.querySelector(".form-container.sign-up form");
const formSignIn = document.querySelector(".form-container.sign-in form");

// Validasi form Sign Up
formSignUp.addEventListener("submit", (event) => {
  event.preventDefault(); // Mencegah form dikirim secara default

  const nameInput = document.getElementById("nameInput");
  const emailInput = document.getElementById("emailInput");
  const passwordInput = document.getElementById("passwordInput");
  const genderInput = document.getElementById("genderInput");

  const nameError = document.getElementById("nameError");
  const emailError = document.getElementById("emailError");
  const passwordError = document.getElementById("passwordError");
  const genderError = document.getElementById("genderError");

  // Reset pesan error
  nameError.textContent = "";
  emailError.textContent = "";
  passwordError.textContent = "";

  // Validasi input
  let isValid = true;
  if (nameInput.value.trim() === "") {
    nameError.textContent = "Name is required";
    isValid = false;
  }
  if (emailInput.value.trim() === "") {
    emailError.textContent = "Email is required";
    isValid = false;
  }
  if (passwordInput.value.trim() === "") {
    passwordError.textContent = "Password is required";
    isValid = false;
  }
  if (genderInput.value.trim() === "") {
    genderError.textContent = "Gender is required";
    isValid = false;
  }

  // Jika valid, lakukan tindakan selanjutnya (misalnya, kirim form)
  if (isValid) {
    // Lakukan tindakan selanjutnya di sini
    alert("Form submitted successfully!");
  }
});

// Validasi form Sign In
formSignIn.addEventListener("submit", (event) => {
  event.preventDefault(); // Mencegah form dikirim secara default

  const emailInputSignIn = document.getElementById("emailInputSignIn");
  const passwordInputSignIn = document.getElementById("passwordInputSignIn");

  const emailErrorSignIn = document.getElementById("emailErrorSignIn");
  const passwordErrorSignIn = document.getElementById("passwordErrorSignIn");

  // Reset pesan error
  emailErrorSignIn.textContent = "";
  passwordErrorSignIn.textContent = "";

  // Validasi input
  let isValid = true;
  if (emailInputSignIn.value.trim() === "") {
    emailErrorSignIn.textContent = "Email is required";
    isValid = false;
  }
  if (passwordInputSignIn.value.trim() === "") {
    passwordErrorSignIn.textContent = "Password is required";
    isValid = false;
  }

  // Jika valid, lakukan tindakan selanjutnya (misalnya, kirim form)
  if (isValid) {
    // Lakukan tindakan selanjutnya di sini
    alert("Form submitted successfully!");
  }
});

document.getElementById("signInForm").addEventListener("submit", function (event) {
  event.preventDefault(); // Prevent form from submitting the traditional way

  const email = document.getElementById("emailInputSignIn").value;
  const password = document.getElementById("passwordInputSignIn").value;

  // Dummy validation for demonstration purposes
  if (email === "user@example.com" && password === "password123") {
    window.location.href = "halamanmember.php"; // Redirect to the member page
  } else {
    document.getElementById("emailErrorSignIn").textContent = "Invalid email or password";
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const signUpForm = document.getElementById("signUpForm");
  const signInForm = document.getElementById("signInForm");

  signUpForm.addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the default form submission
    // Here you can add your logic for form submission (e.g., sending data to the server)
    console.log("Sign Up Form Submitted");
    // Clear the form data
    signUpForm.reset();
  });

  signInForm.addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the default form submission
    // Here you can add your logic for form submission (e.g., sending data to the server)
    console.log("Sign In Form Submitted");
    // Clear the form data
    signInForm.reset();
    // Redirect to member page (for demonstration purposes, assuming login is always successful)
    window.location.href = "halamanmember.php";
  });
});

var myaction = {
  collect_data: function (e, data_type) {
    e.preventDefault();
    e.stopPropagation();

    var inputs = document.querySelectorAll("form input, form select");
    let myform = new FormData();
    myform.append("data_type", data_type);

    for (var i = 0; i < inputs.length; i++) {
      myform.append(inputs[i].name, inputs[i].value);
    }

    myaction.send_data(myform);
  },

  send_data: function (form) {
    var ajax = new XMLHttpRequest();

    document.querySelector(".progress").classList.remove("d-none");

    // reset the progress bar
    document.querySelector(".progress-bar").style.width = "0%";
    document.querySelector(".progress-bar").innerHTML = "Working... 0%";

    ajax.addEventListener("readystatechange", function () {
      if (ajax.readyState == 4) {
        if (ajax.status == 200) {
          // all good
          myaction.handle_result(ajax.responseText);
        } else {
          console.log(ajax);
          alert("An error occurred");
        }
      }
    });

    ajax.upload.addEventListener("progress", function (e) {
      let percent = Math.round((e.loaded / e.total) * 100);
      document.querySelector(".progress-bar").style.width = percent + "%";
      document.querySelector(".progress-bar").innerHTML = "Working..." + percent + "%";
    });

    ajax.open("post", "ajax.php", true);
    ajax.send(form);
  },

  handle_result: function (result) {
    console.log(result);
    var obj = JSON.parse(result);
    if (obj.success) {
      alert("Login successful!");
      window.location.href = "halamanmember.php";
    } else {
      // show errors
      let error_inputs = document.querySelectorAll(".js-error");

      // empty all errors
      for (var i = 0; i < error_inputs.length; i++) {
        error_inputs[i].innerHTML = "";
      }

      // display errors
      for (key in obj.errors) {
        document.querySelector(".js-error-" + key).innerHTML = obj.errors[key];
      }
    }
  },
};

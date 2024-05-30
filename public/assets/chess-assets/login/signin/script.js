const formOpenBtn = document.querySelector("#form-open"),
home = document.querySelector(".home"),
formContainer = document.querySelector(".form_container"),
// formCloseBtn = document.querySelector(".form_close"),
pwShowHide = document.querySelectorAll(".pw_hide");

// formOpenBtn.addEventListener("click", () => home.classList.add("show"));
home.classList.add("show")
// formCloseBtn.addEventListener("click", () => home.classList.remove("show"));

pwShowHide.forEach((icon) => {
  icon.addEventListener("click", () => {
    let getPwInput = icon.parentElement.querySelector("input");
    if (getPwInput.type === "password") {
      getPwInput.type = "text";
      icon.classList.replace("uil-eye-slash", "uil-eye");
    } else {
      getPwInput.type = "password";
      icon.classList.replace("uil-eye", "uil-eye-slash");
    }
  });
});

$(document).ready(function(){
    let self = this;
    console.log("login page init!");
    $(this).find("#login").on("click", function(){
      console.log("login btn click!");
      $(self).find(".form_container").removeClass("active");
    });

    $(this).find("#signup").on("click", function(){
      console.log("signups btn click!");
      $(".plan-icon").css("background", "#999");
      localStorage.setItem("passCheck", "ok");
      $("#form-total-t-0").trigger("click");
      let defaultData = {
        "age": null,
        "firstName": null,
        "lastName": null,
        "birthDate": null,
        "email": null,
        "phoneNumber": null,
        "country": null,
        "userName": null,
        "password": null
      };
      let setsendData = JSON.stringify(defaultData);
      localStorage.setItem("sendData", setsendData);
      $(self).find(".form_container").addClass("active");
    });
});
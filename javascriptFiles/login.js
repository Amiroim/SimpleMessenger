const form = document.querySelector(".loginForm form"),
continueBtn = form.querySelector(".loginBtn"),
errorText = form.querySelector(".error-text"),
errorBox = form.querySelector(".error-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href = "users.php";
              }else{
                errorBox.style.display = "flex";
                errorText.style.display = "flex";
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

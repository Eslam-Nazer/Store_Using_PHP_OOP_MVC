(function () {
  var userNameField = document.querySelector("input[name=Username]");
  if (userNameField !== null) {
    if (userNameField.value.trim() !== null) {
      userNameField.addEventListener(
        "blur",
        function () {
          var req = new XMLHttpRequest();
          req.open("POST", "http://www.store.com/users/checkuserexistsajax");
          req.setRequestHeader(
            "Content-type",
            "application/x-www-form-urlencoded"
          );
          req.onreadystatechange = function () {
            if (req.readyState === XMLHttpRequest.DONE && req.status === 200) {
              var parentElem = document.getElementById("checker");
              var iElem = document.createElement("div");
              parentElem.innerHTML = "";
              if (req.responseText.trim() === "1") {
                iElem.innerHTML =
                  '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>';
                parentElem.classList.remove("bg-[#57ff99]");
                parentElem.classList.add("bg-[#f00]");
                iElem.classList.add("flex", "justify-center", "items-center");
              } else if (req.responseText.trim() === "0") {
                iElem.innerHTML =
                  '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>';
                parentElem.classList.remove("bg-[#f00]");
                parentElem.classList.add("bg-[#57ff99]");
              }
              parentElem.appendChild(iElem);
            }
          };
          req.send("Username=" + encodeURIComponent(this.value));
        },
        false
      );
    }
  }
})();

let notifyBtn = document.querySelector("#notify");
let notifyDot = document.querySelector("#notifyDot");

notifyBtn.onclick = function () {
  if (notifyDot.classList.contains("check")) {
    notifyDot.classList.remove("check");
  }
};

notifyBtn.addEventListener(
  "click",
  function () {
    let req = new XMLHttpRequest();
    req.open("POST", "");
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send("action=" + encodeURIComponent("checked"));
  },
  false
);

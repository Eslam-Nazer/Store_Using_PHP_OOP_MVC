/*
  Variables
*/
let btn = document.getElementById("sideBtn");
let sidebar = document.getElementById("sidebar-menu");
let notificarionBtn = document.querySelector(".notification-icon");
let notificarionMenu = document.querySelector(".notification-menu");
let userBtn = document.querySelector(".user");
let userMenu = document.querySelector(".dropdown");

let TransactionsBtn = document.getElementById("Transactions-btn");
let TransactionsMenu = document.getElementById("Transactions-menu");

let ExpensesBtn = document.getElementById("Expenses-btn");
let ExpensesMenu = document.getElementById("Expenses-menu");

let StoreBtn = document.getElementById("Store-btn");
let StoreMenu = document.getElementById("Store-menu");

let UsersBtn = document.getElementById("Users-btn");
let UsersMenu = document.getElementById("Users-menu");

let submenuBtns = [
  {
    "Transactions-btn": TransactionsBtn,
    "Expenses-btn": ExpensesBtn,
    "Store-btn": StoreBtn,
    "Users-btn": UsersBtn,
  },
];
let submenuMenus = [
  {
    "Transactions-btn": TransactionsMenu,
    "Expenses-btn": ExpensesMenu,
    "Store-btn": StoreMenu,
    "Users-btn": UsersMenu,
  },
];

/*
  Btns =>  submenus buttons BtnKey => Btns[BtnKey]
  BtnKey => sumenus keys of array
  Btns[BtnKey] => values of buttons

  Menus => submenus menu Keys MenuKey => Menus[MenuKey] (it have same keys)
*/
submenuBtns.forEach((Btns) => {
  Object.keys(Btns).forEach((BtnKey) => {
    document.addEventListener("click", function (event) {
      submenuMenus.forEach((Menus) => {
        Object.keys(Menus).forEach((MenuKey) => {
          if (Btns[BtnKey].contains(event.target)) {
            if (BtnKey == MenuKey) {
              // console.log(MenuKey, Menus[MenuKey], Btns[BtnKey]);
              //===================================
              if (!Menus[MenuKey].classList.contains("open-submenu")) {
                Menus[MenuKey].style.display = "block";
                setTimeout(function () {
                  Menus[MenuKey].classList.add("open-submenu");
                }, 10);
              } else {
                Menus[MenuKey].classList.remove("open-submenu");
                setTimeout(function () {
                  Menus[MenuKey].style.display = "none";
                }, 410);
              }
              //====================================
              // ========================
              if (!sidebar.classList.contains("active")) {
                sidebar.classList.add("active");
                setTimeout(function () {
                  Menus[MenuKey].classList.add("open-submenu");
                }, 600);
              }
              // ========================
            }
          }
          // ========================
          if (!sidebar.contains(event.target)) {
            if (Menus[MenuKey].classList.contains("open-submenu")) {
              Menus[MenuKey].classList.remove("open-submenu");
              Menus[MenuKey].style.display = "none";
              setTimeout(function () {
                sidebar.classList.remove("active");
              }, 410);
            } else {
              sidebar.classList.remove("active");
            }
          }
          // ========================
        });
      });
    });
  });
});

// document.addEventListener("click", function (event) {
//   console.log(TransactionsBtn.contains(event.target));
// });

notificarionBtn.addEventListener("click", function () {
  if (document.styleSheets[1].cssRules[17].style.display === "none") {
    setTimeout(function () {
      document.styleSheets[1].cssRules[17].style.display = "block";
    }, 250);
  } else {
    document.styleSheets[1].cssRules[17].style.display = "none";
  }
});

userBtn.addEventListener("click", function () {
  userMenu.classList.toggle("openMenu");
});

btn.addEventListener("click", function () {
  if (TransactionsMenu.classList.contains("open-submenu")) {
    TransactionsMenu.classList.remove("open-submenu");
    setTimeout(function () {
      TransactionsMenu.style.display = "none";
      sidebar.classList.remove("active");
    }, 400);
  } else if (ExpensesMenu.classList.contains("open-submenu")) {
    ExpensesMenu.classList.remove("open-submenu");
    setTimeout(function () {
      ExpensesMenu.style.display = "none";
      sidebar.classList.remove("active");
    }, 400);
  } else {
    sidebar.classList.toggle("active");
  }
});

document.addEventListener("click", function (event) {
  if (!userMenu.contains(event.target) && !userBtn.contains(event.target)) {
    if (userMenu.classList.contains("openMenu")) {
      userMenu.classList.remove("openMenu");
    }
  }
  if (
    !notificarionMenu.contains(event.target) &&
    !notificarionBtn.contains(event.target)
  ) {
    if (document.styleSheets[1].cssRules[17].style.display === "block") {
      document.styleSheets[1].cssRules[17].style.display = "none";
    }
  }
});

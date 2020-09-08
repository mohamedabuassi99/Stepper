/*Toggle dropdown list*/
/*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

var userMenuDiv = document.getElementById("userMenu");
var userMenu = document.getElementById("userButton");

var navMenuDiv = document.getElementById("nav-content");
var navMenu = document.getElementById("nav-toggle");

document.onclick = check;

function check(e){
  var target = (e && e.target) || (event && event.srcElement);

  //User Menu
  if (!checkParent(target, userMenuDiv)) {
    // click NOT on the menu
    if (checkParent(target, userMenu)) {
      // click on the link
      if (userMenuDiv.classList.contains("invisible")) {
      userMenuDiv.classList.remove("invisible");
      } else {userMenuDiv.classList.add("invisible");}
    } else {
      // click both outside link and outside menu, hide menu
      userMenuDiv.classList.add("invisible");
    }
  }

  //Nav Menu
  if (!checkParent(target, navMenuDiv)) {
    // click NOT on the menu
    if (checkParent(target, navMenu)) {
      // click on the link
      if (navMenuDiv.classList.contains("hidden")) {
      navMenuDiv.classList.remove("hidden");
      } else {navMenuDiv.classList.add("hidden");}
    } else {
      // click both outside link and outside menu, hide menu
      navMenuDiv.classList.add("hidden");
    }
  }
}

function checkParent(t, elm) {
  while(t.parentNode) {
    if( t == elm ) {return true;}
    t = t.parentNode;
  }
  return false;
}

/* Notifications */
function markAsRead(apiUrl, token) {
  if(apiUrl.trim() !== '' && token.trim() !== '') {
    $.ajax({
      url: apiUrl,
      type: "put",
      cache: false,
      headers: {
        'Authorization':'Bearer ' + token,
        'Accept': 'application/json',
      },
      success: function(result) {
        console.log(result);
      },
      error:function(error) {
        console.log(error);
      }
    });
  }
}

/* Configure Toastr */
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "3000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

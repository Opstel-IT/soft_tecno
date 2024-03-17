/** @format */

window.addEventListener("scroll", function () {
  const header = document.querySelector(".main-header");
  if (this.scrollY >= 100) {
    header.classList.add("active");
  } else {
    header.classList.remove("active");
  }
});

// nav

$("#menu-bar").click(function () {
  $("nav").toggleClass("active12");
  $("#menu-bar").toggleClass("fa-xmark");
});

// <!-- // Scroll var JS -->
const btnScrollToTop = document.querySelector("#btnScrollToTop");
btnScrollToTop.addEventListener("click", function () {
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: "smooth",
  });
});
$(document).ready(function () {
  var offset = 250;
  var duration = 500;

  $(window).scroll(function () {
    if ($(this).scrollTop() > offset) {
      $("#btnScrollToTop").fadeIn(duration);
    } else {
      $("#btnScrollToTop").fadeOut(duration);
    }
  });
});


// nav  end


/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown1").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
  if (!event.target.matches('.dropbtn1')) {
    var dropdowns = document.getElementsByClassName("dropdown-content1");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}


// filter section start 
// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myContant");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function () {
    var current = document.getElementsByClassName("action12");
    current[0].className = current[0].className.replace(" action12", "");
    this.className += " action12";
  });
}
// gallery data filter
$(document).ready(function () {
  var $list = $(".gallery .gallery_img").hide(),
    $curr;

  $(".btn")
    .on("click", function () {
      var $this = $(this);
      // $this.addClass("active").siblings().removeClass("active");
      $curr = $list.filter("." + this.id).hide();
      $curr.slice().show(200);
      $list.not($curr).hide(100);
    })
    .filter(".action12")
    .click();
});
// filter section end








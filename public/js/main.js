// Notification
let notification = document.getElementById("notification")

function notificationOpen(){
  notification.classList.toggle("open-notification")
}

// Table dropdown option
let tableSubMenu = document.getElementById("tableSubMenu")

function tabletoggleMenu(){
  tableSubMenu.classList.toggle("open-table-menu")
}

// Topbar Submenu
let subMenu = document.getElementById("subMenu")

function toggleMenu(){
  subMenu.classList.toggle("open-menu")
}

// Menu-list
const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menuBtn");
const closeBtn = document.querySelector("#close-btn");

menuBtn.addEventListener('click',() => {
    sideMenu.style.display = 'block';
})

if(closeBtn){
  closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
  })
}



// Submenu Slide
let currentScrollPosition = 0;
let scrollAmount = 150;

const sCont = document.querySelector(".storys-container");
const hScroll = document.querySelector(".horizontal-scroll"); 
const btnScrollLeft = document.querySelector("#btn-scroll-left");
const btnScrollRight = document.querySelector("#btn-scroll-right");

if(btnScrollLeft){
  btnScrollLeft.style.opacity = "0";
}

let maxScroll = -sCont.offsetWidth + hScroll.offsetWidth;

function scrollHorizontally(val){
    currentScrollPosition += (val * scrollAmount);

    if(currentScrollPosition >= 0){
        currentScrollPosition = 0
        btnScrollLeft.style.opacity = "0";
    }else{
        btnScrollLeft.style.opacity = "1";
    }

    if(currentScrollPosition <= maxScroll){
        currentScrollPosition = maxScroll;
        btnScrollRight.style.opacity = "0";
    }else{
        btnScrollRight.style.opacity = "1";
    }
    
    sCont.style.left = currentScrollPosition + "px";
}

const invoiceDropdownBtn = document.getElementById("invoice-btn");
const invoiceDropdownMenu = document.getElementById("invoice-dropdown");

if(invoiceDropdownMenu){
    const toggleDropdown = function () {
        invoiceDropdownMenu.classList.toggle("show");
    //   toggleArrow.classList.toggle("arrow");
    };
    
    invoiceDropdownBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      toggleDropdown();
    });
    
    document.documentElement.addEventListener("click", function () {
      if (invoiceDropdownMenu.classList.contains("show")) {
        toggleDropdown();
      }
    })
}


function addReminderToggle() {
    const reminderForm = document.getElementById("reminder-form")
    reminderForm.classList.toggle("show-reminder-form")
}


// Chart
(function(){
  var options = {
    series: [{
    name: 'series1',
    data: [1, 20, 30, 150, 155, 160, 170, 200, 190, 180, 200, 250, 300, 350, 400],
    fill:['#F44336']
  }],
    chart: {
    height: 350,
    type: 'area',
    zoom: {
      enabled: false
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth'
  },
  xaxis: {
    type: 'datetime',
    categories: ["1 Nov", "2 Nov", "3 Nov", "4 Nov", "5 Nov", "6 Nov", "7 Nov", "8 Nov", "9 Nov", "10 Nov", "11 Nov", "12 Nov", "13 Nov", "14 Nov", "15 Nov"]
  },
  tooltip: {
    x: {
      format: 'dd/MM/yy HH:mm'
    },
  },
  };
  })();

// alert(location.pathname.substring(1));
if(location.pathname.substring(1) == 'home'){
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
}





let switchBtn = document.getElementById('switchBtn');

// accordion
const accordionTitles = document.querySelectorAll(".accordionTitle");

accordionTitles.forEach((accordionTitle) => {
  accordionTitle.addEventListener("click", () => {
    if (accordionTitle.classList.contains("is-open")) {
      accordionTitle.classList.remove("is-open");
    } else {
      const accordionTitlesWithIsOpen = document.querySelectorAll(".is-open");
      accordionTitlesWithIsOpen.forEach((accordionTitleWithIsOpen) => {
        accordionTitleWithIsOpen.classList.remove("is-open");
      });
      accordionTitle.classList.add("is-open");
    }
  });
});

// Modal
let modalBtn = document.querySelector('.add-user-modal-btn');
let modalBg = document.querySelector('.add-user-modal-bg');
let modalClose = document.querySelector('.add-user-modal-close');

if(modalBtn && modalBg && modalClose){
    modalBtn.addEventListener('click', function(){
        modalBg.classList.add('add-user-bg-active')
    });
    
    modalClose.addEventListener('click', function(){
        modalBg.classList.remove('add-user-bg-active')
    });
}

// Filter Modal
let filterModalBtn = document.querySelector('.filter-modal-btn');
let filterModalBG = document.querySelector('.filter-modal-bg');
let filterModalClose = document.querySelector('.filter-modal-close');

if(filterModalBtn && filterModalBG && filterModalClose){
    filterModalBtn.addEventListener('click', function(){
      filterModalBG.classList.add('filter-modal-bg-active')
    });
    
    filterModalClose.addEventListener('click', function(){
      filterModalBG.classList.remove('filter-modal-bg-active')
    });
}


// Switch Profit Button
function leftClick(){
  switchBtn.style.left = '0'
}

function rightClick(){
  switchBtn.style.left = '137px'
}



// Dropdown menus
// const btns = document.querySelectorAll('.btn');
// const dropMenus = document.querySelectorAll('.drop-menu')

// btns.forEach(btn => {
//     btn.addEventListener('click', () => {
//         dropMenus.forEach(dropmenu => dropmenu.classList.remove('active'));
//         btn.classList.add('active');
//         document.querySelector(btn.dataset.target).classList.add('active');
//     })
// })

// Fort Modal
let fortModalBtn = document.getElementById("fort-modal-btn")
let fortModal = document.querySelector(".fort-modal")
let fortCloseBtn = document.querySelector(".fort-close-btn")

if(fortModalBtn && fortModal && fortCloseBtn){
    fortModalBtn.onclick = function(){
        fortModal.style.display = "block"
    }
    fortCloseBtn.onclick = function(){
        fortModal.style.display = "none"
    }
    window.onclick = function(e){
        if(e.target == fortModal){
            fortModal.style.display = "none"
        }
    }
}

// product dropdown
const dropdownBtn = document.getElementById("btnCustom");
const dropdownMenu = document.getElementById("dropdownCustom");

if(dropdownBtn && dropdownMenu){
    const toggleProductDropdown = function () {
        dropdownMenu.classList.toggle("show");
    };
    
    dropdownBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        toggleProductDropdown();
    });
    
    document.documentElement.addEventListener("click", function () {
        if (dropdownMenu.classList.contains("show")) {
            toggleProductDropdown();
        }
    });
}
// end of product dropdown
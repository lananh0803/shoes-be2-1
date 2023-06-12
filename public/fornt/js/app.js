const menudropdowngender = document.querySelector('.gender');
const subGender = document.querySelector('.sub-gender');
const menudropdowntype = document.querySelector('.type');
const subType = document.querySelector('.sub-type');
const btnCloseSide = document.querySelector('.sidebar-close');
const headersidebar = document.querySelector('.header-sidebar');
const sidebarcontainer = document.querySelector('.sidebar-container');
const menutoggle = document.querySelector('.menu-toggle');
const btnSearch = document.querySelector('#btnSearch');
const inputString = document.querySelector('#inputString');
const left = document.querySelector('.left');
const right = document.querySelector('.right');
const pscart = document.querySelector('.ps-cart');
const searchform = document.querySelector('.searchform');

let checkgender = false;
let checktype = false;
menudropdowngender.addEventListener('click', function () {
  if (checkgender == false) {
    subGender.style.display = 'block';
    checkgender = true;
  }
  else{
    subGender.style.display = 'none';
    checkgender = false;
  }

});

menudropdowntype.addEventListener('click', function () {
  if (checktype == false) {
    subType.style.display = 'block';
    checktype = true;
  }
  else{
    subType.style.display = 'none';
    checktype = false;
  }
});

btnCloseSide.addEventListener('click', function () {
    headersidebar.style.display = 'none';
});


menutoggle.addEventListener('click', function () {
  headersidebar.style.display = 'flex';
});
btnSearch.addEventListener('click', function () {
  right.style.width = '100%';
  inputString.style.display = 'block';
  left.style.display = 'none';
  menutoggle.style.display = 'none';
  pscart.style.display = 'none';
  right.style.marginTop = '30px';
  searchform.style.width = '100%';
});



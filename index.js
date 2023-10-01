const wrapper = document.querySelector('.wrapper');
const loginlink = document.querySelector('.login-link');
const registerlink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const icnClose = document.querySelector('.icon-close');
// const icnClose = document.querySelector('.icon-close');

registerlink.addEventListener('click', ()=>{
    wrapper.classList.add('active');
});
loginlink.addEventListener('click', ()=>{
    wrapper.classList.remove('active');
});
btnPopup.addEventListener('click', ()=>{
    wrapper.classList.add('active-popup');
});
icnClose.addEventListener('click', ()=>{
    wrapper.classList.remove('active-popup');
});
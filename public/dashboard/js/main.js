const main = document.querySelector('.container')
const btnSignIn = document.querySelector('.log')
const btnSignUp = document.querySelector('.out')

btnSignIn.addEventListener('click', () => {
    main.classList.add('active')
})

btnSignUp.addEventListener('click', () => {
    main.classList.remove('active')
})
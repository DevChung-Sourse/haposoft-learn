const login = $('#login')
const register = $('#register')
const formLogin = $('#formLogin')
const formRegister = $('#formRegister')

formRegister.click(() => {
    console.log('click');
  if (!formRegister.hasClass('active-lr') && !register.hasClass('active-display')) {
    formRegister.addClass('active-lr')
    register.addClass('active-display')
    formLogin.removeClass('active-lr')
    login.removeClass('active-display')
  }
})

formLogin.click(() => {
  if (!formLogin.hasClass('active-lr') && !login.hasClass('active-display')) {
    formLogin.addClass('active-lr')
    login.addClass('active-display')
    formRegister.removeClass('active-lr')
    register.removeClass('active-display')
  }
})

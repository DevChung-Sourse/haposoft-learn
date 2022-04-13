const login = $('#login')
const register = $('#register')
const formLogin = $('#formLogin')
const formRegister = $('#formRegister')

formRegister.click(() => {
    console.log('click');
  if (!formRegister.hasClass('active-lr') && !register.hasClass('active-display')) {
    $('#loginModal').modal();
    formRegister.addClass('active-lr')
    register.addClass('active-display')
    formLogin.removeClass('active-lr')
    login.removeClass('active-display')
  }
})

formLogin.click(() => {
  if (!formLogin.hasClass('active-lr') && !login.hasClass('active-display')) {
    $('#loginModal').modal();
    formLogin.addClass('active-lr')
    login.addClass('active-display')
    formRegister.removeClass('active-lr')
    register.removeClass('active-display')
  }
})

if ($('#error').hasClass('alert-danger')) {
    $('#loginModal').modal();
}

if ($('input').hasClass('login')) {
    $('#loginModal').modal();
}

if ($('#success').hasClass('alert-success')) {
    $('#loginModal').modal();
}

if ($('input').hasClass('is-invalid')) {
    $('#loginModal').modal();
}

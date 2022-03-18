$(document).ready(() => {
  const navBarIcon = document.querySelector(".nav-bar-icon")
  const menu = document.querySelector("#menu")

  navBarIcon.addEventListener("click", () => {
    menu.classList.toggle("active-menu")
  })

  $('.feedback-carousel').slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 2,
    arrows: false,
    autoplay: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  })

  const login = $('#login')
  const register = $('#register')  
  const formLogin = $('#formLogin')
  const formRegister = $('#formRegister')

  formRegister.click ( ()=> {
    if (!formRegister.hasClass('active-lr') && !register.hasClass('active-display')) {
      formRegister.addClass('active-lr')
      register.addClass('active-display')
      formLogin.removeClass('active-lr')
      login.removeClass('active-display')
    }
  })

  formLogin.click ( ()=> {
    if (!formLogin.hasClass('active-lr') && !login.hasClass('active-display')) {
      formLogin.addClass('active-lr')
      login.addClass('active-display')
      formRegister.removeClass('active-lr')
      register.removeClass('active-display')
    }
  })

  $('.contact-logo').click(function () {
    $('.contact-logo > a').toggleClass('contact-active')
    $('.info-contact').toggleClass('info-contact-active')
  })
})

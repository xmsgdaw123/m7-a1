(() => {
  let loginStatus = false // login

  const breadcrumb = document.getElementById('breadcrumb')
  const containerHome = document.getElementById('home-container')
  const containerProfile = document.getElementById('profile-container')
  const navHome = document.getElementById('home')
  const navProfile = document.getElementById('profile')
  const inputUsername = document.getElementById('username')
  const inputPassword = document.getElementById('password')
  const btnAuth = document.getElementById('btn-auth')
  const btnSwitchLogin = document.getElementById('login-switch')
  const loginTitle = document.getElementById('login-title')

  btnSwitchLogin?.addEventListener('click', evt => {
    evt.preventDefault()
    loginStatus = !loginStatus
    loginTitle.innerText = loginStatus ? 'Registrarse' : 'CEFP Núria'
    btnSwitchLogin.innerText = loginStatus ? 'Iniciar sesión' : 'Crear una nueva cuenta'
    inputUsername.value = ''
    inputPassword.value = ''
  })

  btnAuth?.addEventListener('click', async evt => {
    evt.preventDefault()
    const username = inputUsername.value
    const password = inputPassword.value

    const body = new FormData()
    body.append('operation', loginStatus ? 'register' : 'login')
    body.append('username', username)
    body.append('password', password)

    const request = await fetch('./controllers/auth.php', {
      method: 'POST',
      redirect: 'follow',
      body
    })

    if (request.redirected) {
      window.location.href = request.url
      return
    }

    const response = await request.json()
    if (response.status === 'error') {
      inputUsername.value = ''
      inputPassword.value = ''
      alert(response.data)
    }
  })

  navHome?.addEventListener('click', () => {
    navProfile.classList.remove('active')
    navHome.classList.add('active')
    containerHome.style.display = ''
    containerProfile.style.display = 'none'
    breadcrumb.innerText = '/'
  })

  navProfile?.addEventListener('click', () => {
    navHome.classList.remove('active')
    navProfile.classList.add('active')
    containerProfile.style.display = ''
    containerHome.style.display = 'none'
    breadcrumb.innerText = '/perfil'
  })
})()
  const form = document.querySelector('.login-form');
  const usernameInput = document.querySelector('#username');
  const passwordInput = document.querySelector('#password');

  form.addEventListener('submit', (event) => {
      event.preventDefault(); 

      if (!usernameInput.value || !passwordInput.value) {
          alert('Please fill in all fields.');
          return;
      }

      console.log('Form submitted:', {
          username: usernameInput.value,
          password: passwordInput.value
      });

      form.reset();
  });

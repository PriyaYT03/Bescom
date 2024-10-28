  const form = document.querySelector('.login-form');
  const usernameInput = document.querySelector('#username');
  const passwordInput = document.querySelector('#password');

  form.addEventListener('submit', (event) => {
      event.preventDefault(); // Prevent default form submission behavior

      // Basic validation (you can add more robust validation as needed)
      if (!usernameInput.value || !passwordInput.value) {
          alert('Please fill in all fields.');
          return;
      }

      // Simulate form submission (replace with your actual backend logic)
      console.log('Form submitted:', {
          username: usernameInput.value,
          password: passwordInput.value
      });

      // Reset form fields after submission
      form.reset();
  });

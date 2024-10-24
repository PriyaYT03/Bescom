const loginForm = document.getElementById('login-form');
const forgotPasswordLink = document.getElementById('forgot-password-link');
const forgotPasswordForm = document.getElementById('forgot-password-form');

forgotPasswordLink.addEventListener('click', (e) => {
	e.preventDefault();
	loginForm.style.display = 'none';
	forgotPasswordForm.style.display = 'block';
});

forgotPasswordForm.addEventListener('submit', (e) => {
	e.preventDefault();
	const email = document.getElementById('email').value;
	// Call API to send reset link
	fetch('/send-reset-link', {
		method: 'POST',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify({ email }),
	})
		.then((res) => res.json())
		.then((data) => console.log(data))
		.catch((err) => console.error(err));
});

loginForm.addEventListener('submit', (e) => {
	e.preventDefault();
	const name = document.getElementById('name').value;
	const employeeId = document.getElementById('employee-id').value;
	const password = document.getElementById('password').value;
	// Call API to authenticate
	fetch('/authenticate', {
		method: 'POST',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify({ name, employeeId, password }),
	})
		.then((res) => res.json())
		.then((data) => console.log(data))
})

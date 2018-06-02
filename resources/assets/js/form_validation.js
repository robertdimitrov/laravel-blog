// form classes
let registrationFormCls = 'registration-form'
let feedbackCls = 'feedback'

// validation patterns
let namePattern = /^.{2,30}$/
let passwordPattern = /^.{6,30}$/

// validation error messages
let nameLengthMessage = 'Name must be between 2 and 30 characters.'
let passwordLengthMessage = 'Password must be between 6 and 30 characters.'
let passwordMismatchMessage = 'Password does not match the confirm password.'

let validName = (name) => namePattern.test(name)
let validPassword = (password) => passwordPattern.test(password)
let validPasswordMatch = (password, passwordConfirmation) => password === passwordConfirmation

let formFeedback = (message) => {
	let feedback = document.getElementsByClassName(feedbackCls)[0]
	feedback.innerHTML = ''
	let feedbackElement = document.createElement('p')
	feedbackElement.innerText = message
	feedback.appendChild(feedbackElement)
}

let validateRegistrationForm = (name, password, passwordConfirmation) => {
	if (!validName(name)) {
		formFeedback(nameLengthMessage)
		return false
	}

	if (!validPassword(password)) {
		formFeedback(passwordLengthMessage)
		return false
	}

	if (!validPasswordMatch(password, passwordConfirmation)) {
		formFeedback(passwordMismatchMessage)
		return false
	}

	return true
}

let registrationForm = document.getElementsByClassName(registrationFormCls)[0]

registrationForm.addEventListener('submit', function(e) {
	let nameValue = registrationForm.elements['name'].value
	let passwordValue = registrationForm.elements['password'].value
	let passwordConfirmationValue = registrationForm.elements['password_confirmation'].value

	if (!validateRegistrationForm(nameValue, passwordValue, passwordConfirmationValue)) {
		e.preventDefault()
	}
})
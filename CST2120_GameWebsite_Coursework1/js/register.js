const firstnameEl = document.querySelector('#firstname');
const lastnameEl = document.querySelector('#lastname');
const emailEl = document.querySelector('#email');
const passwordEl = document.querySelector('#password');
const confirmPasswordEl = document.querySelector('#psw-confirm');
const genderEl = document.querySelector('#gender');
const birthdayEl = document.querySelector('#birthday');

const form = document.querySelector('#signup');

const checkFirstname = () => {

    let valid = false;

    const min = 3,
       max = 15;

   const firstname = firstnameEl.value.trim();

   if (!isRequired(firstname)){
       showError(firstnameEl, 'Firstname cannot be blank.');
   } else if (!isBetween(firstname.length,min,max)){
       showError(firstnameEl, 'Firstname must be between ${min:3} and ${max:25} characters.')
   } else {
       showSuccess(firstnameEl);
       valid = true;
   }
   return valid;
};

const checkLastname = () => {

    let valid = false;

    const min = 3,
       max = 15;

   const lastname = lastnameEl.value.trim();

   if (!isRequired(lastname)){
       showError(lastnameEl, 'lastname cannot be blank.');
   } else if (!isBetween(lastname.length,min,max)){
       showError(lastnameEl, 'lastname must be between ${min:3} and ${max:25} characters.')
   } else {
       showSuccess(lastnameEl);
       valid = true;
   }
   return valid;
};

const checkEmail = () => {
    let valid = false;
    const email = emailEl.value.trim();
    if (!isRequired(email)){
        showError(emailEl, 'Email cannot be blnak.');
    } else if (!isEmailValid(email)){
        showError(emailEl, 'Email is not valid.')
    } else {
        showSuccess(emailEl);
        valid = true
    }
    return valid;
};

const checkPassword = () => {
    let valid = false;
    const password = passwordEl.value.trim();
    if (!isRequired(password)){
        showError(passwordEl,'Password cannot be blank.');
    } else if (!isPasswordSecure(password)) {
        showError(passwordEl, 'Password must has at least 8 characters that includes at least 1 lowercase character, 1 uppercase character, 1 number, and 1 special character in (!@#$%^&*)');
    } else {
        showSuccess(passwordEl);
        valid = true;
    }
    return valid;
};

const checkConfirmPassword = () => {
    let valid = false;
    // check confirm password
    const confirmPassword = confirmPasswordEl.value.trim();
    const password = passwordEl.value.trim();

    if (!isRequired(confirmPassword)){
        showError(confirmPasswordEl, 'Please enter the password again');
    } else if (password !== confirmPassword){
        showError(confirmPasswordEl, 'The password does not match');
    }else {
        showSuccess(confirmPasswordEl);
        valid = true;
    }
    return valid;
};

const isEmailValid = (email) => {

    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return re.test(password);
};

const isRequired = value => value === ''? false : true;
const isBetween = (length, min, max) => length < min || length > max ? false : true;

const showError = (input, message) => {
    //get the form-field element
    const formField = input.parentElement;
    //add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    //show the error message
    const error = formField.querySelector("small");
    error.textContent = message;
};

const showSuccess = (input) => {
    // get the form-field element
    const formField = input.parentElement;

    //remove the error class
    formField.classList.remove('error');
    formField.classList.add('success');

    //hide the error message
    const error = formField.querySelector('small');
    error.textContent= '';
}

form.addEventListener('submit', function (e){
    // prevent the form from submitting
    e.preventDefault();

    //validate fields
let isFirstnameValid = checkFirstname(),
    isLastnameValid = checkLastname(),
    isEmailVaild = checkEmail(),
    isPasswordValid = checkPassword(),
    isConfirmPasswordValid = checkConfirmPassword();


let isFormValid = isFirstnameValid &&
    isLastnameValid &&
    isEmailVaild &&
    isPasswordValid &&
    isConfirmPasswordValid;

    //Submit to the server if the form is valid
    if (isFormValid){

    }
});

const debounce = (fn, delay = 500) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'firstname':
            checkFirstname();
            break;
        case 'lastname':
            checkLastname();
            break;
        case 'email':
            checkEmail();
            break;
        case 'password':
            checkPassword();
            break;
        case 'psw-confrim':
            checkConfirmPassword();
            break;
    }
}));








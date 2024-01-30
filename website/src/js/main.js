const buttonRedirectLogin = document.getElementById('buttonRedirectLogin');
const buttonRedirectSignUp = document.getElementById('buttonRedirectSignUp');
const buttonBack = document.getElementById('back');
const buttonSend = document.getElementById('send');
const inputMailSignUp = document.getElementById('mailSignUp');
const inputNameSignUp = document.getElementById('nameSignUp');
const inputFirstnameSignUp = document.getElementById('firstnameSignUp');
const inputPasswordSignUp = document.getElementById('passwordSignUp');
const inputMailLogin = document.getElementById('mailLogin');
const inputPasswordLogin = document.getElementById('passwordLogin');


if (buttonSend !== null) {
    buttonSend.disabled=true;
}

if (buttonBack !== null) {
    buttonBack.addEventListener('click', () => {
        window.location.href = '../racine.html';
    });
}

if (buttonRedirectLogin !== null || buttonRedirectSignUp !== null) {
    buttonRedirectLogin.addEventListener('click', () => {
    window.location.href = 'pages/connexion.html';
    });
}

if (buttonRedirectSignUp !== null || buttonRedirectLogin !== null) {
    buttonRedirectSignUp.addEventListener('click', () => {
    window.location.href = 'pages/inscription.html';
    });
}

if (inputFirstnameSignUp !== null) {
    inputPasswordSignUp.addEventListener('blur', validateFormSignUp);
}

if (inputMailLogin !== null) {
    inputPasswordLogin.addEventListener('blur', validateFormLogin);
}

function validateFormSignUp() {
    const mail = inputMailSignUp.value,
          firstName = inputFirstnameSignUp.value,
          name = inputNameSignUp.value,
          password = inputPasswordSignUp.value,
          mailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
          nameRegex = /^[a-zA-Z]+$/;

    if (mailRegex.test(mail) && nameRegex.test(name) && nameRegex.test(firstName)) {
        buttonSend.style.backgroundColor = '#4158D0';
        buttonSend.disabled=false;
        inputMailSignUp.style.borderColor = 'black';
        inputMailSignUp.style.borderWidth = '1px';
        inputNameSignUp.style.borderColor = 'black';
        inputNameSignUp.style.borderWidth = '1px';
        inputFirstnameSignUp.style.borderColor = 'black';
        inputFirstnameSignUp.style.borderWidth = '1px';
        inputPasswordSignUp.style.borderColor = 'black';
        inputPasswordSignUp.style.borderWidth = '1px';
    }
    if (!mailRegex.test(mail)) {
        console.log('mailRegex.test(mail) : ',inputMailSignUp.value, mailRegex.test(mail));
        inputMailSignUp.style.borderColor = 'red';
        inputMailSignUp.style.borderWidth = '3px';
        buttonSend.style.backgroundColor = 'grey';
        buttonSend.disabled=true;
    }
    if (!nameRegex.test(name)) {
        console.log('nameRegex.test(name) : ',inputNameSignUp.value, nameRegex.test(name));
        inputNameSignUp.style.borderColor = 'red';
        inputNameSignUp.style.borderWidth = '3px';
        buttonSend.style.backgroundColor = 'grey';
        buttonSend.disabled=true;
    }
    if (!nameRegex.test(firstName)) {
        console.log('nameRegex.test(name) : ',inputFirstnameSignUp.value, nameRegex.test(name));
        inputFirstnameSignUp.style.borderColor = 'red';
        inputFirstnameSignUp.style.borderWidth = '3px';
        buttonSend.style.backgroundColor = 'grey';
        buttonSend.disabled=true;
    }
}

function validateFormLogin() {
    console.log('validateFormLogin');
    const mail = inputMailLogin.value,
          password = inputPasswordLogin.value,
          mailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (mailRegex.test(mail)) {
        buttonSend.style.backgroundColor = '#4158D0';
        buttonSend.disabled=false;
        inputMailLogin.style.borderColor = 'black';
        inputMailLogin.style.borderWidth = '1px';
        inputPasswordLogin.style.borderColor = 'black';
        inputPasswordLogin.style.borderWidth = '1px';
    }
    if (!mailRegex.test(mail)) {
        console.log('mailRegex.test(mail) : ',inputMailLogin.value, mailRegex.test(mail));
        inputMailLogin.style.borderColor = 'red';
        inputMailLogin.style.borderWidth = '3px';
        buttonSend.style.backgroundColor = 'grey';
        buttonSend.disabled=true;
    }
}

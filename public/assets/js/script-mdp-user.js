/////////////////////// Mot de passe identique USER

// Mes Sélécteurs
const inputPassword = document.getElementById('passwordNewAccountGuest');
const inputPasswordConfirm = document.getElementById('passwordConfirmNewAccountGuest');
const pwdMessageError = document.getElementById('pwdMessageError');

// Fonction fléchée vérif mot de passe identique USER
const updatePasswords = () => {
    inputPassword.classList.remove('border-danger', 'border-success', 'border-2')
    inputPasswordConfirm.classList.remove('border-danger', 'border-success', 'border-2')
    pwdMessageError.classList.add('d-none');
    if(inputPassword.value == '', inputPasswordConfirm.value == ''){
        return
    }
    if (inputPassword.value === inputPasswordConfirm.value) {
        inputPassword.classList.add('border-success', 'border-2')
        inputPasswordConfirm.classList.add('border-success', 'border-2')
    } else {
        inputPassword.classList.add('border-danger', 'border-2')
        inputPasswordConfirm.classList.add('border-danger', 'border-2')
        pwdMessageError.classList.remove('d-none');
    }
};

// Resultat
inputPassword.addEventListener('input', updatePasswords);
inputPasswordConfirm.addEventListener('input', updatePasswords);

/////////////////////// Force du mot de passe USER

// Mes Sélécteurs
const pwdSecurity = document.getElementById('pwdSecurity');
const pwdSecurityLow = document.getElementById('pwdSecurityLow');
const pwdSecurityMedium = document.getElementById('pwdSecurityMedium');
const pwdSecurityStrong = document.getElementById('pwdSecurityStrong');

// Regex
const pwdRegex = /^[a-z].{0,}$/;
const pwdLowRegex = /^(?=.*[A-Z]).{8,}$/
const pwdMediumRegex = /^(?=.*[A-Z])(?=.*[0-9]).{8,}$/
const pwdStrongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)[A-Za-z\d\W]{8,}$/


// fonction sécurité
const checkSecurite = () => {
    // On réinitialise 
    pwdSecurity.classList.add('d-none');
    pwdSecurityLow.classList.add('d-none');
    pwdSecurityMedium.classList.add('d-none');
    pwdSecurityStrong.classList.add('d-none');
    // Si champs vide, on sort de la fonction
    if (inputPassword.value == '') {
        return;
    }
    result = pwdRegex.test(inputPassword.value)
    if (result) { 
        pwdSecurity.classList.remove('d-none');
    }     
    resultLow = pwdLowRegex.test(inputPassword.value)
    if (resultLow) { 
        pwdSecurityLow.classList.remove('d-none');
        pwdSecurity.classList.add('d-none');
    } 
    resultMedium = pwdMediumRegex.test(inputPassword.value)
    if (resultMedium) { 
        pwdSecurityMedium.classList.remove('d-none');
        pwdSecurityLow.classList.add('d-none');
        pwdSecurity.classList.add('d-none');
    }    
    resultStrong = pwdStrongRegex.test(inputPassword.value)
    if (resultStrong) { 
        pwdSecurityStrong.classList.remove('d-none');
        pwdSecurityMedium.classList.add('d-none');
        pwdSecurityLow.classList.add('d-none');
        pwdSecurity.classList.add('d-none');
    }
}

// Resultat
inputPassword.addEventListener('input', checkSecurite);


/////////////////////// Mot de passe identique USER

// Mes Sélécteurs
const passwordProducer = document.getElementById('passwordProducer');
const passwordConfirmProducer = document.getElementById('passwordConfirmProducer');
const pwdMessageErrorProducer = document.getElementById('pwdMessageErrorProducer');

// Fonction fléchée vérif mot de passe identique USER
const updatePasswordsProducer = () => {
    passwordProducer.classList.remove('border-danger', 'border-success', 'border-2')
    passwordConfirmProducer.classList.remove('border-danger', 'border-success', 'border-2')
    pwdMessageErrorProducer.classList.add('d-none');
    if(passwordProducer.value == '', passwordConfirmProducer.value == ''){
        return
    }
    if (passwordProducer.value === passwordConfirmProducer.value) {
        passwordProducer.classList.add('border-success', 'border-2')
        passwordConfirmProducer.classList.add('border-success', 'border-2')
    } else {
        passwordProducer.classList.add('border-danger', 'border-2')
        passwordConfirmProducer.classList.add('border-danger', 'border-2')
        pwdMessageErrorProducer.classList.remove('d-none');
    }
};

// Resultat
passwordProducer.addEventListener('input', updatePasswordsProducer);
passwordConfirmProducer.addEventListener('input', updatePasswordsProducer);

console.log('test');
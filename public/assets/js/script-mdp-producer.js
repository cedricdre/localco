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
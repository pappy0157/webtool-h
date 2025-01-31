import { 
    isValid, 
    isExpirationDateValid, 
    isSecurityCodeValid
} from 'creditcard.js';

window.isValid    = (num) => isValid(num);
window.isValidExp = (m, y) => isExpirationDateValid(m, y);
window.isValidCvv = (num, cvv) => isSecurityCodeValid(num, cvv);
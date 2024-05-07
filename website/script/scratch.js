let array = ['mom', 'dad', 'son', 'daughter'];

let str = 'son';

console.log(array[2]); //son

function check(liste, ord){
    if (liste.includes(ord)){
        console.log('Yep');
    }
}
check(array, str);
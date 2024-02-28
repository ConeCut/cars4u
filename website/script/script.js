let dropDownContent = document.getElementById('dropDownContent')
let clickedAmount = 0;

function dropContent() {
    clickedAmount++;
    if (clickedAmount % 2 !== 0) {
        dropDownContent.style.display = 'inherit';
    } else {
        dropDownContent.style.display = 'none';
    }
}

function burgerIcon(x) {
    x.classList.toggle("change");
}


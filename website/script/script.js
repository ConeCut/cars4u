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

function redirectFAQ(){
    window.location.href = "../../website/FAQ.php"
}

function redirectContact(){
    window.location.href = "../../website/contact.php"
}

function redirectProducts(){
    window.location.href = "../../website/products.php"
}

function redirectAbout(){
    window.location.href = "../../website/about.php"
}

function likesUp(){
    //TODO: Increase like count after running a SELECT query and putting in a variable for each click
    //TODO: If a user already liked a post, do not let them like again, put it as bool (liked true or false)

}

function replyLikeUp(){
    //TODO: Do the same for replies
}
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

function redirectFAQ() {
    window.location.href = "website/FAQ.php"
}

function redirectContact() {
    window.location.href = "website/contact.php"
}

function redirectProducts() {
    window.location.href = "website/products.php"
}

function redirectAbout() {
    window.location.href = "website/about.php"
}

function redirectHome() {
    window.location.href = "../index/index.php"
}

//input code for files
let inputs = document.querySelectorAll('.file_input');
Array.prototype.forEach.call(inputs, function (input) {
    let label = input.nextElementSibling,
        labelVal = label.innerHTML;

    input.addEventListener('change', function (e) {
        let fileName = '';
        if (this.files && this.files.length > 1)
            fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
        else
            fileName = e.target.value.split('\ ').pop();

        if (fileName)
            label.querySelector('span').innerHTML = fileName;
        else
            label.innerHTML = labelVal;
    });
});

function likesUp(e) {
    let request = new XMLHttpRequest();
    let likeCounter = e.parentElement.parentElement.querySelector(".like_counter")
    request.addEventListener("load", (e) => {
        if (request.responseText === "Liked post") {
            likeCounter.innerHTML = String(Number(likeCounter.innerHTML) + 1);
        } else if (request.responseText === "Like Removed"){
            likeCounter.innerHTML = String(Number(likeCounter.innerHTML) - 1);
        }
    })
    request.open("POST", "../post_manager/like_handler.php");
    request.send(
        JSON.stringify({
                "postId": e.getAttribute("post-id"),
                "type": "like"
            }
        )
    );
}

function dislikesUp(e) {
    let request = new XMLHttpRequest();
    let dislikeCounter = e.parentElement.parentElement.querySelector(".dislike_counter")
    request.addEventListener("load", (e) => {
        if (request.responseText === "Disliked Post") {
            console.log(request.responseText)
            dislikeCounter.innerHTML = String(Number(dislikeCounter.innerHTML) + 1);
        } else if (request.responseText === "Dislike removed"){
            console.log(request.responseText)
            dislikeCounter.innerHTML = String(Number(dislikeCounter.innerHTML) - 1);
        }
    })

    request.open("POST", "../post_manager/like_handler.php");
    request.send(
        JSON.stringify({
                "postId": e.getAttribute("post-id"),
                "type": "dislike"
            }
        )
    );
}
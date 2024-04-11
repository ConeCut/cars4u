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
    window.location.href = "FAQ.php"
}

function redirectContact(){
    window.location.href = "contact.php"
}

function redirectProducts(){
    window.location.href = "products.php"
}

function redirectAbout(){
    window.location.href = "about.php"
}

function redirectHome(){
    window.location.href = "../../index.php"
}
function likesUp(){
    //TODO: Increase like count after running a SELECT query and putting in a variable for each click
    //TODO: If a user already liked a post, do not let them like again, put it as bool (liked true or false)

}

function replyLikeUp(){
    //TODO: Do the same for replies
}
//input code for files

let inputs = document.querySelectorAll( '.file_input' );
Array.prototype.forEach.call( inputs, function( input )
{
    let label	 = input.nextElementSibling,
        labelVal = label.innerHTML;

    input.addEventListener( 'change', function( e )
    {
        let fileName = '';
        if( this.files && this.files.length > 1 )
            fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
        else
            fileName = e.target.value.split( '\ ' ).pop();

        if( fileName )
            label.querySelector( 'span' ).innerHTML = fileName;
        else
            label.innerHTML = labelVal;
    });
});
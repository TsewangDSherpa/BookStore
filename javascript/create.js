


var bookprice;



window.addEventListener("load", function () {
    bookprice = this.document.getElementById("book_price");
    var cssSelector = "input[type=text],input[type=email],input[type=number],textarea";
    var fields = this.document.querySelectorAll(cssSelector);

    var btn = this.document.querySelector("input[type=submit]");

    btn.addEventListener("click", e => {

        let x = document.forms["form"]["book_description"].value;
        if (x == "") {
            alert("Book Description must be filled out");
            e.preventDefault();
        }


        if ((bookprice.value).toString().indexOf(".") <= 10 || (bookprice.value).toString().indexOf(".") == -1) {
            if (bookprice.value.indexOf(".") >= 0) {
                if (bookprice.value.length - bookprice.value.indexOf(".") > 10) {
                    alert("Price must be 10 digits maximum before the decimal!");
                    e.preventDefault();

                }
            }
            else {
                if (bookprice.value.length > 10) {
                    alert("Price must be 10 digits Max!");
                     e.preventDefault();
                }

            }
        }
        else {
            alert("Price must be 10 digits Maximum!");
             e.preventDefault();

        }




    });


    for (i = 0; i < fields.length; i++) {
        fields[i].addEventListener("focus", setBackground);
        fields[i].addEventListener("blur", setBackground);

    }



});



function setBackground(e) {



    if (e.type == "focus") {
        e.target.style.backgroundColor = "#f2f8d2";
    }
    else if (e.type == "blur") {

        e.target.style.backgroundColor = "white";
    }
}

function validateForm(e) {

}



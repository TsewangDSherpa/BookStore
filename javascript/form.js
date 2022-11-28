   /* Tsewang D Sherpa 
   IT202 - 001
   Nov 10, 2022 
   Semester Phase 2  */

/* code goes here */

function init() {
    document.getElementById("mailList").addEventListener("submit", checkForEmptyFields);

}


//initialize handlers once page is ready

window.addEventListener("load", init);

//ensures form fields are not empty

function checkForEmptyFields(e) {

    var errorArea = document.getElementById("errors");
    errorArea.className = "hidden";

   
    
    var zipcodeErr = document.getElementById("zipcodeError");
    zipcodeErr.className = "hidden";
    var stateErr = document.getElementById("stateError");
    stateErr.className = "hidden";
   
    var cssSelector = "input[type=text],input[type=email],input[type=number]";
    var fields = document.querySelectorAll(cssSelector);
   
    //loop through input elements looking for empty values;
    var fieldList = [];
    for (i = 0; i < fields.length; i++) {
        if (fields[i].value == null || fields[i].value == "") {
            e.preventDefault();
            fieldList.push(fields[i]);
        }
        else if(fields[i].name == "zipcode" || fields[i].name == "state" ){
            if (fields[i].name == "zipcode" && fields[i].value.length != 5) {
                zipcodeErr.className = "visible";
                zipcodeErr.innerHTML = "Zipcode has to be exactly 5 exactly digits";
                e.preventDefault();
            }
            else if(fields[i].name == "zipcode" && fields[i].value.length == 5) {
                zipcodeErr.innerHTML = "";
             zipcodeErr.className = "hidden";}

            if (fields[i].name == "state" && fields[i].value.length != 2) 
            {
                


                 stateErr.className = "visible";
                stateErr.innerHTML = "State needs to be exactly 2 digits";
                e.preventDefault();
            }
           else if(fields[i].name == "state" && fields[i].value.length == 2) {
                stateErr.innerHTML = "";
                stateErr.className = "hidden";
            }
        }
       
        

    }

    var msg = "The following fields can't be empty: ";
    if (fieldList.length > 0) {
        for (i = 0; i < fieldList.length; i++) {
            i == fieldList.length-1 ? msg += fieldList[i].id + ".": msg += fieldList[i].id + ", ";

        }
        errorArea.innerHTML = msg;
        errorArea.className = "visible";
    }
    else{
        errorArea.className = "hidden";
    }
}





    function setBackground(e) {
      if (e.type == "focus") {
        e.target.style.backgroundColor = "#f2f8d2";
      }
      else if (e.type == "blur") {

        e.target.style.backgroundColor = "white";
      }
    }


    window.addEventListener("load", function () {
      var cssSelector = "input[type=text],input[type=email],input[type=number],textarea";
      var fields = this.document.querySelectorAll(cssSelector);
    

      for (i = 0; i < fields.length; i++) {
        fields[i].addEventListener("focus", setBackground);
        fields[i].addEventListener("blur", setBackground);

      }

    });






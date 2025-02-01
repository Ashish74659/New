function myFunction() {
    var name = document.getElementById("name").value;
    var error = document.getElementById("errormsg");
    error.innerHTML = "";
    var expr = /^[A-Za-z\s]*$/;
    if (expr.test(name)) {
        
    }
    else{
    error.innerHTML = "<span style='color:red '>Invalid</span>";
    }
}


function myFunctionForDigit() {
    var number = document.getElementById("code").value;
    var error = document.getElementById("demo");
    lblError.innerHTML = "";
    var expr = /^\d+$/;
    if (expr.test(number)) {
        
    }
    else{
    error.innerHTML = "<span style='color:red '>Invalid</span>";
    }
}



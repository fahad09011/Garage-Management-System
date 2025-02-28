// here we access form by its ID
let form = document.getElementById("form")

// here we access the name filed by its ID
let nam = document.getElementById("supplier_name");

let nameValidation = (enetredName)=>{
    let pattern = /^[A-Za-z ]+$/
    if (pattern.test(enetredName)) {
        return true;
    }
    else{
        return false
    }
}

form.addEventListener("submit",(f)=>{
    
    let nameValue = nam.value.trim();
    nam.setCustomValidity("");
if (!nameValidation(nameValue)) {
    f.preventDefault();
    nam.setCustomValidity("NAme must contain only alphabet and spaces!");
    nam.reportValidity();
}
});

nam.addEventListener("input",()=>{
    let nameValue=nam.value.trim();
    if (nameValidation(nameValue)) {
        nam.setCustomValidity("");
    }
});
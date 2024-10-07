const clearButton = document.getElementById("clearButton");

clearButton.addEventListener("click", function(event){
    event.preventDefault();

    let titleField = document.getElementById("title");
    let contentField = document.getElementById("content");

    titleField.value = "";
    contentField.value = "";
});

const submitButton = document.getElementById("submitButton");

submitButton.addEventListener("click", function(event){
    let titleField = document.getElementById("title");
    let contentField = document.getElementById("content");

    if (titleField.value == "" || contentField.value == "") {
        event.preventDefault();

        if (titleField.value == ""){
            titleField.classList.add("invalidInput");
        }
        if (contentField.value == ""){
            contentField.classList.add("invalidInput");
        }
    }
});

let titleField = document.getElementById("title");
let contentField = document.getElementById("content");

titleField.addEventListener("click", function(event){
    if (titleField.classList.contains("invalidInput")){
        titleField.classList.remove("invalidInput");
    }
});


contentField.addEventListener("click", function(event){
    if (contentField.classList.contains("invalidInput")){
        contentField.classList.remove("invalidInput");
    }
});
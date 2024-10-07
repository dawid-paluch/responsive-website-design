const editLink = document.getElementById("returnEditLink");

editLink.addEventListener("click", function(event){
    event.preventDefault();

    history.back();
});
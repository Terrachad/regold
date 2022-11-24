const date = new Date();

let day = date.getDate();
let month = date.getMonth() + 1;
let year = date.getFullYear();


// This arrangement can be altered based on how we want the date's format to appear.
let currentDate = `${year}-${month}-${day}`;
console.log(currentDate); 

document.addEventListener("DOMContentLoaded", function(){
    const datePicker = document.getElementById("data");
    datePicker.max = currentDate;
});





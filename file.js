//get form


const   form = document.getElementById("form"),
        btn = document.getElementById("submitBtn"),
        imgDiv = document.getElementById("imgDiv");




//on form submit
btn.addEventListener('click', (event)=>{
    //prevent redirect
    event.preventDefault();

    //get file
    let uplPdf = form.file.files[0];

    console.log(uplPdf);


    //check for file type
    if (uplPdf.type.substr(0,5) !== "pdf"){
        console.error("Only pdfs");
        return
    }

})

const uploadbutton = document.getElementById("upload");
let filediv = document.getElementById("files");
uploadbutton.style.color="red";
function show(){
    filediv.style.display="block"
}
uploadbutton.onclick=show;
alert("hello");
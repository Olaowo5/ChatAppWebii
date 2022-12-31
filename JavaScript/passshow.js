const pswdfield = document.querySelector("#passfield"),
pswdfieldii = document.querySelector("#passfieldii"),
togglebtn = document.querySelector("#togglei"),
togglebtnii =document.querySelector("#toggleii");


togglebtn.onclick = ()=>{
    if(pswdfield.type == "password")
    {
        pswdfield.type = "text";
        togglebtn.classList.add("active");
    }
    else
    {
        pswdfield.type= "password";
        togglebtn.classList.remove("active");
    }
}
if(togglebtnii != null)
{
togglebtnii.onclick = ()=>{
    if(pswdfieldii.type == "password")
    {
        pswdfieldii.type = "text";
        togglebtnii.classList.add("active");
    }
    else
    {
        pswdfieldii.type= "password";
        togglebtnii.classList.remove("active");
    }
}
}

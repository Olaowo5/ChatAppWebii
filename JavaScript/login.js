const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input");

const errorBox = document.querySelector(".error-txt");

//register elements
const 
UserEmail = document.querySelector("#EmailA"),
PassUser =document.querySelector("#passfield");


function clearAll()
{
   

    UserEmail.classList.remove("wronginput");
    PassUser.classList.remove("wronginput");
    errorBox.classList.remove("active");
}




function LogicEm()
{
    clearAll();
    //email check
    var em = UserEmail.value;

    if(em == null || em == "Email" || em == " "||em.length<=1)
    {
        UserEmail.classList.add("wronginput");
        errorBox.classList.add("active");

        errorBox.innerHTML = "All Input field are required!";

        return false;
    }

    var Pwd = PassUser.value;
   

    if(Pwd == null || Pwd.length<=1)
    {
        errorBox.classList.add("active");
        PassUser.classList.add("wronginput");
        errorBox.innerHTML = '&#10008;'+"Please enter Password";
        return false;
    }

   

   // console.log("Okay");
    OnLoginPhp();
    return false;
    
}


function OnLoginPhp()
{
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/login.php",true);
    //console.log("Login workiv");
    xhr.onload=()=>{
      //  console.log("Login work");
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
              //  data = ltrim(data);
                console.log("result " + data);
                if(data === "Database Connectedsuccess" || data === "success" || data == "success"){
                  //location.href="users.php";
                  location.href = "userpages.php";
                  console.log("success Log");
                }
                else if(data.includes("success"))
                {
                    location.href = "userpages.php";
                    console.log("success-Failure Log");
                }
                else{
                  //errorText.style.display = "block";
                 // errorText.textContent = data;
                 console.log("error Log " + data);
                 errorBox.classList.add("active");
                    errorBox.innerHTML = '&#10008;' + data;
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

form.onsubmit = (e)=>{
    //let start Ajax
    e.preventDefault(); //prevent form from submitting
}

continueBtn.onclick = () =>{

    LogicEm();

}

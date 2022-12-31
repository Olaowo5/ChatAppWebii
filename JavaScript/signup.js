const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input");

const errorBox = document.querySelector(".error-txt");

//register elements
const UserFname = document.querySelector("#FirstN"),
UseLname = document.querySelector("#LastN"),
UserEmail = document.querySelector("#EmailA"),
PassUser =document.querySelector("#passfield"),
PassUserii = document.querySelector("#passfieldii"),
UserPic = document.querySelector("#UserPic");


function clearAll()
{
    UserFname.classList.remove("wronginput");
    UseLname.classList.remove("wronginput");
    UserEmail.classList.remove("wronginput");
    PassUser.classList.remove("wronginput");
    PassUserii.classList.remove("wronginput");
    UserPic.classList.remove("wronginput");

    errorBox.classList.remove("active");
}


function ValidateEmail(val){
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(val.match(mailformat))
	{
		//alert("This is not a valid email address");
		return true;
	}
    else
    return false;
}

function checkPwd(str) {
    if (str.length < 5) {
        return("Password is too short");
    } else if (str.length > 50) {
        return("Password is too long");
    } else if (str.search(/\d/) == -1) {
        return("Password Must contain at least one Number");
    } else if (str.search(/[a-zA-Z]/) == -1) {
        return("Password must contain atleast one letter");
    
    } /*else if (str.search(/[A-Z]/) == -1) {
        return("Password must contain atleast one Uppercase");
    
    } */else if (str.search(/[a-z]/) == -1) {
        return("Password must contain atleast one Lowercase");
    
    }// else if (str.search(/[\!\@\#\$\%\^\&\*\(\)\_\+]/) == -1) {
     //   return("Password must contain atleast one special character");
    //}
    return("ok");
}


function Registerem()
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
    else if(!ValidateEmail(em))
    {
        UserEmail.classList.add("wronginput");
        errorBox.classList.add("active");
        errorBox.innerHTML = "Email is not valid";

        return false;
    }


   

    var Pwd = PassUser.value;
    var Pwdii =  PassUserii.value;

    if(Pwd == null || Pwd.length<=1)
    {
        errorBox.classList.add("active");
        PassUser.classList.add("wronginput");
        errorBox.innerHTML = '&#10008;'+"Password should be atleast 6 Characters: ";
        return false;
    }

    if(Pwdii == null || Pwdii.length<=1)
    {
        errorBox.classList.add("active");
        PassUser.classList.add("wronginput");
        PassUserii.classList.add("wronginput");
        errorBox.innerHTML = '&#10008;'+"Passwords do not match"
       return false;
    }

    if(Pwd != Pwdii)
    {
        //error No match

            errorBox.classList.add("active");
            PassUser.classList.add("wronginput");
            PassUserii.classList.add("wronginput");
            errorBox.innerHTML = '&#10008;'+"Passwords do not match"
        return false;   
    }


    var ResultPas = checkPwd(Pwd);

    if(ResultPas != "ok")
    {
        //error

   // console.log("Password failed "+ ResultPas);
   // PassDoc.classList.add("wronginput");
   errorBox.classList.add("active");
    PassUser.classList.add("wronginput");
        PassUserii.classList.add("wronginput");
        errorBox.innerHTML = '&#10008;'+ " " + ResultPas;

    return false;
    }

    var FName = UserFname.value;
    var LName = UseLname.value;
    var ImgName = UserPic.value;


    if(FName == null || FName.length<=1 || FName == " ")
    {
        UserFname.classList.add("wronginput");
        errorBox.classList.add("active");
        errorBox.innerHTML = "Enter FirstName";
        return false;
    }

    if(LName == null || LName.length<=1 || LName == " ")
    {
        UseLname.classList.add("wronginput");
        errorBox.classList.add("active");
        errorBox.innerHTML = "Enter LastName";
        return false;
    }

    if(ImgName == null )
    {
        UserPic.classList.add("wronginput");
        errorBox.classList.add("active");
        errorBox.innerHTML = "Please Select file to Upload";
        return false;
    }


    console.log("Okay");
    OnRegisterPhp();
    return false;
    
}


function OnRegisterPhp()
{
    console.log("Register workii");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/signup.php",false);
    console.log("Register workiv");
    xhr.onload=()=>{
        console.log("Register work");
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === "Database Connectedsuccess" || data === "success"){
                  //location.href="users.php";
                  location.href = "userpages.php";
                  console.log("success Log");

                } else if(data.includes("success"))
                {
                    location.href = "userpages.php";
                    console.log("success-Failure Log");
                }else{
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

    Registerem();

}

const searhbar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list");

searchBtn.onclick = () =>{
    searhbar.classList.toggle("show");
    searhbar.focus();
    searchBtn.classList.toggle("active");
    searhbar.value = "";
}
searhbar.onkeyup = ()=>{
    let searchTerm = searhbar.value;

    if(searchTerm != "")
    {
        searhbar.classList.add("show");

    }
    else{
        searhbar.classList.remove("show");
    }


    if(searchTerm != "")
    {
       

        let xhr = new XMLHttpRequest();
    xhr.open("POST","php/search.php",true);
   // console.log("Login workiv");
    xhr.onload=()=>{
     //   console.log("Login work");
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                usersList.innerHTML = data;
              // console.log(data);
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);

    }

}

setInterval(() => {
    
    let xhr = new XMLHttpRequest();
    xhr.open("GET","php/users.php",true);
   // console.log("Login workiv");
    xhr.onload=()=>{
     //   console.log("Login work");
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;

                if(!searhbar.classList.contains("show"))
                {  //need to make sure this doesnt interrupt the search bar
                    usersList.innerHTML = data;}
              // console.log(data);
            }
        }
    }
    xhr.send();

}, 500); //this function will run frequently after 500ms to keep track of chnages


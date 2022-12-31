const form = document.querySelector(".typing-area"),
inputfield = form.querySelector(".input-field"),
sendBtn = form.querySelector("#sndBtn"),
chatbox = document.querySelector(".chat-box");


form.onsubmit = (e)=>{
    //let start Ajax
    e.preventDefault(); //prevent form from submitting
}
sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){

            //console.log("why? " + inputfield.value);
              inputfield.value = "";
             // scrollToBottom();
             let data = xhr.response;
            // console.log("Why??" + data);
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
  chatbox.onmouseenter = ()=>{
    chatbox.classList.add("active");
        }

        chatbox.onmouseleave = ()=>{
            chatbox.classList.remove("active");
                }

setInterval(() => {
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/get-chat.php",true);
   // console.log("Login workiv");
    xhr.onload=()=>{
     //   console.log("Login work");
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;

               // if(!searhbar.classList.contains("show"))
                {  //need to make sure this doesnt interrupt the search bar
                    chatbox.innerHTML = data;
                    if(!chatbox.classList.contains("active"))
                        scrollToBottom();
                }
              // console.log(data);
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
   // xhr.send();

}, 500); //this function will run frequently after 500ms to keep track of chnages

function scrollToBottom(){
    chatbox.scrollTop = chatbox.scrollHeight;
  }
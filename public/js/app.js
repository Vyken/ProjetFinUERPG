


import { EnnemiCard } from "./ennemicard.js"

var dRowEnnemiCard=document.querySelector("#ennemi")


fetch("http://127.0.0.1:8000/api/ennemis")
    .then(response => response.json())
    //.then(response2 => console.log(response2['hydra:member']))
    .then(fCard)
   

function fCard(data){
    console.log(data['hydra:member'])
    var ennemis=data['hydra:member'] 
    var x
    for(x of ennemis){

      EnnemiCard(x)      

    }
 

}



import { EnnemiCard } from "./ennemicard.js"
import { SpellCard } from "./spellcard.js"
import { PersoCard } from "./persocard.js"

var dRowEnnemiCard=document.querySelector("#ennemi")
var dRowSpellCard=document.querySelector("#spell")
var dRowPersoCard=document.querySelector("#perso")

fetch("http://127.0.0.1:8000/api/ennemis")
    .then(response => response.json())
    //.then(response2 => console.log(response2['hydra:member']))
    .then(fCardEnnemi)
   
fetch("http://127.0.0.1:8000/api/spells")
.then(response => response.json())
//.then(response2 => console.log(response2['hydra:member']))
.then(fCardSpell)

fetch("http://127.0.0.1:8000/api/personnages")
.then(response => response.json())
//.then(response2 => console.log(response2['hydra:member']))
.then(fCardPerso)


function fCardEnnemi(data){
    console.log(data['hydra:member'])
    var ennemis=data['hydra:member'] 
    var x
    for(x of ennemis){

      EnnemiCard(x)      

    }
}

function fCardSpell(data){
    console.log(data['hydra:member'])
    var spells=data['hydra:member'] 
    var x
    for(x of spells){

      SpellCard(x)      

    }
}

function fCardPerso(data){
    console.log(data['hydra:member'])
    var perso=data['hydra:member']['0']
    PersoCard(perso)
  
}
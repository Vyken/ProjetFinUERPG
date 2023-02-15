export function PersoCard(x) {
    var dRowPersoCard=document.querySelector("#perso")
    let codepersocard = 
        `<div class="card border-primary mb-3" style="max-width: 15rem; margin-top:30px"; text-align:right>
        <div class="card-header" style="text-align:center; font-weight:bold"> ${x.name} </div>
        <div class="card-body">
          <h4 class="card-title"> Attaque : ${x.atk}</h4>
          <h4 class="card-title"> Vie : ${x.Health}</h4>
          <h4 class="card-title"> Mana :  ${x.mana}</h4>
          <p class="card-text"> C'est votre personnage actuel </p>
        </div>
        `
        dRowPersoCard.innerHTML= dRowPersoCard.innerHTML + codepersocard;
}
export function EnnemiCard(x) {
    var dRowEnnemiCard=document.querySelector("#ennemi")
    let codeennemicard = 
        `<div class="card border-primary mb-3" style="max-width: 20rem; margin-top:30px">
        <div class="card-header" style="text-align:center; font-weight:bold"> ${x.name} </div>
        <div class="card-body">
          <h4 class="card-title"> Attaque : ${x.atk}</h4>
          <h4 class="card-title"> Vie : ${x.health}</h4>
          <h4 class="card-title"> Mana :  ${x.mana}</h4>
          <p class="card-text"> Vous rencontrerez certainement cet ennemi au cours de votre aventure </p>
        </div>
        `
        dRowEnnemiCard.innerHTML= dRowEnnemiCard.innerHTML + codeennemicard;
}
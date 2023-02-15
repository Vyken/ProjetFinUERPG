export function SpellCard(x) {
  var dRowSpellCard=document.querySelector("#spell")
    let codeSpellcard = 
        `<div class="card border-primary mb-3" style="max-width: 20rem; margin-top:30px">
        <div class="card-header" style="text-align:center; font-weight:bold" >${x.name}</div>
        <div class="card-body">
          <h4 class="card-title"> Coût en mana : ${x.cost}</h4> 
          <p class="card-text"> ${x.effect} </p>
        </div>
        `
        dRowSpellCard.innerHTML= dRowSpellCard.innerHTML + codeSpellcard;
}
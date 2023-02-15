export function EnnemiCard(x) {
    var dRowEnnemiCard=document.querySelector("#ennemi")
    let codeennemicard = 
        `<div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header">${x.name}</div>
        <div class="card-body">
          <h4 class="card-title">${x.atk}</h4>
          <h4 class="card-title">${x.health}</h4>
          <h4 class="card-title">${x.mana}</h4>
          <p class="card-text" id="mod1">Some quick example </p>
        </div>
        `
        dRowEnnemiCard.innerHTML= dRowEnnemiCard.innerHTML + codeennemicard;
}
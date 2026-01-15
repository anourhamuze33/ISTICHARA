

let selectedAvocat = document.getElementById('Avocat');
let selectedHuissier = document.getElementById('Huissier');

let infos = document.querySelector(".type");
selectedAvocat.addEventListener("click", (e)=>{
    selected = "avocat";
    infos.innerHTML ="";
    infos.innerHTML = `
          <div class="form-group">
                <label for="specialite">SPÉCIALITÉ</label>
                <input type="text" id="specialite" name="specialite" placeholder="Ex: droit civil, droit pénal" required>
            </div>


            <div class="form-group">
                <label>CONSULTATION EN LIGNE</label>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" id="consult_yes" name="consult_en_ligne" value="yes">
                        <label for="consult_yes">Oui</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="consult_no" name="consult_en_ligne" value="no">
                        <label for="consult_no">Non</label>
                    </div>
                </div>
            </div>
    
    `

})
selectedHuissier.addEventListener("click", (e)=>{
     selected = "huissier";
         infos.innerHTML ="";
         infos.innerHTML = `
            <div class="form-group">
                <label for="type_actes">Type d'actes</label>
                <input type="text" id="type_actes" name="type_actes" placeholder="Ex: signification exécution constats" required>
            </div>
         `
});
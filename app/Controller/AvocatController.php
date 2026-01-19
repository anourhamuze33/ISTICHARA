<?php
require_once "../app/Helper/Database.php";
require_once "../src/Views/AvocatAffichage.php";
?>
<script>
    const input = document.getElementById('recherche');
    const container = document.getElementById('container');

    input.addEventListener("input", async (e) => {
        let inp = input.value;
        const fichier = `avocat/filter?name=${inp}`
        Response = await fetch(fichier).then(data => data.json()).then(data => {            
            container.innerHTML = "";
                if(data[0].full_name == ''){
                                container.innerHTML = `
                <div class="no-results">
                    <p>Aucun avocat trouvé</p>
                </div>
                `
            }
            data.forEach(info => {
                console.log(info);
                
                card = document.createElement('div');
                card.classList.add("card");
                card.innerHTML = `
                        <div class="card-header">
                            <div>
                                <div class="card-title">${info.full_name}</div>
                                <div class="card-email">${info.email}</div>
                            </div>
                        </div>

                        <div class="specialite-box">
                        ${info.specialite}
                        </div>

                        <div class="card-info">
                            <div class="info-row">
                                <span class="info-label">Âge</span>
                                <span class="info-value">${info.age} ans</span>
                            </div>

                            <div class="info-row">
                                <span class="info-label">Sexe</span>
                                <span class="badge badge-${info.sexe}">
                                   ${info.sexe}
                                </span>
                            </div>

                            <div class="info-row">
                                <span class="info-label">Expérience</span>
                                <span class="info-value">${info.annes_experience} ans</span>
                            </div>

                            <div class="info-row">
                                <span class="info-label">Consultation en ligne</span>
                                <span class="badge badge-${info.consult_en_ligne}">
                                    ${info.consult_en_ligne}
                                </span>
                            </div>

                            <div class="info-row">
                                <span class="info-label">Ville</span>
                                <span class="info-value">${info.ville}</span>
                            </div>
                        </div>

                        <div class="card-actions">
                            <a href="avocat/edit?id=${info.id}" class="btn-action btn-edit">Modifier</a>
                            <form method="POST" action="delete.php" style="flex: 1;">
                                <input type="hidden" name="id" value="${info.id}">
                                <button type="submit" class="btn-action btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avocat?')">Supprimer</button>
                            </form>
                        </div>
            `
            
            container.appendChild(card);
            })

        });

    });



    const select = document.getElementById('select');
    select.addEventListener("change", async (e) => {
        let inp = select.value;
        const fichier = `avocat/filter?ville_id=${inp}`
        Response = await fetch(fichier).then(data => data.json()).then(data => {            
            container.innerHTML = "";
                if(data[0].full_name == ''){
                container.innerHTML = `
                <div class="no-results">
                    <p>Aucun avocat trouvé</p>
                </div>
                `
            }
            data.forEach(info => {
                console.log(info);
                
                card = document.createElement('div');
                card.classList.add("card");
                card.innerHTML = `
                        <div class="card-header">
                            <div>
                                <div class="card-title">${info.full_name}</div>
                                <div class="card-email">${info.email}</div>
                            </div>
                        </div>

                        <div class="specialite-box">
                        ${info.specialite}
                        </div>

                        <div class="card-info">
                            <div class="info-row">
                                <span class="info-label">Âge</span>
                                <span class="info-value">${info.age} ans</span>
                            </div>

                            <div class="info-row">
                                <span class="info-label">Sexe</span>
                                <span class="badge badge-${info.sexe}">
                                   ${info.sexe}
                                </span>
                            </div>

                            <div class="info-row">
                                <span class="info-label">Expérience</span>
                                <span class="info-value">${info.annes_experience} ans</span>
                            </div>

                            <div class="info-row">
                                <span class="info-label">Consultation en ligne</span>
                                <span class="badge badge-${info.consult_en_ligne}">
                                    ${info.consult_en_ligne}
                                </span>
                            </div>

                            <div class="info-row">
                                <span class="info-label">Ville</span>
                                <span class="info-value">${info.ville}</span>
                            </div>
                        </div>

                        <div class="card-actions">
                            <a href="avocat/edit?id=${info.id}" class="btn-action btn-edit">Modifier</a>
                            <form method="POST" action="delete.php" style="flex: 1;">
                                <input type="hidden" name="id" value="${info.id}">
                                <button type="submit" class="btn-action btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avocat?')">Supprimer</button>
                            </form>
                        </div>
            `
            
            container.appendChild(card);
            })

        });

    });
</script>
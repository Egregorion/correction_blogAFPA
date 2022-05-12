$(document).ready(function() {
    $('#commentSubmit').submit(function(event){
        //on prévient l'envoi du formulaire 
        event.preventDefault();
        //on récupère les valeurs des champs
        let pseudoValue = $('#pseudo').val();
        let commentValue = $('#comment').val();
        let articleId = $('#article_id').val();
        let count = parseInt($('#badge').text());
        const date = "just now"
        //on lance l'appel Ajax qui insère en bdd
        $.post('traitement.php', {
            pseudo:pseudoValue,
            comment:commentValue,
            article:articleId
            }, function(data){  
        })
        //affiche en javascript le commentaire
        $('#comments').append(`
            <div class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">`+pseudoValue+`</h5>
                <small>`+ date +`</small>
            </div>
            <p class="mb-1">`+commentValue+`</p>
        </div>`
        )
        //on met à jour le compteur
        count ++;
        $('#badge').text(count);
        //on vide les champs du formulaire
        $('#pseudo').val("");
        $('#comment').val("");
    })
})

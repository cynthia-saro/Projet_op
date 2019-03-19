$('.categories_animaux').on('click',function(){
    let id_categorie=$(this).attr('data-id-categorie');
    location.href="liste_animaux.php?idCategorie="+id_categorie;
});

$('#liste_animaux .animaux').on('click',function(){
    let id_animal=$(this).first().attr('data-id-animal');
    location.href="detail_animal.php?idAnimal="+id_animal;
});

$('body').on('mouseover','.cadre_like',function(){
   $(this).children().last().css('font-size','1.2em');
});

$('body').on('mouseout','.cadre_like',function(){
    $(this).children().last().css('font-size','1em');
});

$('body').on('click','.cadre_like',function(){
    let _this=$(this);
    let id_comment=$(this).attr('data-id-commentaire');
    let user_like=$(this).attr('data-like');
    let total_like=$(this).attr('data-total-like');
    total_like=parseInt(total_like);
    //l'utilisateur aime déjà le like, il reclique pour supprimer son like
    if(user_like=='true'){
        total_like--;
        $.ajax({
            url: 'php/supprimer_like.php',
            method: 'POST',
            data: {
                'idComment': id_comment,
            },
            success: function (data) {
                _this.replaceWith(
                    '<div data-id-commentaire="'+id_comment+'" data-like="false" data-total-like='+total_like+' class="cadre_like">'+
                    '<div class="icon_like"><img src="images/like_icon.png"></div>'+
                    '<div class="like">J\'aime ('+total_like+')</div>'+
                    '</div>'
                );
            },
            error:function(data){
            }
        });
    }else {
        //l'utilisateur like, ajout du like
        total_like++;
        $.ajax({
            url: 'php/ajouter_like.php',
            method: 'POST',
            data: {
                'idComment': id_comment,
            },
            success: function (data) {
                _this.replaceWith(
                    '<div data-id-commentaire="'+id_comment+'" data-like="true" data-total-like='+total_like+' class="cadre_like cadre_liked">'+
                    '<div class="icon_like"><img src="images/like_icon.png"></div>'+
                    '<div class="like"><b>J\'aime</b> ('+total_like+')</div>'+
                    '</div>'
                );
            },
            error:function(data){
            }
        });
    }
});
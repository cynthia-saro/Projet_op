$('.categories_animaux').on('click',function(){
    let id_categorie=$(this).attr('data-id-categorie');
    location.href="liste_animaux.php?idCategorie="+id_categorie;
});

$('#liste_animaux .animaux').on('click',function(){
    let id_animal=$(this).first().attr('data-id-animal');
    location.href="detail_animal.php?idAnimal="+id_animal;
});

$('body').on('mouseover','.cadre_like,.cadre_like_photo_animal',function(){
   $(this).children().last().css('font-size','1.2em');
});

$('body').on('mouseout','.cadre_like,.cadre_like_photo_animal',function(){
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

$('body').on('click','.image_animal_post',function(){
    let _this=$(this);
    let id_photo=$(this).attr('data-id');
    let id_animal=$('main').attr('data-id-animal');
    $.ajax({
        url: 'php/ouvrir_image_animal.php',
        method: 'POST',
        async: false,
        data: {
            'id_photo': id_photo,
        },
        success: function (data) {
            var detail_animal=[];
            var commentaires=[];
            $.getJSON('php/detail_photo_animal.json',function(data) {
                //photo + nb_likes
                $.each(data,function(index,d) {
                    detail_animal.push( {photo: d.photo, nb_likes: d.nb_likes,like: d.like} );
                });

                $.getJSON('php/commentaires_photo_animal.json',function(data) {
                    //photo + nb_likes
                    $.each(data,function(index,d) {
                        commentaires.push( {idUser: d.idUser, image_profil: d.image_profil, content:d.content} );
                    });

                    let structure_image_detail='<div id="structure_image_detail">' +
                        '<div id="cadre_bloc_haut">'+
                        '<div id="cadre_image_animal"><img src="images/animaux/'+id_animal+'_'+detail_animal[0]['photo']+'"></div>'+
                        '<div id="cadre_page_detail" data-like="'+detail_animal[0]['like']+'" data-total-like="'+detail_animal[0]['nb_likes']+'" class="cadre_like_photo_animal">'+
                        '<div class="icon_like"><img src="images/like_icon.png"></div>'+
                        '<div class="like_photo_animal">J\'aime ('+detail_animal[0]['nb_likes']+')</div>'+
                        '</div>'+
                        '<div id="croix_structure"><i id="croix_image" class="fas fa-times"></i></div>'+
                        '</div>'+
                        '<div data-id-photo="'+id_photo+'" id="form_detail_animal">' +
                        '<div id="cadre_form">'+
                        '<textarea placeholder="Ajouter un commentaire ..." required></textarea>' +
                        '<button>Envoyer</button>'+
                        '</div>'+
                        '</div>'+
                        '<div id="zone_commentaires">' +
                        '</div>'
                        '</div>';
                    _this.after(structure_image_detail);

                    for(var i=0;i<commentaires.length;i++){
                        $('#zone_commentaires').append(
                            '<div class="zone_commentaire">'+
                            '<div onclick="location.href=\'profil.php?id='+commentaires[i]['idUser']+'\'" class="cadre_photo_profil_commentaire">'+
                            '<img src="images/utilisateurs/'+commentaires[i]['image_profil']+'">'+
                            '</div>'+
                            '<div class="content_commentaire">'+
                            commentaires[i]['content']+
                            '</div>'+
                            '</div>'
                        );
                    }

                    if(detail_animal[0]['like']===true){
                        $('#cadre_page_detail').addClass('cadre_liked');
                    }

                    let cadre_bloc_haut=$('#cadre_bloc_haut');
                    cadre_bloc_haut.css('background-color','grey');
                    cadre_bloc_haut.css('padding','20px 0');

                    let zone_commentaires=$('#zone_commentaires');
                    zone_commentaires.css('width','80%');
                    zone_commentaires.css('margin','0 auto');

                    let zone_commentaire=$('.zone_commentaire');
                    zone_commentaire.css('display','flex');
                    zone_commentaire.css('border','2px solid #028090');
                    zone_commentaire.css('margin-bottom','5px');
                    zone_commentaire.css('padding','3px');
                    zone_commentaire.css('border-radius','15px');

                    let content_commentaire=$('.content_commentaire');
                    content_commentaire.css('margin','auto 0 auto 20px');

                    structure_image_detail=$('#structure_image_detail');
                    structure_image_detail.css('position','fixed');
                    structure_image_detail.css('width','80vw');
                    structure_image_detail.css('height','80vh');
                    structure_image_detail.css('top','10vh');
                    structure_image_detail.css('left','10vw');
                    structure_image_detail.css('background-color','white');
                    structure_image_detail.css('z-index','1000');
                    structure_image_detail.css('border-radius','15px');
                    structure_image_detail.css('overflow','auto');
                    structure_image_detail.css('max-width','100%');

                    let croix=$('#croix_structure');
                    croix.css('position','fixed');
                    croix.css('width','12vw');
                    croix.css('top','12vh');
                    croix.css('right','10px');

                    let croix_image=$('#croix_image');
                    croix_image.css('object-fit','cover');
                    croix_image.css('width','200%');

                    let cadre_image_animal=$('#cadre_image_animal');
                    cadre_image_animal.css('width','30%');
                    cadre_image_animal.css('margin','0 auto');

                    let image_animal=$('#cadre_image_animal img');
                    image_animal.css('object-fit','contain');
                    image_animal.css('border-radius','5px');
                    image_animal.css('border','3px solid #028090');

                    let form_detail_animal=$('#form_detail_animal');
                    form_detail_animal.css('padding-top','20px');
                    form_detail_animal.css('display','flex');
                    form_detail_animal.css('border-top','2px solid black');
                    form_detail_animal.css('width','100%');

                    let textarea=$('#form_detail_animal textarea');
                    textarea.css('margin-right','10px');

                    let cadre_form=$('#cadre_form');
                    cadre_form.css('width','70%');
                    cadre_form.css('margin','0 auto');

                    let cadre_page_detail=$('#cadre_page_detail');
                    cadre_page_detail.css('margin','15px auto 0 auto');
                });
            });

        },
        error:function(data){

        }
    });
});

$('body').on('click','#croix_structure',function() {
    $('#structure_image_detail').fadeOut('slow', function(){ $('#structure_image_detail').remove();});
});

$('body').on('click','#form_detail_animal button',function(){
    let textarea=$('#form_detail_animal textarea').val();
    let id_photo=$("#form_detail_animal").attr('data-id-photo');
    let id_user=$('#photo_profil').attr('data-id');
    let image_profil=$('#photo_profil img').attr('src');
    if(textarea!=""){
        $.ajax({
            url: 'php/ajouter_commentaire_photo.php',
            method: 'POST',
            async: false,
            data: {
                'id_photo': id_photo,
                'content':textarea
            },
            success: function (data) {
                $('#form_detail_animal textarea').val('');
                //fadeIn prepend
                $('#zone_commentaires').prepend(
                    '<div class="zone_commentaire">'+
                    '<div onclick="location.href=\'profil.php?id='+id_user+'\'" class="cadre_photo_profil_commentaire">'+
                    '<img src="'+image_profil+'">'+
                    '</div>'+
                    '<div>'+
                    textarea+
                    '</div>'+
                    '</div>'
                );
                $("#zone_commentaires .zone_commentaire:first-child").hide();
                $("#zone_commentaires .zone_commentaire:first-child").fadeIn("slow");
            }
        });
    }
});

$(document).click(function() {
    $('#structure_image_detail').fadeOut('slow', function(){ $('#structure_image_detail').remove();});
});

$("body").on('click',"#structure_image_detail",function(event) {
    event.stopPropagation();
});

$('body').on('click','.cadre_like_photo_animal',function(){
    let _this=$(this);
    let id_photo=$("#form_detail_animal").attr('data-id-photo');
    let user_like=$(this).attr('data-like');
    let total_like=$(this).attr('data-total-like');
    total_like=parseInt(total_like);
    //l'utilisateur aime déjà le like, il reclique pour supprimer son like
    if(user_like==='true'){
        total_like--;
        $.ajax({
            url: 'php/supprimer_like_photo.php',
            method: 'POST',
            data: {
                'idPhoto': id_photo,
            },
            success: function (data) {
                _this.replaceWith(
                    '<div id="cadre_page_detail" data-total-like="'+total_like+'" data-like="false" class="cadre_like_photo_animal">'+
                    '<div class="icon_like"><img src="images/like_icon.png"></div>'+
                    '<div class="like_photo_animal">J\'aime ('+total_like+')</div>'+
                    '</div>'
                );
                let cadre_page_detail=$('#cadre_page_detail');
                cadre_page_detail.css('margin','15px auto 0 auto');
            },
            error:function(data){
            }
        });
    }else {
        //l'utilisateur like, ajout du like
        total_like++;
        $.ajax({
            url: 'php/ajouter_like_photo.php',
            method: 'POST',
            data: {
                'idPhoto': id_photo,
            },
            success: function (data) {
                _this.replaceWith(
                    '<div id="cadre_page_detail" data-total-like="'+total_like+'" data-like="true" class="cadre_like_photo_animal cadre_liked">'+
                    '<div class="icon_like"><img src="images/like_icon.png"></div>'+
                    '<div class="like_photo_animal">J\'aime ('+total_like+')</div>'+
                    '</div>'
                );
                let cadre_page_detail=$('#cadre_page_detail');
                cadre_page_detail.css('margin','15px auto 0 auto');
            },
            error:function(data){
            }
        });
    }
});

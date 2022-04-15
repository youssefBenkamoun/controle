$(document).ready(function () {
    var id = $('#id');
    var cin = $("#cin");
    var nom = $("#nom");
    var prenom = $("#prenom");
    var email = $("#email");
    var telephone = $("#telephone");
    var recrutement = $("#recrutement");
    var naissance = $("#naissance");
    var n_drp = $("#n_drp");
    var directeur = $("#directeur");
    var specialite = $("#specialite");
    var password = $("#password");
    var photo = $("#photo");
    var structure = $('#structure');
    var pedagogique = $('#pedagogique');
    var administratif = $('#administratif');
    var scientifique = $('#scientifique');
    var ensa = $('#ensa');
    var point = $('#point');
    //alert(ensa.val());

    photo.change(function () {
        if (photo[0].validity.valid == true) {
            $(".custom-file-label").eq(0).text(photo[0].files[0].name);
        } else {
            $(".custom-file-label").eq(0).text('Choose file...');
        }
    });
    pedagogique.change(function () {
        if (pedagogique[0].validity.valid == true) {
            $(".custom-file-label").eq(1).text(pedagogique[0].files[0].name);
        } else {
            $(".custom-file-label").eq(1).text('Choose file...');
        }
    });
    administratif.change(function () {
        if (administratif[0].validity.valid == true) {
            $(".custom-file-label").eq(2).text(administratif[0].files[0].name);
        } else {
            $(".custom-file-label").eq(2).text('Choose file...');
        }
    });
    scientifique.change(function () {
        if (scientifique[0].validity.valid == true) {
            $(".custom-file-label").eq(3).text(scientifique[0].files[0].name);
        } else {
            $(".custom-file-label").eq(3).text('Choose file...');
        }
    });
    $.ajax({
        url: 'controller/gestionDepartement.php',
        data: {op: 'attente'},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            console.log(data);
            remplir(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
    $.ajax({
        url: 'controller/GestionFonction.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisi une specialite</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].id + '">' + data[i].nom + '</option>';
            }
            specialite.html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
    /*$.ajax({
        url: 'controller/GestionDepartement.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisi un departement</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].id + '">' + data[i].libelle + '</option>';
            }
            departement.html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });*/

    $('#btn').click(function () {
        if ($('#btn').text() == 'Ajouter') {
            //console.log(photo[0]);
            //console.log(photo[0].files[0]);
            var fd = new FormData();
            fd.append('file', pedagogique[0].files[0]);
            fd.append('cin', $('#id').val());
            $.ajax({
                    url: 'controller/charge.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);   
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            var fb = new FormData();
            fb.append('file', administratif[0].files[0]);
            fb.append('cin', $('#id').val());
            $.ajax({
                    url: 'controller/charge.php',
                    type: 'post',
                    data: fb,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);   
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            var fs = new FormData();
            fs.append('file', scientifique[0].files[0]);
            fs.append('cin', $('#id').val());
            $.ajax({
                    url: 'controller/charge.php',
                    type: 'post',
                    data: fs,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);   
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            if (photo[0].files.length != 0) {
                var fd = new FormData();
                fd.append('file', photo[0].files[0]);
                fd.append('cin', $('#cin').val());
                $.ajax({
                    url: 'controller/upload.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);
                        if (data != 0) {
                            addEmploye(data);
                        } else {
                            addEmploye('no-photo.png');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                        addEmploye('no-photo.png');
                    }
                });
            } else {
                addEmploye('no-photo.png');
            }
            
            function addEmploye(pic) {
                /*if($("#fonction").val()==='Choisi une fonction' || $("#fonction").val()===null){alert("Choisi une fonction");}
                else{*/
                $.ajax({
                    url: 'controller/gestionDepartement.php',
                    data: {op: 'add', nom: nom.val(), cin: cin.val(), prenom: prenom.val(), email: email.val(), telephone: telephone.val(), n_drp: n_drp.val(), prof_a_ensa:ensa.val(), point:point.val(),structure:structure.val()
                        , date_recrutement: recrutement.val(), date_naissance: naissance.val(), directeur: directeur.val(), specialite: specialite.val(), password:password.val(), administratif:administratif.val().split('\\').pop(), pedagogique:pedagogique.val().split('\\').pop(), scientifique:scientifique.val().split('\\').pop(), photo: pic},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);
                        remplir(data);
                        cin.val('');
                        nom.val('');
                        prenom.val('');
                        email.val('');
                        telephone.val('');
                        n_drp.val('');
                        naissance.val('');
                        recrutement.val('');
                        password.val('');
                        directeur.val('');
                        specialite.val('');
                        photo.val('');
                        $(".custom-file-label").eq(0).text('Choose file...');

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            }
        }
   

    });

    $(document).on('click', '.supprimer', function () {
        var _id = $(this).closest('tr').find('th').eq(0).text();
        $.ajax({
            url: 'controller/gestionDepartement.php',
            data: {op: 'refuser', id: _id},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                remplir(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
        
    });

    $(document).on('click', '.modifier', function () {
        var _id = $(this).closest('tr').find('th').eq(0).text();
        $.ajax({
            url: 'controller/gestionDepartement.php',
            data: {op: 'accepter', id: _id},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                remplir(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
        
    });
    
    function remplir(data) {
        var contenu = $('#table-content');
        var ligne = "";
        //alert(data);
        for (i = 0; i < data.length; i++) {
            //if(data[i].attente!=)
// <img class="img-thumbnail img-fluid position-absolute float-left" src="img\\' + data[i].photo + '" style="width:300px;height: 300px;object-fit: cover;">
            ligne += '<tr><td><img src="img\\' + data[i].photo + '" alt="Photo"></td>';
            ligne += '<th scope="row">' + data[i].id + '</th>';
            ligne += '<th scope="row">' + data[i].cin + '</th>';
            ligne += '<td>' + data[i].nom + '</td>';
            ligne += '<td>' + data[i].prenom + '</td>';
            ligne += '<td>' + data[i].n_drp + '</td>';
            ligne += '<td>' + data[i].structure + '</td>';
            ligne += '<td><a href="./user.php?id='+data[i].cin+'"><button type="button" class="btn btn-outline-primary ajouter">Plus</button></a></td>';
            ligne += '<td><button type="button" class="btn btn-outline-danger supprimer">refuser</button></td>';
            ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">accepter</button></td></tr>';

        }
        contenu.html(ligne);
    }
    
});




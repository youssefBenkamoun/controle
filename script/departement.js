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
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            console.log(data);
            remplir(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
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
            data: {op: 'delete', id: _id},
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
        var btn = $('#btn');
        var _photo = $(this).closest('tr').find('td').eq(0).find('img').attr('src').split('\\').pop();
        var _id = $(this).closest('tr').find('th').eq(0).text();
        var _cin = $(this).closest('tr').find('th').eq(1).text();
        var _nom = $(this).closest('tr').find('td').eq(1).text();
        var _prenom = $(this).closest('tr').find('td').eq(2).text();
        var _n_drp = $(this).closest('tr').find('td').eq(6).text();
        var _telephone = $(this).closest('tr').find('td').eq(4).text();
        var _email = $(this).closest('tr').find('td').eq(5).text();
        var _naissance = $(this).closest('tr').find('td').eq(3).text();
        var _recrutement = $(this).closest('tr').find('td').eq(8).text();
        var _specialite = $(this).closest('tr').find('td').eq(7).attr('value');
        var _structure = $(this).closest('tr').find('td').eq(9).text();
        var _directeur = $(this).closest('tr').find('td').eq(10).text();
        var _pedagogique = $(this).closest('tr').find('td').eq(11).text().split('\\').pop();
        var _administratif = $(this).closest('tr').find('td').eq(12).text().split('\\').pop();
        var _scientifique = $(this).closest('tr').find('td').eq(13).text().split('\\').pop();
        var _ensa = $(this).closest('tr').find('td').eq(14).attr('value');
        var _password = $(this).closest('tr').find('td').eq(15).text();
        btn.text('Modifier');
        $(".custom-file-label").eq(0).text(_photo);
        /*pedagogique.val(_pedagogique);
        administratif.val(_administratif);
        scientifique.val(_scientifique);*/
        pedagogique.val('');
        id.val(_id);
        cin.val(_cin);
        nom.val(_nom);
        prenom.val(_prenom);
        email.val(_email);
        telephone.val(_telephone);
        n_drp.val(_n_drp);
        naissance.val(_naissance);
        //console.log(_recrutement);
        recrutement.val(_recrutement);
        specialite.val(_specialite);
        structure.val(_structure);
        directeur.val(_directeur);
        password.val(_password);
        $(".custom-file-label").eq(1).text(_pedagogique);
        $(".custom-file-label").eq(2).text(_administratif);
        $(".custom-file-label").eq(3).text(_scientifique);
        // ensa.val(_ensa);
        

        btn.click(function () {
            if ($('#btn').text() == 'Modifier') {
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
                                updateEmploye(data);
                            } else {
                                updateEmploye(_photo);
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log("data");
                            updateEmploye(_photo);
                        }
                    });
                } else {
                    updateEmploye(_photo);
                }
                function updateEmploye(pic) {
                    $.ajax({
                        url: 'controller/gestionDepartement.php',
                        data: {op: 'update',id:id.val() ,nom: nom.val(), cin: cin.val(), prenom: prenom.val(), email: email.val(), telephone: telephone.val(), n_drp: n_drp.val(), prof_a_ensa:ensa.val(), point:point.val(),structure:structure.val()
                        , date_recrutement: recrutement.val(), date_naissance: naissance.val(), directeur: directeur.val(),password:password.val(), specialite: specialite.val(), administratif:administratif.val().split('\\').pop(), pedagogique:pedagogique.val().split('\\').pop(), scientifique:scientifique.val().split('\\').pop(), photo: pic},
                        type: 'POST',
                        success: function (data, textStatus, jqXHR) {
                            remplir(data);
                            cin.val('');
                            nom.val('');
                            prenom.val('');
                            email.val('');
                            telephone.val('');
                            n_drp.val('');
                            naissance.val('');
                            recrutement.val('');
                            directeur.val('');
                            password.val('');
                            structure.val('');
                            specialite.val('');
                            photo.val('');
                            $(".custom-file-label").eq(1).text('Choose file...');
                            $(".custom-file-label").eq(2).text('Choose file...');
                            $(".custom-file-label").eq(3).text('Choose file...');
                            administratif.val('');
                            scientifique.val('');
                            $(".custom-file-label").eq(0).text('Choose file...');
                            btn.text('Ajouter');
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus);
                        }
                    });
                }
            }
        });
    });
    function upload() {
        if (photo.length != 0) {
            var fd = new FormData();
            fd.append('file', photo.files[0]);
            fd.append('cin', $('#cin').val());
            $.ajax({
                url: 'controller/upload.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response != 0) {
                        console.log(response);// Display image element
                    } else {
                        console.log('file not uploaded');
                    }
                },
            });
        }
    }
    function zip(donne){
        
        if (donne[0].files != 0) {
            var fd = new FormData();
            fd.append('file', donne[0].files[0]);
            fd.append('cin', $('#cin').val());
            $.ajax({
                url: 'controller/download.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    if (data != 0) {
                        return data;
                    } else {
                        return "none";
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log("data");
                    return "none";
                }
            });
        } else {
            return "none";
        }
    }
    function remplir(data) {
        var contenu = $('#table-content');
        var ligne = "";
        //alert(data);
        for (i = 0; i < data.length; i++) {
// <img class="img-thumbnail img-fluid position-absolute float-left" src="img\\' + data[i].photo + '" style="width:300px;height: 300px;object-fit: cover;">
            ligne += '<tr><td><img src="img\\' + data[i].photo + '" alt="Photo"></td>';
            ligne += '<th scope="row">' + data[i].id + '</th>';
            ligne += '<th scope="row">' + data[i].cin + '</th>';
            ligne += '<td>' + data[i].nom + '</td>';
            ligne += '<td>' + data[i].prenom + '</td>';
            ligne += '<td>' + data[i].date_naissance + '</td>';
            ligne += '<td>' + data[i].telephone + '</td>';
            ligne += '<td>' + data[i].email + '</td>';
            ligne += '<td>' + data[i].n_drp + '</td>';
            ligne += '<td value="' + data[i].specialite + '">' + data[i].nomf + '</td>';
            ligne += '<td >' + data[i].date_recrutement + '</td>';
            ligne += '<td>' + data[i].structure + '</td>';
            ligne += '<td>' + data[i].directeur + '</td>';
            ligne += '<td><a href="controller/download.php?id='+data[i].id+'" >'+data[i].dossier_pedagogique+'</a></td>';
            ligne += '<td><a href="controller/administratif.php?id='+data[i].id+'" >'+data[i].dossier_administratif+'</a></td>';
            ligne += '<td><a href="controller/scientifique.php?id='+data[i].id+'" >'+data[i].dossier_scientifique+'</a></td>';
            ligne += '<td>' + data[i].prof_a_ensa + '</td>';
            ligne += '<td>' + data[i].password + '</td>';
            ligne += '<td><button type="button" class="btn btn-outline-danger supprimer">Supprimer</button></td>';
            ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td>';
            ligne += '<td><a href="./user.php?id='+data[i].cin+'"><button type="button" class="btn btn-outline-primary ajouter">Plus</button></a></td></tr>';

        }
        contenu.html(ligne);
    }
    
});




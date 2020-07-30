<!doctype html>
<html lang="ro">

<head>

    <style>
        .card-class {
            border-radius: 1rem;
            background-color: rgba(255, 255, 255, .9);
        }

        .msg-card-body-class {
            overflow-x: hidden;
        }

        .user-img-class {
            height: 50px;
            width: 50px;
            border: 2px solid #bbb;
        }

        .type-msg-class {
            background-color: rgba(0, 0, 0, .1);
            border: 0;
            color: #888;
            height: 60px;
            overflow-y: auto
        }

        .type-msg-class:focus {
            background-color: rgba(0, 0, 0, .2);
            color: #333;
            font-weight: 500;
            box-shadow: none;
            outline: 0
        }

        .send-btn-class {
            border-top-right-radius: 4px !important;
            border-bottom-right-radius: 4px !important;
            background-color: rgba(0, 0, 0, .3);
            color: #fff;
            cursor: pointer
        }

        .msg-cotainer-class {
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 10px;
            min-width: 5rem;
            border-radius: 10px;
            background-color: #fff;
            padding: 10px;
            padding-top: 3px;
            position: relative;
            font-size: 0.9rem;
            font-weight: 400;
            -webkit-box-shadow: 0px 0px 29px -15px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 29px -15px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 29px -15px rgba(0, 0, 0, 0.75);
            text-align: left;
        }

        .msg-cotainer-send-class {
            margin-top: auto;
            margin-bottom: auto;
            margin-right: 10px;
            min-width: 5rem;
            border-radius: 10px;
            background-color: #dcf8c6;
            padding: 10px;
            padding-bottom: 12px;
            position: relative;
            font-size: 0.9rem;
            font-weight: 400;
            -webkit-box-shadow: 0px 0px 29px -15px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 29px -15px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 29px -15px rgba(0, 0, 0, 0.75);
            text-align: left;

        }

        .msg-time-send-class {
            position: absolute;
            left: 0;
            bottom: -1px;
            left: 15px;
            color: #555;
            font-size: 9px
        }

        .msg-time-class {
            position: absolute;
            right: 0;
            bottom: -1px;
            right: 15px;
            color: #555;
            font-size: 9px
        }

        .msg-name-class {
            position: inherit;
            display: table-row-group;
            left: 0;
            top: 0;
            left: 15px;
            color: #0bb;
            font-size: 11px
        }

        .msg-head {
            position: relative
        }

        .action-menu {
            z-index: 1;
            position: absolute;
            padding: 15px 0;
            background-color: rgba(0, 0, 0, .5);
            color: #fff;
            border-radius: 15px;
            top: 30px;
            right: 15px;
            display: none
        }

        .action-menu ul {
            list-style: none;
            padding: 0;
            margin: 0
        }
    </style>

</head>

<body>
    <div class="h-100 w-100 chat">
        <div class="card card-class h-100">
            <div class="card-header msg-head">
                <div class="d-flex bd-highlight">
                    <div class="img-cont">
                        <img src="/assets/img/class-ico.png" class="rounded-circle user-img-class">
                    </div>
                    <div class="user-info w-100  d-flex justify-content-center">
                        <select class="form-control col-trans" id="field-select-class" required>
                            <option value="" selected="selected">--Selectează--</option>
                            <?php foreach ($aniLitera as $anlit) { ?>
                                <option value="<?php echo $anlit['idClasa']; ?>"><?php echo $anlit['denumire']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body msg-card-body-class">

            </div>
            <div class="card-footer">
                <div class="input-group">
                    <textarea id="mesaj" class="form-control type-msg-class" placeholder="Scrie ceva..."></textarea>
                    <div class="input-group-append">
                        <button class="input-group-text send-btn-class" id="btnGoClass"><i class="fa fa-paper-plane-o p-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var numarMesaje = 0;
        var idClasa = 0;

        function validareLipsaValoare(field) {
            $(field).removeClass('is-valid is-invalid');
            let val = $(field).val();

            if (val === '') {

                $(field).addClass('is-invalid');

                return false;
            }

            $(field).addClass('is-valid');

            return true;
        }

        $("#field-select-class").change(function(e) {
            validareLipsaValoare("#field-select-class");
            idClasa = $("#field-select-class").val();
            $(".msg-card-body-class").empty();
            numarMesaje = 0;
        });

        setInterval(function() {

            $.post("<?php echo BASE_URL; ?>/elev?action=updateMessages", {
                clasa: idClasa
            }, function(response) {
                //salvarea numarului de mesaje actual
                var len = response.length;
                //daca au fost adaugate mesaje noi
                if (len > numarMesaje && idClasa!=0 && idClasa!='') {
                    $(".msg-card-body-class").empty();
                    for (var i = 0; i < len; i++) {
                        //daca mesajul este al utlizatorului curent se stabilesc culoarea si pozitia
                        if (response[i].email === "<?php echo $_SESSION["user"]; ?>") {
                            $msgInsert = `<div class="d-flex justify-content-end mb-4">
            <div class="msg-cotainer-send-class px-3">` +
                                response[i].mesaj + `<span class="msg-time-send-class">` + response[i].ora_mesaj + `, ` +
                                response[i].data_mesaj + `</span>
            </div>
            <img src="/assets/img/user-white.png" class="rounded-circle user-img-msg">
        </div>`;

                        } else {
                            $msgInsert = `<div class="d-flex justify-content-start mb-4">
            <img src="/assets/img/user.png" class="rounded-circle user-img-msg">
            <div class="msg-cotainer-class px-3">
            <span class="msg-name-class">` + response[i].nume + `</span>` +
                                response[i].mesaj + `<span class="msg-time-class">` + response[i].ora_mesaj + `, ` +
                                response[i].data_mesaj + `</span>
            </div>
        </div>`;

                        }
                        $(".msg-card-body-class").append($msgInsert);
                    }
                    numarMesaje = len;
                    $(".msg-card-body-class").animate({
                        scrollTop: $(".msg-card-body-class")[0].scrollHeight
                    }, 700);
                }
                

            });
        }, 1000);

        $("#btnGoClass").click(function(e) {
            e.preventDefault();

            //golire input 
            let mesaj = $("#mesaj").val();
            $("#mesaj").val('');

            //efecet scroll
            $(".msg-card-body").animate({
                scrollTop: $(".msg-card-body")[0].scrollHeight
            }, 700);

            //data si ora mesajului
            function addZero(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }

            let date = new Date();
            let time = addZero(date.getHours()) + ":" + addZero(date.getMinutes());
            let dataMesaj = addZero(date.getDate()) + "/" + addZero(date.getMonth() + 1);

            if (mesaj.length > 0) {
                $.post("/elev?action=sendMessage", {
                    mesaj: mesaj,
                    data: dataMesaj,
                    ora: time,
                    clasa: idClasa
                }, function(response) {

                    //inserare in chat
                    let insertMsg = ` <div class="d-flex justify-content-end mb-4">
                    <div class="msg-cotainer-send-class px-3">` + mesaj +
                        `<span class="msg-time-send-class">` + time + ", " + dataMesaj + `</span>
                    </div>
                    <img src="/assets/img/user-white.png" class="rounded-circle user-img-msg">
                </div>`;

                    $(".msg-card-body-class").append(insertMsg);
                });
            }
            $(".msg-card-body-class").animate({
                scrollTop: $(".msg-card-body-class")[0].scrollHeight
            }, 700);

        });
    </script>

</body>

</html>
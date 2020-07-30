<script>
    let msgWidth = $(".msg-card-body").width();
    let msgMaxWidth = msgWidth * 0.8;

    function addZero(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    let date = new Date();
    var time = addZero(date.getHours()) + ":" + addZero(date.getMinutes());
    var dataMesaj = addZero(date.getDate()) + "/" + addZero(date.getMonth() + 1)

    let response = `<div class="d-flex justify-content-start mb-4">
                        <img src="/assets/img/bot.gif" class="rounded-circle user-img-msg">
                        <div class="msg-container px-3">` + "Salut! Întrebă-mă ceva!" +
                        `<span class="msg-time">` + time + ", " + dataMesaj + `</span>
                        </div>
                    </div>`;

    $(".msg-card-body").append(response);

    $("#btnGo").click(function(e) {
        e.preventDefault();

        let intrebare = $("#intrebare").val();
        $("#intrebare").val('');




        let insert = `<div class="d-flex justify-content-end mb-4">
        <div class="msg-container-send px-3">` + intrebare +
            `<span class="msg-time-send">` + time + ", " + dataMesaj + `</span>
        </div>
        <img src="/assets/img/user.png" class="rounded-circle user-img-msg">`;

        $(".msg-card-body").append(insert);
        $(".msg-container").css("maxWidth", msgMaxWidth);
        $(".msg-container-send").css("maxWidth", msgMaxWidth);

        $(".msg-card-body").animate({
            scrollTop: $(".msg-card-body")[0].scrollHeight
        }, 700);

        $.post("apps/school/api-chatbot.php", {
            ask: intrebare
        }, function(data) {

            let response = `<div class="d-flex justify-content-start mb-4">
                <img src="/assets/img/bot.gif" class="rounded-circle user-img-msg">
                    <div class="msg-container px-3">` + data +
                `<span class="msg-time">` + time + ", " + dataMesaj + `</span>
                    </div>
                        </div>`;

            $(".msg-card-body").append(response);
            $(".msg-container").css("maxWidth", msgMaxWidth);
            $(".msg-container-send").css("maxWidth", msgMaxWidth);

            $(".msg-card-body").animate({
                scrollTop: $(".msg-card-body")[0].scrollHeight
            }, 700);
        });
    });
</script>
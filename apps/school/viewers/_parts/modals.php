<div id="modalSuccess" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header horizontal-centered">
                <div class="icon-box">
                    <i class="fa fa-check-circle"></i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>Super!</h4>
                <p>Contul tău a fost creeat cu succes.</p>
                <a href="" id="btn-portal">
                    <div class="btn btn-success" data-dismiss="modal"><span>Deschide portal</span></div>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="modal-add-intent" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Învață-l ceva nou pe Robo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-intent" action="<?php echo BASE_URL; ?>/profesor" method="post">
                    <div class="row pad-lr-1">
                        <div class="col-md-6 pad-2">
                            <div class="form-group text-left" id="tag-select">
                                <label class="control-label" for="field-add-tag">Tag:</label>
                                <select class="form-control" id="field-add-tag" name="field-add-tag" required>
                                    <option value="">--Selectează--</option>
                                    <?php if ($intentsTags) :
                                        foreach ($intentsTags as $intent) : ?>
                                            <option value="<?php echo $intent['tag'] ?>"><?php echo $intent['tag'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group text-left" id="tag-nou">
                                <div class="form-group text-left">
                                    <label for="field-add-tag-nou">Tag nou:</label>
                                    <input type="text" id="field-add-tag-nou" name="field-add-tag-nou" class="form-control" placeholder="Tag nou" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2 d-flex align-items-end justify-content-center">
                            <div class="form-group text-left w-100">
                                <a class="btn btn-success m-0 w-100 text-light" id="btn-intent-nou"><i class="fa fa-plus"></i>
                                    <span class="m-0 p-0" id="text-btn-intent">Adaugă un tag nou</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="row pad-lr-1">
                        <div class="col-md-6 pad-2">
                            <div class="form-group text-left">
                                <div class="form-group text-left">
                                    <label for="field-add-intrebare">Întrebare:</label>
                                    <input type="text" id="field-add-intrebare" name="field-add-intrebare" class="form-control" placeholder="Întrebare" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group text-left">
                                <div class="form-group text-left">
                                    <label for="field-add-raspuns">Răspuns:</label>
                                    <input type="text" id="field-add-raspuns" name="field-add-raspuns" class="form-control" placeholder="Răspuns" required>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                <button type="submit" id="btn-add-intent" class="btn btn-success">Salvează</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

<script>
    var visibleTagNou = false;
    $("#tag-nou").hide();

    $("#btn-intent-nou").click(function(e) {
        e.preventDefault();

        if (visibleTagNou === false) {
            $("#tag-select").hide();
            $(this).css("background-color", "#777");
            $(this).css("border", "1px solid #777");
            $("#text-btn-intent").text("Selecteză din listă")
            $("#tag-nou").show();
            visibleTagNou = true;
        } else {
            $("#tag-select").show();
            $(this).css("background-color", "#28a745");
            $(this).css("border", "1px solid #28a745");
            $("#text-btn-intent").text("Adaugă un tag nou")
            $("#tag-nou").hide();
            visibleTagNou = false;
        }

    });

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

    //adaugare profesor
    $("#btn-add-intent").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldAddTag = visibleTagNou ? $("#field-add-tag-nou").val() : $("#field-add-tag").val();
        let fieldAddIntrebare = $("#field-add-intrebare").val();
        let fieldAddRaspuns = $("#field-add-raspuns").val();

        // validari input
        var errDetected = false;

        if (validareLipsaValoare("#field-add-tag") == false && visibleTagNou == false)
            errDetected = true;
        if (validareLipsaValoare("#field-add-tag-nou") == false && visibleTagNou == true)
            errDetected = true;
        if (validareLipsaValoare("#field-add-intrebare") == false)
            errDetected = true;
        if (validareLipsaValoare("#field-add-raspuns") == false)
            errDetected = true;



        if (errDetected == false) {

            // trimitem date catre db
            $.post("<?php echo BASE_URL; ?>/data?action=addIntent", {
                tag: fieldAddTag,
                exista: !visibleTagNou,
                intrebare: fieldAddIntrebare,
                raspuns: fieldAddRaspuns
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-add-intent").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("Robo a învățat ceva nou!");

                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
            
        }

    });
</script>
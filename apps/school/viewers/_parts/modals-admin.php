<div id="modal-add-prof" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Adaugă un profesor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-prof" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="row">
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label for="field-add-nume-1">*Nume:</label>
                                <input type="text" id="field-add-nume-1" name="field-add-nume-1" class="form-control" placeholder="Nume" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group ">
                                <label for="field-add-email-1">*Adresa de e-mail:</label>
                                <input type="email" id="field-add-email-1" name="field-add-email-1" class="form-control" placeholder="E-mail" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group ">
                                <label for="field-add-parola-1">*Parolă:</label>
                                <input type="password" id="field-add-parola-1" name="field-add-parola-1" class="form-control" placeholder="Minim 8 caractere (A-Z, a-z, 0-9)" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group ">
                                <label for="field-add-parola-rep-1">*Repetare parolă:</label>
                                <input type="password" id="field-add-parola-rep-1" name="field-add-parola-rep-1" class="form-control" placeholder="Minim 8 caractere (A-Z, a-z, 0-9)" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group ">
                                <label for="field-add-telefon-1">Telefon:</label>
                                <input type="number" id="field-add-telefon-1" name="field-add-telefon-1" class="form-control" placeholder="Număr de telefon">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                        <button type="submit" id="btn-add-prof" class="btn btn-success">Adaugă</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-edit-prof" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-pencil"></i> Editează datele unui profesor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-prof" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="row">
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label class="control-label" for="field-edit-profesor-1">*Profesor:</label>
                                <select class="form-control" id="field-edit-profesor-1" name="field-edit-profesor-1" required>
                                    <option value="">--Selectează--</option>
                                    <?php if ($profesori) :
                                        foreach ($profesori as $profesor) : ?>
                                            <option value="<?php echo $profesor['idUser'] ?>"><?php echo $profesor['nume'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label for="field-edit-nume-1">Nume:</label>
                                <input type="text" id="field-edit-nume-1" name="field-edit-nume-1" class="form-control" placeholder="Nume" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group ">
                                <label for="field-edit-email-1">Adresa de e-mail:</label>
                                <input type="email" id="field-edit-email-1" name="field-edit-email-1" class="form-control" placeholder="E-mail" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group ">
                                <label for="field-edit-parola-1">Parolă:</label>
                                <input type="password" id="field-edit-parola-1" name="field-edit-parola-1" class="form-control" placeholder="Parola contului" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group ">
                                <label for="field-edit-telefon-1">Telefon:</label>
                                <input type="number" id="field-edit-telefon-1" name="field-edit-telefon-1" class="form-control" placeholder="Număr de telefon">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                        <button type="submit" id="btn-edit-prof" class="btn btn-success">Salvează</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-delete-prof" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-trash"></i> Elimină datele unui profesor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-delete-prof" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="pad-lr-2">
                        <div class="alert alert-warning" role="alert">
                            Ștergerea contului profesorului va duce la eliminarea activităților sale!
                        </div>
                    </div>

                    <div class="col-md-6 pad-2">
                        <div class="form-group">
                            <label class="control-label" for="field-delete-profesor-1">*Profesor:</label>
                            <select class="form-control" id="field-delete-profesor-1" name="field-delete-profesor-1" required>
                                <option value="">--Selectează--</option>
                                <?php if ($profesori) :
                                    foreach ($profesori as $profesor) : ?>
                                        <option value="<?php echo $profesor['idUser'] ?>"><?php echo $profesor['nume'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                        <button type="submit" id="btn-delete-profesor" class="btn btn-success">Șterge</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-add-elev" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Adaugă un elev</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-elev" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="row">
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label for="field-add-nume-2">*Nume:</label>
                                <input type="text" id="field-add-nume-2" name="field-add-nume-2" class="form-control" placeholder="Nume" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label for="field-add-email-2">*Adresa de e-mail:</label>
                                <input type="email" id="field-add-email-2" name="field-add-email-2" class="form-control" placeholder="E-mail" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label for="field-add-telefon-2">*Telefon:</label>
                                <input type="number" id="field-add-telefon-2" name="field-add-telefon-2" class="form-control" placeholder="Număr de telefon">
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label class="control-label" for="field-add-clasa-2">*Clasă:</label>
                                <select class="form-control text-center" id="field-add-clasa-2" name="field-add-clasa-2" required>
                                    <option value="" selected="selected">--Selectează--</option>
                                    <?php foreach ($aniLitera as $anlit) { ?>
                                        <option value="<?php echo $anlit['idClasa']; ?>"><?php echo $anlit['denumire']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group ">
                                <label for="field-add-parola-2">*Parolă:</label>
                                <input type="password" id="field-add-parola-2" name="field-add-parola-2" class="form-control" placeholder="Parola contului" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group ">
                                <label for="field-add-parola-rep-2">*Repetare parolă:</label>
                                <input type="password" id="field-add-parola-rep-2" name="field-add-parola-rep-2" class="form-control" placeholder="Repetare parolă" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                        <button type="submit" id="btn-add-elev" class="btn btn-success">Adaugă</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-edit-elev" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-pencil"></i> Editează datele unui elev</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-elev" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="row">
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label class="control-label" for="field-edit-clasa-2">*Clasă:</label>
                                <select class="form-control" id="field-edit-clasa-2" name="field-edit-clasa-2" required>
                                    <option value="" selected="selected">--Selectează--</option>
                                    <?php foreach ($aniLitera as $anlit) { ?>
                                        <option value="<?php echo $anlit['idClasa']; ?>"><?php echo $anlit['denumire']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label class="control-label" for="field-edit-elev-2">*Elev:</label>
                                <select class="form-control" id="field-edit-elev-2" name="field-edit-elev-2" required>
                                    <option value="">--Selectează--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label for="field-edit-nume-2">Nume:</label>
                                <input type="text" id="field-edit-nume-2" name="field-edit-nume-2" class="form-control" placeholder="Nume" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group ">
                                <label for="field-edit-email-2">Adresa de e-mail:</label>
                                <input type="email" id="field-edit-email-2" name="field-edit-email-2" class="form-control" placeholder="E-mail" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group ">
                                <label for="field-edit-telefon-2">Telefon:</label>
                                <input type="number" id="field-edit-telefon-2" name="field-edit-telefon-2" class="form-control" placeholder="Număr de telefon">
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group ">
                                <label for="field-edit-parola-2">Parolă:</label>
                                <input type="password" id="field-edit-parola-2" name="field-edit-parola-2" class="form-control" placeholder="Parola contului" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                        <button type="submit" id="btn-edit-elev" class="btn btn-success">Salvează</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-delete-elev" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-trash"></i> Elimină datele unui elev</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-delete-elev" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="pad-lr-2">
                        <div class="alert alert-warning" role="alert">
                            Ștergerea contului elevului va duce la eliminarea activităților sale!
                        </div>
                    </div>
                    <div class="row pad-lr-1">
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-delete-clasa-2">*Clasă:</label>
                                <select class="form-control" id="field-delete-clasa-2" name="field-delete-clasa-2" required>
                                    <option value="" selected="selected">--Selectează--</option>
                                    <?php foreach ($aniLitera as $anlit) { ?>
                                        <option value="<?php echo $anlit['idClasa']; ?>"><?php echo $anlit['denumire']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-delete-elev-2">*Elev:</label>
                                <select class="form-control" id="field-delete-elev-2" name="field-delete-elev-2" required>
                                    <option value="">--Selectează--</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                        <button type="submit" id="btn-delete-elev" class="btn btn-success">Șterge</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-add-parinte" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Adaugă un părinte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-parinte" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="row">
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label for="field-add-nume-3">*Nume:</label>
                                <input type="text" id="field-add-nume-3" name="field-add-nume-3" class="form-control" placeholder="Nume" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label for="field-add-email-3">*Adresa de e-mail:</label>
                                <input type="email" id="field-add-email-3" name="field-add-email-3" class="form-control" placeholder="E-mail" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group ">
                                <label for="field-add-parola-2">*Parolă:</label>
                                <input type="password" id="field-add-parola-3" name="field-add-parola-3" class="form-control" placeholder="Parola contului" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group ">
                                <label for="field-add-parola-rep-3">*Repetare parolă:</label>
                                <input type="password" id="field-add-parola-rep-3" name="field-add-parola-rep-3" class="form-control" placeholder="Repetare parolă" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label for="field-add-telefon-3">*Telefon:</label>
                                <input type="number" id="field-add-telefon-3" name="field-add-telefon-3" class="form-control" placeholder="Număr de telefon">
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label class="control-label" for="field-add-clasa-3">*Clasă elev:</label>
                                <select class="form-control" id="field-add-clasa-3" name="field-add-clasa-3" required>
                                    <option value="" selected="selected">--Selectează--</option>
                                    <?php foreach ($aniLitera as $anlit) { ?>
                                        <option value="<?php echo $anlit['idClasa']; ?>"><?php echo $anlit['denumire']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label class="control-label" for="field-add-elev-3">*Nume elev:</label>
                                <select class="form-control" id="field-add-elev-3" name="field-add-elev-3" required>
                                    <option value="">--Selectează--</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                        <button type="submit" id="btn-add-parinte" class="btn btn-success">Adaugă</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-edit-parinte" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-pencil"></i> Editează datele unui părinte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-parinte" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="row">
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label class="control-label" for="field-edit-clasa-3">*Clasa elevului:</label>
                                <select class="form-control" id="field-edit-clasa-3" name="field-edit-clasa-3" required>
                                    <option value="" selected="selected">--Selectează--</option>
                                    <?php foreach ($aniLitera as $anlit) { ?>
                                        <option value="<?php echo $anlit['idClasa']; ?>"><?php echo $anlit['denumire']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label class="control-label" for="field-edit-parinte-3">*Părinte:</label>
                                <select class="form-control" id="field-edit-parinte-3" name="field-parinte-elev-3" required>
                                    <option value="">--Selectează--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label for="field-edit-nume-3">Nume:</label>
                                <input type="text" id="field-edit-nume-3" name="field-edit-nume-3" class="form-control" placeholder="Nume" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group ">
                                <label for="field-edit-email-3">Adresa de e-mail:</label>
                                <input type="email" id="field-edit-email-3" name="field-edit-email-3" class="form-control" placeholder="E-mail" required>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group ">
                                <label for="field-edit-telefon-3">Telefon:</label>
                                <input type="number" id="field-edit-telefon-3" name="field-edit-telefon-3" class="form-control" placeholder="Număr de telefon">
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group ">
                                <label for="field-edit-parola-3">Parolă:</label>
                                <input type="password" id="field-edit-parola-3" name="field-edit-parola-3" class="form-control" placeholder="Parola contului" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                        <button type="submit" id="btn-edit-parinte" class="btn btn-success">Salvează</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-delete-parinte" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-trash"></i> Elimină datele unui părinte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-delete-parinte" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="row pad-lr-1">
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-delete-clasa-3">*Clasă:</label>
                                <select class="form-control" id="field-delete-clasa-3" name="field-delete-clasa-3" required>
                                    <option value="" selected="selected">--Selectează--</option>
                                    <?php foreach ($aniLitera as $anlit) { ?>
                                        <option value="<?php echo $anlit['idClasa']; ?>"><?php echo $anlit['denumire']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-delete-parinte-3">*Nume părinte:</label>
                                <select class="form-control" id="field-delete-parinte-3" name="field-delete-parinte-3" required>
                                    <option value="">--Selectează--</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                        <button type="submit" id="btn-delete-parinte" class="btn btn-success">Șterge</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-add-clasa" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Adaugă o clasă</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-clasa" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="row pad-lr-1">
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-add-an-4">*An:</label>
                                <select class="form-control text-center" id="field-add-an-4" name="field-add-an-4" size="5" required>
                                    <option value="" selected="selected">--Selectează--</option>
                                    <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-add-litera-4">*Literă:</label>
                                <select class="form-control text-center" id="field-add-litera-4" name="field-add-litera-4" size="5" required>
                                    <option value="" selected="selected">--Selectează--</option>
                                    <?php $litere = range('A', 'Z');
                                    foreach ($litere as $litera) { ?>
                                        <option value="<?php echo $litera; ?>"><?php echo $litera; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                        <button type="submit" id="btn-add-clasa" class="btn btn-success">Adaugă</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-edit-clasa" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-pencil"></i> Modifică datele unei clase</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-clasa" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="row pad-lr-1">
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label class="control-label" for="field-edit-an-4">*An:</label>
                                <select class="form-control text-center" id="field-edit-an-4" name="field-edit-an-4" size="3" required>
                                    <option value="" selected="selected">--Selectează--</option>
                                    <?php foreach ($ani as $an) { ?>
                                        <option value="<?php echo $an['an']; ?>"><?php echo $an['an']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-top-lr-2">
                            <div class="form-group">
                                <label class="control-label" for="field-edit-litera-4">*Literă:</label>
                                <select class="form-control text-center" id="field-edit-litera-4" name="field-edit-litera-4" size="3" required>
                                    <option value="" selected="selected">--Selectează--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-edit-an-nou-4">*An nou:</label>
                                <select class="form-control text-center" id="field-edit-an-nou-4" name="field-edit-an-nou-4" size="3" required>
                                    <option value="" selected="selected">--Selectează--</option>
                                    <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-edit-litera-noua-4">*Literă nouă:</label>
                                <select class="form-control text-center" id="field-edit-litera-noua-4" name="field-edit-noua-litera-4" size="3" required>
                                    <option value="" selected="selected">--Selectează--</option>
                                    <?php $litere = range('A', 'Z');
                                    foreach ($litere as $litera) { ?>
                                        <option value="<?php echo $litera; ?>"><?php echo $litera; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                <button type="submit" id="btn-edit-clasa" class="btn btn-success">Salvează</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-delete-clasa" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-trash"></i> Elimină datele unei clase</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-delete-clasa" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="pad-lr-2">
                        <div class="alert alert-warning" role="alert">
                            Ștergerea clasei va duce la eliminarea elevilor, părinților și a activităților asociate!
                        </div>
                    </div>
                    <div class="row pad-lr-1">
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-delete-an-4">*An:</label>
                                <select class="form-control text-center" id="field-delete-an-4" name="field-delete-an-4" size="3" required>
                                    <option value="" selected="selected">--Selectează--</option>
                                    <?php foreach ($ani as $an) { ?>
                                        <option value="<?php echo $an['an']; ?>"><?php echo $an['an']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-delete-litera-4">*Literă:</label>
                                <select class="form-control text-center" id="field-delete-litera-4" name="field-delete-litera-4" size="3" required>
                                    <option value="" selected="selected">--Selectează--</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                <button type="submit" id="btn-delete-clasa" class="btn btn-success">Șterge</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-add-materie" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Adaugă o materie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-materie" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="col-md-6 pad-2">
                        <div class="form-group">
                            <label for="field-add-materie-5">*Denumire:</label>
                            <input type="text" id="field-add-materie-5" name="field-add-materie-5" class="form-control" placeholder="Denumire" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                        <button type="submit" id="btn-add-materie" class="btn btn-success">Adaugă</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-edit-materie" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-pencil"></i> Modifică numele unei materii</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-materie" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="row pad-lr-1">
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-edit-materie-5">*Materie:</label>
                                <select class="form-control" id="field-edit-materie-5" name="field-edit-materie-5" required>
                                    <option value="">--Selectează--</option>
                                    <?php if ($materii) :
                                        foreach ($materii as $materie) : ?>
                                            <option value="<?php echo $materie['idMaterie'] ?>"><?php echo $materie['denumire'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label for="field-edit-materie-nou-5">*Denumire nouă:</label>
                                <input type="text" id="field-edit-materie-nou-5" name="field-edit-materie-nou-5" class="form-control" placeholder="Denumire" required>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                <button type="submit" id="btn-edit-materie" class="btn btn-success">Salvează</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-delete-materie" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-trash"></i> Elimină o materie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-delete-materie" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="pad-lr-2">
                        <div class="alert alert-warning" role="alert">
                            Ștergerea materiei va duce la eliminarea acesteia din orar și a asocierilor sale!
                        </div>
                    </div>
                    <div class="row pad-lr-1">
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-delete-materie-5">*Materie:</label>
                                <select class="form-control" id="field-delete-materie-5" name="field-delete-materie-5" required>
                                    <option value="">--Selectează--</option>
                                    <?php if ($materii) :
                                        foreach ($materii as $materie) : ?>
                                            <option value="<?php echo $materie['idMaterie'] ?>"><?php echo $materie['denumire'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                <button type="submit" id="btn-delete-materie" class="btn btn-success">Șterge</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-add-profmat" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Asociază unui profesor o materie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-profmat" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="row pad-lr-1">
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-add-profesor-6">*Profesor:</label>
                                <select class="form-control" id="field-add-profesor-6" name="field-add-profesor-6" required>
                                    <option value="">--Selectează--</option>
                                    <?php if ($profesori) :
                                        foreach ($profesori as $profesor) : ?>
                                            <option value="<?php echo $profesor['idUser'] ?>"><?php echo $profesor['nume'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-add-materie-6">*Materie:</label>
                                <select class="form-control" id="field-add-materie-6" name="field-add-materie-6" required>
                                    <option value="">--Selectează--</option>
                                    <?php if ($materii) :
                                        foreach ($materii as $materie) : ?>
                                            <option value="<?php echo $materie['idMaterie'] ?>"><?php echo $materie['denumire'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                        <button type="submit" id="btn-add-profmat" class="btn btn-success">Adaugă</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-delete-profmat" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-trash"></i> Elimină o materie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-delete-profmat" action="<?php echo BASE_URL; ?>/admin" method="post">
                    <div class="pad-lr-2">
                        <div class="alert alert-warning" role="alert">
                            Ștergerea asocierii va duce la ștergerea din orar a materiei predate de profesor!
                        </div>
                    </div>
                    <div class="row pad-lr-1">
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-delete-profesor-6">*Profesor:</label>
                                <select class="form-control" id="field-delete-profesor-6" name="field-delete-profesor-6" required>
                                    <option value="">--Selectează--</option>
                                    <?php if ($profesori) :
                                        foreach ($profesori as $profesor) : ?>
                                            <option value="<?php echo $profesor['idUser'] ?>"><?php echo $profesor['nume'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pad-2">
                            <div class="form-group">
                                <label class="control-label" for="field-delete-materie-6">*Materie:</label>
                                <select class="form-control" id="field-delete-materie-6" name="field-delete-materie-6" required>
                                    <option value="">--Selectează--</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                        <button type="submit" id="btn-delete-profmat" class="btn btn-success">Șterge</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

<script>
    function validareNume(field) {
        $(field).removeClass('is-valid is-invalid');
        let regex = /^[a-zA-Z\s-]*$/;
        let val = $(field).val().trim().replace(/\s\s+/g, ' ');

        if (val.length < 3 || regex.test(val) == false) {
            $(field).addClass('is-invalid');
            return false;
        }

        $(field).addClass('is-valid');

        return true;
    }

    function validareEmail(field) {
        $(field).removeClass('is-valid is-invalid');
        let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        let val = $(field).val().trim().replace(/\s\s+/g, ' ');

        if (val != '') {
            if (regex.test(val) == false) {

                $(field).addClass('is-invalid');

                return false;
            }

            $(field).addClass('is-valid');

            return true;
        }
        $(field).addClass('is-invalid');

        return false;
    }

    function validareTelefon(field) {
        $(field).removeClass('is-valid is-invalid');
        let regex = /^[0-9.\s+,-]{4,20}$/;
        let val = $(field).val();

        if (regex.test(val) == false) {

            $(field).addClass('is-invalid');

            return false;
        }

        $(field).addClass('is-valid');

        return true;
    }

    function validareParola(field) {
        $(field).removeClass('is-valid is-invalid');
        let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
        let val = $(field).val();

        if (regex.test(val) == false) {

            $(field).addClass('is-invalid');

            return false;
        }

        $(field).addClass('is-valid');

        return true;
    }

    function validareParolaRep(pas1, pas2) {
        $(pas2).removeClass('is-valid is-invalid');
        let pass1 = $(pas1).val();
        let pass2 = $(pas2).val();

        if (pass2 === '' || pass1 !== pass2) {

            $(pas2).addClass('is-invalid');

            return false;
        }

        $(pas2).addClass('is-valid');

        return true;
    }

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


    //validari adaugare date profesor
    $("#field-add-nume-1").change(function(e) {
        validareNume("#field-add-nume-1");
    });
    $("#field-add-email-1").change(function(e) {
        validareEmail("#field-add-email-1");
    });
    $("#field-add-telefon-1").change(function(e) {
        validareTelefon("#field-add-telefon-1");
    });
    $("#field-add-parola-1").change(function(e) {
        validareParola("#field-add-parola-1");
    });
    $("#field-add-parola-rep-1").change(function(e) {
        validareParolaRep("#field-add-parola-1", "#field-add-parola-rep-1");
    });

    //adaugare profesor
    $("#btn-add-prof").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldAddNume1 = $("#field-add-nume-1").val();
        let fieldAddEmail1 = $("#field-add-email-1").val();
        let fieldAddPhone1 = $("#field-add-telefon-1").val();
        let fieldAddPass1 = $("#field-add-parola-1").val();

        // validari input
        var errDetected = false;

        if (validareNume("#field-add-nume-1") == false)
            errDetected = true;

        if (validareEmail("#field-add-email-1") == false)
            errDetected = true;

        if (validareTelefon("#field-add-telefon-1") == false)
            errDetected = true;

        if (validareParola("#field-add-parola-1") == false)
            errDetected = true;

        if (validareParolaRep("#field-add-parola-1", "#field-add-parola-rep-1") == false)
            errDetected = true;


        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=addProf", {
                nume: fieldAddNume1,
                email: fieldAddEmail1,
                telefon: fieldAddPhone1,
                pass: fieldAddPass1
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-add-prof").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a adaugat cu succes profesorul introdus!");

                } else if (response.trim() == "Email existent!") {
                    alert("Exista deja un cont cu acest email!");
                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }

    });

    //selectare profesor pentru editare
    $('#field-edit-profesor-1').on('change', function() {
        if ($('#field-edit-profesor-1').val() === '') {
            $('#field-edit-nume-1').val('');
            $('#field-edit-email-1').val('');
            $('#field-edit-telefon-1').val('');
            $('#field-edit-parola-1').val('');
        }

        if ($('#field-edit-profesor-1').val() !== '') {
            let selected = $('#field-edit-profesor-1').val();
            let profesori = <?php echo json_encode($profesori) ?>;
            let profesor = profesori.find(x => x.idUser == selected);
            var idUser = profesor['idUser'];

            $('#field-edit-nume-1').val(profesor['nume']);
            $('#field-edit-email-1').val(profesor['email']);
            $('#field-edit-telefon-1').val(profesor['telefon']);


        }
    });

    //editare profesor
    $("#btn-edit-prof").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldEditNume1 = $("#field-edit-nume-1").val();
        let fieldEditEmail1 = $("#field-edit-email-1").val();
        let fieldEditPhone1 = $("#field-edit-telefon-1").val();
        let fieldEditPass1 = $("#field-edit-parola-1").val();

        let selected = $('#field-edit-profesor-1').val();
        let profesori = <?php echo json_encode($profesori) ?>;
        let profesor = profesori.find(x => x.idUser == selected);
        let idUser = profesor['idUser'];

        // validari input
        var errDetected = false;

        if (validareNume("#field-edit-nume-1") == false)
            errDetected = true;

        if (validareEmail("#field-edit-email-1") == false)
            errDetected = true;

        if (validareTelefon("#field-edit-telefon-1") == false)
            errDetected = true;

        if (fieldEditPass1 !== '') {
            if (validareParola("#field-edit-parola-1") == false)
                errDetected = true;
        }



        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=editProf", {
                idUser: idUser,
                nume: fieldEditNume1,
                email: fieldEditEmail1,
                telefon: fieldEditPhone1,
                pass: fieldEditPass1
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-edit-prof").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a modificat cu succes!");

                } else if (response.trim() == "Email existent!") {
                    alert("Exista deja un cont cu acest email!");
                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }

    });

    //validari stergere date profesor
    $("#field-delete-profesor-1").change(function(e) {
        validareLipsaValoare("#field-delete-profesor-1");
    });

    //sterge profesor
    $("#btn-delete-profesor").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldDeleteProfesor1 = $("#field-delete-profesor-1").val();

        // validari input
        var errDetected = false;

        if (validareLipsaValoare("#field-delete-profesor-1") == false)
            errDetected = true;

        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=deleteProfesor", {
                profesor: fieldDeleteProfesor1
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-delete-profesor").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a sters cu succes!");

                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }
    });

    //validari adaugare date elev
    $("#field-add-nume-2").change(function(e) {
        validareNume("#field-add-nume-2");
    });
    $("#field-add-email-2").change(function(e) {
        validareEmail("#field-add-email-2");
    });
    $("#field-add-telefon-2").change(function(e) {
        validareTelefon("#field-add-telefon-2");
    });
    $("#field-add-parola-2").change(function(e) {
        validareParola("#field-add-parola-2");
    });
    $("#field-add-parola-rep-2").change(function(e) {
        validareParolaRep("#field-add-parola-2", "#field-add-parola-rep-2");
    });
    $("#field-add-clasa-2").change(function(e) {
        validareLipsaValoare("#field-add-clasa-2");
    });

    //adaugare elev
    $("#btn-add-elev").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldAddNume2 = $("#field-add-nume-2").val();
        let fieldAddEmail2 = $("#field-add-email-2").val();
        let fieldAddPhone2 = $("#field-add-telefon-2").val();
        let fieldAddPass2 = $("#field-add-parola-2").val();
        let fieldAddClasa2 = $("#field-add-clasa-2").val();


        // validari input
        var errDetected = false;

        if (validareNume("#field-add-nume-2") == false)
            errDetected = true;

        if (validareEmail("#field-add-email-2") == false)
            errDetected = true;

        if (validareTelefon("#field-add-telefon-2") == false)
            errDetected = true;

        if (validareParola("#field-add-parola-2") == false)
            errDetected = true;

        if (validareParolaRep("#field-add-parola-2", "#field-add-parola-rep-2") == false)
            errDetected = true;

        if (validareLipsaValoare("#field-add-clasa-2") == false)
            errDetected = true;


        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=addElev", {
                nume: fieldAddNume2,
                email: fieldAddEmail2,
                telefon: fieldAddPhone2,
                pass: fieldAddPass2,
                clasa: fieldAddClasa2
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-add-elev").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a adaugat cu succes elevul introdus!");

                } else if (response.trim() == "Email existent!") {
                    alert("Exista deja un cont cu acest email!");
                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");
                }
            });
        }
    });

    //validari editare date elev
    $("#field-edit-nume-2").change(function(e) {
        validareNume("#field-edit-nume-2");
    });
    $("#field-edit-email-2").change(function(e) {
        validareEmail("#field-edit-email-2");
    });
    $("#field-edit-telefon-2").change(function(e) {
        validareTelefon("#field-edit-telefon-2");
    });
    $("#field-edit-parola-2").change(function(e) {
        validareParola("#field-edit-parola-2");
    });
    var elevi = [];
    $("#field-edit-clasa-2").change(function(e) {
        validareLipsaValoare("#field-edit-clasa-2");

        $('#field-edit-nume-2').val('');
        $('#field-edit-email-2').val('');
        $('#field-edit-telefon-2').val('');
        $('#field-edit-parola-2').val('');

        //golire lista elevi
        $('#field-edit-elev-2').empty();
        $('#field-edit-elev-2').append(`<option value="" selected="selected">--Selectează--</option>`);


        let clasaSelectata = $('#field-edit-clasa-2').val();

        $.post("<?php echo BASE_URL; ?>/data?action=getElevi", {
            clasaSelectata: clasaSelectata
        }, function(response) {
            $.each(response, function(key, valoare) {
                $('#field-edit-elev-2').append(`<option value="${valoare['idUser']}">${valoare['nume']} </option>`);
                elevi.push(valoare);
            });

        });
    });
    $("#field-edit-elev-2").change(function(e) {
        validareLipsaValoare("#field-edit-elev-2");
    });

    //selectare elev pentru editare
    $('#field-edit-elev-2').on('change', function() {
        if ($('#field-edit-elev-2').val() === '') {
            $('#field-edit-nume-2').val('');
            $('#field-edit-email-2').val('');
            $('#field-edit-telefon-2').val('');
            $('#field-edit-parola-2').val('');
        }

        if ($('#field-edit-elev-2').val() !== '') {
            let selected = $('#field-edit-elev-2').val();
            let elev = elevi.find(x => x.idUser == selected);
            var idElev = elev['idUser'];

            $('#field-edit-nume-2').val(elev['nume']);
            $('#field-edit-email-2').val(elev['email']);
            $('#field-edit-telefon-2').val(elev['telefon']);


        }
    });

    //editare elev
    $("#btn-edit-elev").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldEditNume2 = $("#field-edit-nume-2").val();
        let fieldEditEmail2 = $("#field-edit-email-2").val();
        let fieldEditPhone2 = $("#field-edit-telefon-2").val();
        let fieldEditPass2 = $("#field-edit-parola-2").val();

        let selected = $('#field-edit-elev-2').val();
        let elev = elevi.find(x => x.idUser == selected);
        let idElev = elev['idUser'];

        // validari input
        var errDetected = false;

        if (validareNume("#field-edit-nume-2") == false)
            errDetected = true;

        if (validareEmail("#field-edit-email-2") == false)
            errDetected = true;

        if (validareTelefon("#field-edit-telefon-2") == false)
            errDetected = true;

        if (fieldEditPass2 !== '') {
            if (validareParola("#field-edit-parola-2") == false)
                errDetected = true;
        }



        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=editElev", {
                idUser: idElev,
                nume: fieldEditNume2,
                email: fieldEditEmail2,
                telefon: fieldEditPhone2,
                pass: fieldEditPass2
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-edit-elev").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a modificat cu succes!");

                } else if (response.trim() == "Email existent!") {
                    alert("Exista deja un cont cu acest email!");
                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }

    });

    //validari stergere date elev
    $("#field-delete-clasa-2").change(function(e) {
        validareLipsaValoare("#field-delete-clasa-2");


        //golire lista litere
        $('#field-delete-elev-2').empty();
        $('#field-delete-elev-2').append(`<option value="" selected="selected">--Selectează--</option>`);


        let clasaSelectata = $('#field-delete-clasa-2').val();

        $.post("<?php echo BASE_URL; ?>/data?action=getElevi", {
            clasaSelectata: clasaSelectata
        }, function(response) {

            $.each(response, function(key, valoare) {
                $('#field-delete-elev-2').append(`<option value="${valoare['idUser']}">${valoare['nume']} </option>`);
            });

        });
    });
    $("#field-delete-elev-2").change(function(e) {
        validareLipsaValoare("#field-delete-elev-2");
    });

    //sterge elev
    $("#btn-delete-elev").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldDeleteElev2 = $("#field-delete-elev-2").val();

        // validari input
        var errDetected = false;

        if (validareLipsaValoare("#field-delete-clasa-2") == false)
            errDetected = true;
        if (validareLipsaValoare("#field-delete-elev-2") == false)
            errDetected = true;

        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=deleteElev", {
                elev: fieldDeleteElev2
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-delete-elev").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a sters cu succes!");

                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }
    });

    //validari adaugare date parinte
    $("#field-add-nume-3").change(function(e) {
        validareNume("#field-add-nume-3");
    });
    $("#field-add-email-3").change(function(e) {
        validareEmail("#field-add-email-3");
    });
    $("#field-add-telefon-3").change(function(e) {
        validareTelefon("#field-add-telefon-3");
    });
    $("#field-add-parola-3").change(function(e) {
        validareParola("#field-add-parola-3");
    });
    $("#field-add-parola-rep-3").change(function(e) {
        validareParolaRep("#field-add-parola-3", "#field-add-parola-rep-3");
    });
    $("#field-add-clasa-3").change(function(e) {
        validareLipsaValoare("#field-add-clasa-3");


        //golire lista litere
        $('#field-add-elev-3').empty();
        $('#field-add-elev-3').append(`<option value="" selected="selected">--Selectează--</option>`);


        let clasaSelectata = $('#field-add-clasa-3').val();

        $.post("<?php echo BASE_URL; ?>/data?action=getElevi", {
            clasaSelectata: clasaSelectata
        }, function(response) {

            $.each(response, function(key, valoare) {
                $('#field-add-elev-3').append(`<option value="${valoare['idUser']}">${valoare['nume']} </option>`);
            });

        });
    });
    $("#field-add-elev-3").change(function(e) {
        validareLipsaValoare("#field-add-elev-3");
    });

    //adaugare parinte
    $("#btn-add-parinte").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldAddNume3 = $("#field-add-nume-3").val();
        let fieldAddEmail3 = $("#field-add-email-3").val();
        let fieldAddPhone3 = $("#field-add-telefon-3").val();
        let fieldAddPass3 = $("#field-add-parola-3").val();
        let fieldAddClasa3 = $("#field-add-clasa-3").val();
        let fieldAddElev3 = $("#field-add-elev-3").val();


        // validari input
        var errDetected = false;

        if (validareNume("#field-add-nume-3") == false)
            errDetected = true;

        if (validareEmail("#field-add-email-3") == false)
            errDetected = true;

        if (validareTelefon("#field-add-telefon-3") == false)
            errDetected = true;

        if (validareParola("#field-add-parola-3") == false)
            errDetected = true;

        if (validareParolaRep("#field-add-parola-3", "#field-add-parola-rep-3") == false)
            errDetected = true;

        if (validareLipsaValoare("#field-add-clasa-3") == false)
            errDetected = true;

        if (validareLipsaValoare("#field-add-elev-3") == false)
            errDetected = true;


        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=addParinte", {
                nume: fieldAddNume3,
                email: fieldAddEmail3,
                telefon: fieldAddPhone3,
                pass: fieldAddPass3,
                clasa: fieldAddClasa3,
                idElev: fieldAddElev3
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-add-profesor").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a adaugat cu succes parintele introdus!");

                } else if (response.trim() == "Email existent!") {
                    alert("Exista deja un cont cu acest email!");
                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }

    });

    //validari editare date parinte
    $("#field-edit-nume-3").change(function(e) {
        validareNume("#field-edit-nume-3");
    });
    $("#field-edit-email-3").change(function(e) {
        validareEmail("#field-edit-email-3");
    });
    $("#field-edit-telefon-3").change(function(e) {
        validareTelefon("#field-edit-telefon-3");
    });
    $("#field-edit-parola-3").change(function(e) {
        validareParola("#field-edit-parola-3");
    });
    var parinti = [];
    $("#field-edit-clasa-3").change(function(e) {
        validareLipsaValoare("#field-edit-clasa-2");

        $('#field-edit-nume-3').val('');
        $('#field-edit-email-3').val('');
        $('#field-edit-telefon-3').val('');
        $('#field-edit-parola-3').val('');

        //golire lista elevi
        $('#field-edit-parinte-3').empty();
        $('#field-edit-parinte-3').append(`<option value="" selected="selected">--Selectează--</option>`);


        let clasaSelectata = $('#field-edit-clasa-3').val();

        $.post("<?php echo BASE_URL; ?>/data?action=getParinti", {
            clasaSelectata: clasaSelectata
        }, function(response) {
            $.each(response, function(key, valoare) {
                $('#field-edit-parinte-3').append(`<option value="${valoare['idUser']}">${valoare['nume']} </option>`);
                parinti.push(valoare);
            });

        });
    });
    $("#field-edit-parinte-3").change(function(e) {
        validareLipsaValoare("#field-edit-parinte-3");
    });

    //selectare parinte pentru editare
    $('#field-edit-parinte-3').on('change', function() {
        if ($('#field-edit-elev-3').val() === '') {
            $('#field-edit-nume-3').val('');
            $('#field-edit-email-3').val('');
            $('#field-edit-telefon-3').val('');
            $('#field-edit-parola-3').val('');
        }

        if ($('#field-edit-parinte-3').val() !== '') {
            let selected = $('#field-edit-parinte-3').val();
            let parinte = parinti.find(x => x.idUser == selected);

            $('#field-edit-nume-3').val(parinte['nume']);
            $('#field-edit-email-3').val(parinte['email']);
            $('#field-edit-telefon-3').val(parinte['telefon']);


        }
    });

    //editare parinte
    $("#btn-edit-parinte").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldEditNume3 = $("#field-edit-nume-3").val();
        let fieldEditEmail3 = $("#field-edit-email-3").val();
        let fieldEditPhone3 = $("#field-edit-telefon-3").val();
        let fieldEditPass3 = $("#field-edit-parola-3").val();

        let selected = $('#field-edit-parinte-3').val();
        let parinte = parinti.find(x => x.idUser == selected);
        var idParinte = parinte['idUser'];

        // validari input
        var errDetected = false;

        if (validareNume("#field-edit-nume-3") == false)
            errDetected = true;

        if (validareEmail("#field-edit-email-3") == false)
            errDetected = true;

        if (validareTelefon("#field-edit-telefon-3") == false)
            errDetected = true;

        if (fieldEditPass3 !== '') {
            if (validareParola("#field-edit-parola-3") == false)
                errDetected = true;
        }


        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=editParinte", {
                idUser: idParinte,
                nume: fieldEditNume3,
                email: fieldEditEmail3,
                telefon: fieldEditPhone3,
                pass: fieldEditPass3
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-edit-parinte").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a modificat cu succes!");

                } else if (response.trim() == "Email existent!") {
                    alert("Exista deja un cont cu acest email!");
                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }

    });

    //validari stergere date parinte
    $("#field-delete-clasa-3").change(function(e) {
        validareLipsaValoare("#field-delete-clasa-3");


        //golire lista parinti
        $('#field-delete-parinte-3').empty();
        $('#field-delete-parinte-3').append(`<option value="" selected="selected">--Selectează--</option>`);


        let clasaSelectata = $('#field-delete-clasa-3').val();

        $.post("<?php echo BASE_URL; ?>/data?action=getParinti", {
            clasaSelectata: clasaSelectata
        }, function(response) {

            $.each(response, function(key, valoare) {
                $('#field-delete-parinte-3').append(`<option value="${valoare['idUser']}">${valoare['nume']} </option>`);
            });

        });
    });
    $("#field-delete-parinte-3").change(function(e) {
        validareLipsaValoare("#field-delete-parinte-3");
    });

    //sterge parinte
    $("#btn-delete-parinte").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldDeleteParinte3 = $("#field-delete-parinte-3").val();

        // validari input
        var errDetected = false;

        if (validareLipsaValoare("#field-delete-clasa-3") == false)
            errDetected = true;
        if (validareLipsaValoare("#field-delete-parinte-3") == false)
            errDetected = true;

        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=deleteParinte", {
                parinte: fieldDeleteParinte3
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-delete-parinte").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a sters cu succes!");

                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }
    });

    //validare adaugare date clasa
    $("#field-add-an-4").change(function(e) {
        validareLipsaValoare("#field-add-an-4");
    });
    $("#field-add-litera-4").change(function(e) {
        validareLipsaValoare("#field-add-litera-4");
    });

    //adaugare clasa
    $("#btn-add-clasa").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldAddAn4 = $("#field-add-an-4").val();
        let fieldAddLitera4 = $("#field-add-litera-4").val();

        // validari input
        var errDetected = false;

        if (validareLipsaValoare("#field-add-an-4") == false)
            errDetected = true;

        if (validareLipsaValoare("#field-add-litera-4") == false)
            errDetected = true;


        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=addClasa", {
                an: fieldAddAn4,
                litera: fieldAddLitera4
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-add-clasa").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a adaugat cu succes clasa introdusă!");

                } else if (response.trim() == 'exista') {
                    alert("Clasa introdusă există deja!");
                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }
    });

    //setare vizibilitate edit clasa
    function literaVizibila(val) {
        if (val)
            $('#field-edit-litera-4').prop('disabled', false);
        else
            $('#field-edit-litera-4').prop('disabled', true);
    }

    function anNouVizibil(val) {
        if (val)
            $('#field-edit-an-nou-4').prop('disabled', false);
        else
            $('#field-edit-an-nou-4').prop('disabled', true);
    }

    function literaNouaVizibila(val) {
        if (val)
            $('#field-edit-litera-noua-4').prop('disabled', false);
        else
            $('#field-edit-litera-noua-4').prop('disabled', true);
    }

    literaVizibila(false);
    literaNouaVizibila(false);
    anNouVizibil(false);


    //validare stergere date clasa
    $("#field-delete-an-4").change(function(e) {
        validareLipsaValoare("#field-delete-an-4");

        //golire lista litere
        $('#field-delete-litera-4').empty();
        $('#field-delete-litera-4').append(`<option value="" selected="selected">--Selectează--</option>`);


        let anSelectat = $('#field-delete-an-4').val();

        $.post("<?php echo BASE_URL; ?>/data?action=getLitere", {
            anSelectat: anSelectat
        }, function(response) {

            $.each(response, function(key, valoare) {
                $('#field-delete-litera-4').append(`<option value="${valoare}">${valoare} </option>`);
            });

        });
    });
    $("#field-delete-litera-4").change(function(e) {
        validareLipsaValoare("#field-delete-litera-4");
    });

    //sterge clasa
    $("#btn-delete-clasa").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldDeleteAn4 = $("#field-delete-an-4").val();
        let fieldDeleteLitera4 = $("#field-delete-litera-4").val();

        // validari input
        var errDetected = false;

        if (validareLipsaValoare("#field-delete-an-4") == false)
            errDetected = true;
        if (validareLipsaValoare("#field-delete-litera-4") == false)
            errDetected = true;

        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=deleteClasa", {
                an: fieldDeleteAn4,
                litera: fieldDeleteLitera4
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-delete-clasa").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a sters cu succes!");

                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }
    });

    //editare clasa
    $("#btn-edit-clasa").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldEditAn4 = $("#field-edit-an-4").val();
        let fieldEditLitera4 = $("#field-edit-litera-4").val();
        let fieldEditAnNou4 = $("#field-edit-an-nou-4").val();
        let fieldEditLiteraNoua4 = $("#field-edit-litera-noua-4").val();

        // validari input
        var errDetected = false;

        if (validareLipsaValoare("#field-edit-an-4") == false)
            errDetected = true;

        if (validareLipsaValoare("#field-edit-litera-4") == false)
            errDetected = true;

        if (validareLipsaValoare("#field-edit-an-nou-4") == false)
            errDetected = true;

        if (validareLipsaValoare("#field-edit-litera-noua-4") == false)
            errDetected = true;


        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=editClasa", {
                an: fieldEditAn4,
                litera: fieldEditLitera4,
                anNou: fieldEditAnNou4,
                literaNoua: fieldEditLiteraNoua4,
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-edit-clasa").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a modificat cu succes!");

                } else if (response.trim() == "exista") {
                    alert("Exista deja aceasta clasa!");
                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }

    });

    //validare editare date clasa
    $("#field-edit-an-4").change(function(e) {
        validareLipsaValoare("#field-edit-an-4") ? literaVizibila(true) : literaVizibila(false);

        //golire lista litere
        $('#field-edit-litera-4').empty();
        $('#field-edit-litera-4').append(`<option value="" selected="selected">--Selectează--</option>`);


        let anSelectat = $('#field-edit-an-4').val();

        $.post("<?php echo BASE_URL; ?>/data?action=getLitere", {
            anSelectat: anSelectat
        }, function(response) {

            $.each(response, function(key, valoare) {
                $('#field-edit-litera-4').append(`<option value="${valoare}">${valoare} </option>`);
            });

        });
    });
    $("#field-edit-litera-4").change(function(e) {
        validareLipsaValoare("#field-edit-litera-4") ? anNouVizibil(true) : anNouVizibil(false);
    });

    //validare adaugare profmat
    $("#field-add-materie-5").change(function(e) {
        validareLipsaValoare("#field-add-materie-5");
    });

    //adaugare materie
    $("#btn-add-materie").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let materie = $("#field-add-materie-5").val();

        // validari input
        var errDetected = false;

        if (validareLipsaValoare("#field-add-materie-5") == false)
            errDetected = true;

        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=addMaterie", {
                materie: materie
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-add-clasa").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a adaugat cu succes materia introdusă!");

                } else if (response.trim() == 'exista') {
                    alert("Materia introdusă există deja!");
                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }
    });

    //validare editare materie
    $("#field-edit-materie-5").change(function(e) {
        validareLipsaValoare("#field-edit-materie-5");
    });

    $("#field-edit-materie-nou-5").change(function(e) {
        validareLipsaValoare("#field-edit-materie-nou-5");
    });

    //editare materie
    $("#btn-edit-materie").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let materie = $("#field-edit-materie-5").val();
        let materieNou = $("#field-edit-materie-nou-5").val();

        // validari input
        var errDetected = false;

        if (validareLipsaValoare("#field-edit-materie-5") == false)
            errDetected = true;

        if (validareLipsaValoare("#field-edit-materie-nou-5") == false)
            errDetected = true;

        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=editMaterie", {
                materie: materie,
                materieNou: materieNou
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-edit-materie").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a modificat cu succes!");

                } else if (response.trim() == 'exista') {
                    alert("Materia introdusă există deja!");
                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }
    });

    //validare stergere materie
    $("#field-delete-materie-5").change(function(e) {
        validareLipsaValoare("#field-delete-materie-6");
    });

    //sterge materie
    $("#btn-delete-materie").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldDeleteMaterie5 = $("#field-delete-materie-5").val();

        // validari input
        var errDetected = false;

        if (validareLipsaValoare("#field-delete-materie-5") == false)
            errDetected = true;

        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=deleteMaterie", {
                materieD1: fieldDeleteMaterie5
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-delete-materie").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a sters cu succes!");

                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }
    });

    //validare adaugare date clasa
    $("#field-add-profesor-6").change(function(e) {
        validareLipsaValoare("#field-add-profesor-6");
    });
    $("#field-add-materie-6").change(function(e) {
        validareLipsaValoare("#field-add-materie-6");
    });

    //adaugare clasa
    $("#btn-add-profmat").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldAddProf6 = $("#field-add-profesor-6").val();
        let fieldAddMaterie6 = $("#field-add-materie-6").val();

        // validari input
        var errDetected = false;

        if (validareLipsaValoare("#field-add-profesor-6") == false)
            errDetected = true;

        if (validareLipsaValoare("#field-add-materie-6") == false)
            errDetected = true;


        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=addProfmat", {
                profesor: fieldAddProf6,
                materie: fieldAddMaterie6
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-add-profmat").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a adaugat cu succes!");

                } else if (response.trim() == 'exista') {
                    alert("Relația introdusă există deja!");
                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }
    });

    //validare stergere profmat
    $("#field-delete-profesor-6").change(function(e) {
        validareLipsaValoare("#field-delete-profesor-6");
    });
    $("#field-delete-materie-6").change(function(e) {
        validareLipsaValoare("#field-delete-materie-6");
    });

    //extragere materii profesor
    $("#field-delete-profesor-6").change(function(e) {

        //golire lista materii
        $('#field-delete-materie-6').empty();
        $('#field-delete-materie-6').append(`<option value="" selected="selected">--Selectează--</option>`);

        let profesorSelectat = $('#field-delete-profesor-6').val();

        $.post("<?php echo BASE_URL; ?>/data?action=getMateriiProfesor", {
            profesorSelectat: profesorSelectat
        }, function(response) {

            $.each(response, function(key, valoare) {
                $('#field-delete-materie-6').append(`<option value="${valoare['idMaterie']}">${valoare['denumire']} </option>`);
            });

        });
    });

    //sterge profmat
    $("#btn-delete-profmat").click(function(e) {
        e.preventDefault();

        // preluam datele din form
        let fieldDeleteProf6 = $("#field-delete-profesor-6").val();
        let fieldDeleteMaterie6 = $("#field-delete-materie-6").val();

        // validari input
        var errDetected = false;

        if (validareLipsaValoare("#field-delete-profesor-6") == false)
            errDetected = true;

        if (validareLipsaValoare("#field-delete-materie-6") == false)
            errDetected = true;


        if (errDetected == false) {

            // trimitem
            $.post("<?php echo BASE_URL; ?>/data?action=deleteProfmat", {
                profesorD: fieldDeleteProf6,
                materieD: fieldDeleteMaterie6
            }, function(response) {
                if (response.trim() == 'success') {

                    // resetam inputul din formular
                    $("#form-delete-profmat").trigger('reset');

                    // eliminam tipul de valididate al campurilor
                    $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                    // afisam mesaj de ok
                    alert("S-a sters cu succes!");

                } else {

                    // afisam mesaj de eroare
                    alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                }

            });
        }
    });
</script>
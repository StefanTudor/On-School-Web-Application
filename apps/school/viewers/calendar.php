<!DOCTYPE html>
<html>

<head>
	<title>Sarcini</title>

	<meta charset="utf-8" />

	<link href='<?php echo BASE_URL; ?>/assets/css/fullcalendar.css' rel='stylesheet' />
	<link href='<?php echo BASE_URL; ?>/assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />

	<?php include("_parts/header.php"); ?>


	<style>
		html,
		body {
			height: 100%;
			text-align: center;
			font-family: 'Poppins', sans-serif;
			background-color: #DDDDDD;
		}

		#app-wrapper {

			padding-top: 7rem;
			;
		}

		#external-events {
			float: left;
			width: 150px;
			padding: 0 10px;
			text-align: left;
		}

		#external-events h4 {
			font-size: 16px;
			margin-top: 0;
			padding-top: 1em;
		}

		.external-event {
			margin: 10px 0;
			padding: 2px 4px;
			background: #3366CC;
			color: #fff;
			font-size: .85em;
			cursor: pointer;
		}

		#external-events p {
			margin: 1.5em 0;
			font-size: 11px;
			color: #666;
		}

		#external-events p input {
			margin: 0;
			vertical-align: middle;
		}

		#calendar {
			margin: 0 auto;
			width: 900px;
			background-color: #FFFFFF;
			border-radius: 6px;
			box-shadow: 0 1px 2px #C3C3C3;
		}
	</style>
</head>

<body>

	<?php include("_parts/menu-" .  $_SESSION['tipContStr'] . ".php"); ?>

	<div id='app-wrapper'>

		<div id='calendar'></div>

		<div style='clear:both'></div>
	</div>

	<div id="modal-add-task" class="modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><i class="fa fa-plus"></i> Adaugă un task</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form-add-task" action="<?php echo BASE_URL; ?>/admin" method="post">
						<div class="row pad-lr-1 text-left">
							<div class="col-md-6 pad-top-lr-2">
								<div class="form-group ">
									<label for="field-denumire">*Denumire:</label>
									<input type="text" id="field-denumire" name="field-denumire" class="form-control" placeholder="Denumire task" required>
								</div>
							</div>
							<div class="col-md-6 pad-top-lr-2 d-flex align-items-center">
								<div class="form-group pt-4">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="checkBox" required>
										<label class="custom-control-label" for="checkBox">Toată ziua</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row pad-lr-1 text-left">
							<div class="col-md-6 pad-top-lr-2">
								<div class="form-group ">
									<label for="field-data-inceput">*Dată început:</label>
									<input type="date" id="field-data-inceput" name="field-data-inceput" class="form-control" placeholder="Dată început" required>
								</div>
							</div>
							<div class="col-md-6 pad-top-lr-2">
								<div class="form-group ">
									<label for="field-ora-inceput">*Oră început:</label>
									<input type="time" id="field-ora-inceput" name="field-ora-inceput" class="form-control" placeholder="Oră început" required>
								</div>
							</div>

						</div>
						<div class="row pad-lr-1 text-left">
							<div class="col-md-6 pad-top-lr-2">
								<div class="form-group ">
									<label for="field-data-sfarsit">Dată sfărșit:</label>
									<input type="date" id="field-data-sfarsit" name="field-data-sfarsit" class="form-control" placeholder="Dată sfârșit">
								</div>
							</div>
							<div class="col-md-6 pad-top-lr-2">
								<div class="form-group ">
									<label for="field-ora-sfarsit">Oră sfârșit:</label>
									<input type="time" id="field-ora-sfarsit" name="field-ora-sfarsit" class="form-control" placeholder="Oră sfârșit">
								</div>
							</div>
						</div>
						<div class="row pad-lr-1 text-left">
							<div class="col-md-6 pad-top-lr-2">
								<div class="form-group ">
									<label for="field-url">URL:</label>
									<input type="text" id="field-url" name="field-url" class="form-control" placeholder="URL">
								</div>
							</div>
							<div class="col-md-6 pad-top-lr-2">
								<div class="form-group">
									<label class="control-label" for="field-tip">*Tip task:</label>
									<select class="form-control" id="field-tip" name="field-tip" required>
										<option value="success">Notiță</option>
										<option value="info">Informare</option>
										<option value="important">Important</option>
									</select>
								</div>
							</div>
						</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
					<button type="submit" id="btn-add-task" class="btn btn-success">Adaugă</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<script src='<?php echo BASE_URL; ?>/assets/js/jquery-1.10.2.js' type="text/javascript"></script>
	<script src='<?php echo BASE_URL; ?>/assets/js/jquery-ui.custom.min.js' type="text/javascript"></script>
	<script src='<?php echo BASE_URL; ?>/assets/js/fullcalendar.js' type="text/javascript"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>




	<script>
		// mentinem tot timpul content-ul sub navbar
		$(".app-wrapper").css("padding-top", $(".navbar").outerHeight() + "px");
		$(window).resize(function() {
			$(".app-wrapper").css("padding-top", $(".navbar").outerHeight() + "px");
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

		function initCalendar(objectName, taskList) {

			var calendar = $(objectName).fullCalendar({

				header: {
					left: 'title',
					center: 'agendaDay,agendaWeek,month',
					right: 'prev,next today'
				},
				editable: true,
				firstDay: 1,
				selectable: true,
				defaultView: 'month',

				axisFormat: 'h:mm',
				columnFormat: {
					month: 'ddd', // Mon
					week: 'ddd d', // Mon 7
					day: 'dddd M/d', // Monday 9/7
					agendaDay: 'dddd d'
				},
				titleFormat: {
					month: 'MMMM yyyy', // September 2009
					week: "MMMM yyyy", // September 2009
					day: 'MMMM yyyy' // Tuesday, Sep 8, 2009
				},
				allDaySlot: false,
				selectHelper: true,
				select: function(start, end, allDay) {

					$("#modal-add-task").modal();

					// calendar.fullCalendar('renderEvent', {
					// 		taskInserat
					// 	},
					// 	true // make the event "stick"
					// );

					calendar.fullCalendar('unselect');
				},
				droppable: true,
				drop: function(date, allDay) {

					var originalEventObject = $(this).data('eventObject');

					var copiedEventObject = $.extend({}, originalEventObject);

					copiedEventObject.start = date;
					copiedEventObject.allDay = allDay;

					$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

					if ($('#drop-remove').is(':checked')) {
						$(this).remove();
					}

				},

				events: taskList

			});

			return calendar;

		}

		//validari adaugare date task
		$("#field-denumire").change(function(e) {
			validareLipsaValoare("#field-denumire");
		});
		$("#field-data-inceput").change(function(e) {
			validareLipsaValoare("#field-data-inceput");
		});
		$("#field-ora-inceput").change(function(e) {
			validareLipsaValoare("#field-ora-inceput");
		});
		$("#field-data-sfarsit").change(function(e) {
			if ($("#field-data-sfarsit").val() != '') {
				validareLipsaValoare("#field-data-sfarsit");
			}
		});
		$("#field-ora-sfarsit").change(function(e) {
			if ($("#field-ora-sfarsit").val() != '') {
				validareLipsaValoare("#field-ora-sfarsit");
			}
		});
		$("#field-url").change(function(e) {
			validareLipsaValoare("#field-url");
		});
		$("#field-tip").change(function(e) {
			validareLipsaValoare("#field-tip");
		});


		//adaugare task
		$("#btn-add-task").click(function(e) {
			e.preventDefault();

			// preluam datele din form
			let fieldDenumire = $("#field-denumire").val();
			let fieldToataZiua = $("#field-toataZiua").val();
			let fieldDataInceput = $("#field-data-inceput").val();
			let fieldOraInceput = $("#field-ora-inceput").val();
			let fieldDataSfarsit = $("#field-data-sfarsit").val();
			let fieldOraSfarsit = $("#field-ora-sfarsit").val();
			let fieldUrl = $("#field-url").val();
			let fieldTip = $("#field-tip").val();

			if (fieldToataZiua == undefined) {
				fieldToataZiua = 0;
			} else {
				fieldToataZiua = 1;
			}

			// validari input
			var errDetected = false;

			if (validareLipsaValoare("#field-denumire") == false)
				errDetected = true;

			if (validareLipsaValoare("#field-data-inceput") == false)
				errDetected = true;

			if (validareLipsaValoare("#field-ora-inceput") == false)
				errDetected = true;

			if (validareLipsaValoare("#field-tip") == false)
				errDetected = true;

			if (errDetected == false) {

				// trimitem
				$.post("<?php echo BASE_URL; ?>/data?action=addTask", {
					denumire: fieldDenumire,
					toataZiua: fieldToataZiua,
					dataInceput: fieldDataInceput,
					oraInceput: fieldOraInceput,
					dataSfarsit: fieldDataSfarsit,
					oraSfarsit: fieldOraSfarsit,
					url: fieldUrl,
					tip: fieldTip

				}, function(response) {
					if (response.trim() == 'success') {

						// resetam inputul din formular
						$("#form-add-task").trigger('reset');

						// eliminam tipul de valididate al campurilor
						$(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

						// afisam mesaj de ok
						alert("S-a adaugat cu succes!");

					} else {

						// afisam mesaj de eroare
						alert("S-a intampinat o eroare! Va rugam sa reincercati.");

					}
					window.location.href = "<?php echo BASE_URL; ?>/<?php echo $_SESSION['tipContStr'] ?>/calendar";
				});
			}


		});


		$(document).ready(function() {
			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();

			var calendar;

			// extragere
			$.post("<?php echo BASE_URL; ?>/data?action=getTasks", {}, function(response) {

				var taskuri = [];

				$.each(response, function(key, valoare) {
					let task = {};
					if (valoare.id) {
						task.id = valoare.id;
					}
					if (valoare.denumire) {
						task.title = valoare.denumire;
					}
					if (valoare.data_inceput && valoare.ora_inceput) {
						let dataInceput = valoare.data_inceput;
						let oraInceput = valoare.ora_inceput;
						dataInceput = dataInceput.split('-');
						oraInceput = oraInceput.split(':');
						task.start = new Date(dataInceput[0], dataInceput[1] - 1, dataInceput[2], oraInceput[0], oraInceput[1]);
					}
					if (valoare.data_sfarsit && !valoare.ora_sfarsit) {
						let dataSfarsit = valoare.data_sfarsit;
						dataSfarsit = dataSfarsit.split('-');
						task.start = new Date(dataSfarsit[0], dataSfarsit[1] - 1, dataSfarsit[2]);
					}
					if (valoare.data_sfarsit && valoare.ora_sfarsit) {
						let dataSfarsit = valoare.data_sfarsit;
						let oraSfarsit = valoare.ora_sfarsit;
						dataSfarsit = dataSfarsit.split('-');
						oraSfarsit = oraSfarsit.split(':');
						task.end = new Date(dataSfarsit[0], dataSfarsit[1] - 1, dataSfarsit[2], oraSfarsit[0], oraSfarsit[1]);
					}
					if (valoare.tip) {
						task.className = valoare.tip;
					}
					if (valoare.link) {
						task.url = valoare.link;
					}
					if (valoare.toata_ziua == 1) {
						task.allDay = true;
					} else {
						task.allDay = false;
					}
					taskuri.push(task);

				});

				calendar = initCalendar('#calendar', taskuri);

			});

			$('#external-events div.external-event').each(function() {

				var eventObject = {
					title: $.trim($(this).text())
				};

				$(this).data('eventObject', eventObject);

				$(this).draggable({
					zIndex: 999,
					revert: true,
					revertDuration: 0
				});

			});






		});
	</script>

</body>

</html>
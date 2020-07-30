<style>
	#btnScroll {
		display: none;
		position: fixed;
		bottom: 10%;
		right: 30px;
		z-index: 99;
		border: 0;
		outline: 0;
		background-color: rgba(0, 44, 95, 0.7);
		color: white;
		cursor: pointer;
		padding: 0.6rem 1rem 0.8rem 1rem;
		-webkit-filter: grayscale(0) blur(0px);
		filter: grayscale(0) blur(0px);
		-webkit-transition: all 0.5s ease;
		transition: all 0.5s ease;
	}

	#btnScroll:active {
		background-color: #00aad2;
		border-radius: 50%;
		-webkit-transform: rotate(360deg);
		transform: rotate(360deg);
	}
</style>

<footer class="page-footer font-small mdb-color pt-4">
	<div class="container text-center text-md-left">

		<div class="container p-0 m-0">
			<img src="<?php echo BASE_URL; ?>/assets/img/logo.png" width="250" height="70">
		</div>

		<div class="row text-center text-md-left mt-3 pb-3">
			<div class="col-md-3 mx-auto mt-3">
				<div class="mb-4 font-weight-bold" style="font-size: 1.2rem;">Online School </div>
				<div style="color:#cfc8c2; font-weight: 400; font-size:0.9rem;">
					<i class="fa fa-quote-left"></i> Educaţia ar fi mult mai eficientă dacă scopul acesteia ar fi ca
					la ieşirea din şcoală, fiecare copil să conştientizeze cât de multe lucruri nu ştie şi să fie cuprins
					de o dorinţă permanentă să le afle. <i class="fa fa-quote-right"></i></div>
				<div class="text-right" style="color:#cfc8c2; font-weight: 400; font-size:0.9rem;"> – William Haley</div>
			</div>

			<div class="col-md-3 mx-auto mt-3 d-flex justify-content-center">
				<div>
					<div class="mb-4 font-weight-bold" style="font-size: 1.2rem;">Link-uri Rapide</div>
					<div style="margin-top:1rem; font-weight: 400; font-size:0.9rem;">
						<a href="e" style="color:#cfc8c2;"></a>
					</div>
					<div style="margin-top:1rem; font-weight: 400; font-size:0.9rem;">
						<div><a href="/<?php echo $_SESSION['tipContStr']; ?>/orar" style="color:#cfc8c2;">Orar</a></div>
					</div>
					<div style="margin-top:1rem; font-weight: 400; font-size:0.9rem;">
						<div><a href="/<?php echo $_SESSION['tipContStr']; ?>/note" style="color:#cfc8c2;">Note</a></div>
					</div>
					<div style="margin-top:1rem; font-weight: 400; font-size:0.9rem;">
						<div><a href="/<?php echo $_SESSION['tipContStr']; ?>/calendar" style="color:#cfc8c2;">Calendar</a></div>
					</div>
					<div style="margin-top:1rem; font-weight: 400; font-size:0.9rem;">
						<div><a href="/<?php echo $_SESSION['tipContStr']; ?>/lista-profesori" style="color:#cfc8c2;">Profesori</a></div>
					</div>
				</div>
			</div>

			<div class="col-md-3 mx-auto mt-3 d-flex justify-content-center">
				<div>
					<h6 class="mb-4 font-weight-bold" style="font-size: 1.2rem;">Informații</h6>
					<div style="margin-top:1rem; font-weight: 400; font-size:0.9rem;">
						<a href="https://anpc.ro/" target="_blank" style="color:#cfc8c2;">A.N.P.C.</a>
					</div>
					<div style="margin-top:1rem; font-weight: 400; font-size:0.9rem;">
						<a href="" style="color:#cfc8c2;">
							Termeni și condiții
						</a>
					</div>
					<div style="margin-top:1rem; font-weight: 400; font-size:0.9rem;">
						<a href="" style="color:#cfc8c2;">
							Politica de confidențialitate
						</a>
					</div>
				</div>
			</div>


			<div class="col-md-2 mx-auto mt-3 d-flex justify-content-center">
				<div>
					<div class="mb-4 font-weight-bold" style="font-size: 1.2rem;">Suport</div>
					<div style="margin-top:1rem; font-weight: 400; font-size:0.9rem; color:#cfc8c2;">
						<i class="fa fa-phone"></i><a href="tel:"> 0749 070 348</a>
					</div>
				</div>
			</div>
		</div>

		<hr>

		<div class="footer-copyright" style="font-weight: 400; padding-bottom:4rem; color:#cfc8c2;">
			<div class="row px-2">
				<div id="text-copyright" class="col-md-6">
					©<?php echo date("Y"); ?> Copyright
					<strong>Tudor Ștefan</strong></a>
				</div>
				<div id="text-termeni" class="col-md-6">
					Realizat de <strong>T. Ș.</strong></a>
				</div>
			</div>
		</div>
	</div>
</footer>

<button onclick="topFunction()" id="btnScroll" title="Mergi la începutul paginii">
	<i class="fa fa-angle-up fa-lg" aria-hidden="true"></i>
</button>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script type="text/javascript">
	// mentinem tot timpul content-ul sub navbar
	$(".app-wrapper").css("padding-top", $(".navbar").outerHeight() + "px");
	$(window).resize(function() {
		$(".app-wrapper").css("padding-top", $(".navbar").outerHeight() + "px");
	});


	var mybutton = document.getElementById("btnScroll");

	window.onscroll = function() {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
			mybutton.style.transform = "visibility 0s linear 0.33s, opacity 0.33s linear"
		}
	}

	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
</script>
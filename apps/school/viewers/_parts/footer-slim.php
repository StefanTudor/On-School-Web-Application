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
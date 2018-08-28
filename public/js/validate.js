<script>
	function check_values() {
		var x, text, y;

		// Get the value of the input field with id="numb"
		x = document.getElementById("naziv").value;
		y = document.getElementById("ip_zastita").value;

		// If x is Not a Number or less than one or greater than 10
		if (x == "") {
			text = "Name must be filled out";
			
			return false;
		} else {
			text = "";
			return true;
		}
		document.getElementById("demo").innerHTML = text;
		
		
	}
</script>
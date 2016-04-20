document.addEventListener("DOMContentLoaded", function() {
	var element = document.getElementById("slide1");
	var secondElement = document.getElementById("slide2");
	element.style.opacity = 1;
	secondElement.style.opacity = 0;
		function fade()
		{
			element.style.opacity -= 0.01;
			secondElement.style.opacity = parseFloat(secondElement.style.opacity) + 0.01;

			if (element.style.opacity > 0)
			{
				setTimeout(fade, 100);
			}
			else if (parseInt(secondElement.style.opacity) == 1)
			{
				var tmp;
				tmp = element;
				element = secondElement;
				secondElement = tmp;
				setTimeout(fade, 100);
			}
		}
		fade();
});
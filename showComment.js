addEventListener("DOMContentLoaded", function() {
	var Comment = document.getElementById('commentaire').style;
	if (!window.location.hash) {
		Comment.display = "none";
	}
	console.log(window.location.hash);
	document.getElementById('commentA').onclick = function() {
		if (Comment.display === "none") {
			Comment.display = "";
		}
		else {
			Comment.display = "none";
		}
	};
});
function loadFile(event) {
	document.getElementById('img').innerHTML = '<div class="image_article"><a href="#" title=""><img id="output" src="" alt="Picture for article"></a></div>';
	var reader = new FileReader();
	reader.onload = function(){
		var output = document.getElementById('output');
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
}
function preview() {
	var tag = document.getElementsByName('tag')[0].value.split(", ");
	var tagjoin = tag.join('</a><a href="#">');
	var value = document.getElementsByName('content_article')[0].value;
	var titre = document.getElementsByName('titre_article')[0].value;
	value = value.replace(/\[code\](.*)\[\/code]/, '<code>$1</code>');
	/*value = value.replace(/<script>.*<\/script>/, '');*/
	value = value.replace(/\[b\](.*)\[\/b]/, '<b>$1</b>');
	value = value.replace(/\[u\](.*)\[\/u]/, '<u>$1</u>');
	value = value.replace(/\[i\](.*)\[\/i]/, '<i>$1</i>');
	value = value.replace(/\[s\](.*)\[\/s]/, '<s>$1</s>');
	value = value.replace(/\[intro\](.*)\[\/intro]/, '$1');
	value = value.replace(/\[img\](.*)\[\/img]/, '<img src="$1"/>');
	value = value.replace(/\[video\](https:\/\/)*(http:\/\/)*(www\.)*(youtube\.com\/)(watch\?v\=)*(.*)\[\/video]/, '<iframe src="https://$4embed/$6" frameborder="0" allowfullscreen></iframe>');
	value = value.replace(/\[url=(http:\/\/)*(.*)\](.*)\[\/url]/, '<a href="http://$2">$3</a>');
	document.getElementById('preview').innerHTML = '</div><div class="article"><span class="date"><time datetime=""></time></span><span class="tag"><a href="#">' + tagjoin + '</a></span><h2>' + titre + '</h2><p>' + value + '</p><div class="footer_article"><div class="link_article"><ul><li><a class="facebook" href="http://www.facebook.com/">&nbsp;</a></li><li><a class="twitter" href="http://twitter.com">&nbsp;</a></li><li><a class="g_plus" href="http://plus.google.com">&nbsp;</a></li><li><a class="pinterest" href="http://pinterest.com">&nbsp;</a></li><li><a class="linkedin" href="http://linkedin.com">&nbsp;</a></li></ul></div></div>';
}
addEventListener("DOMContentLoaded", function(){
	document.getElementsByName('PHP_preview')[0].style.display = 'none';
	document.getElementsByName('datafile')[0].onchange = function(event) {
		loadFile(event);
	};
	document.getElementsByName('titre_article')[0].onkeyup = document.getElementsByName('content_article')[0].onkeyup = document.getElementsByName('tag')[0].onkeyup = function() {
		preview();
	};
});
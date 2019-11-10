var extensions = ["doc", "pdf", "txt", "js"];
var image = document.getElementById('image')
var imgFile = document.getElementById('imgFile');
imgFile.addEventListener('change', function(event){
	if(event.target.files.length > 0){
		  var img = document.createElement('img');
		  var ext = event.target.files[0].name.split('.').pop();
		//  if(extensions.indexOf(ext) !== -1){
			  var src = '/images/order/'+ ext +'.png';
		 // } else{
          //  var src = '/images/order/default.png';
        }
		img.setAttribute('src', src);
		image.appendChild(img);
	}, false);


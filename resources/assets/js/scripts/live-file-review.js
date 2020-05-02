var _pictureUploader = function(e){
  let input = $(this);
  let files = this.files;
  let pictureTag = $(input.data('target'));

  if (!files && files.length == 0) {
    return;
  }

	var reader = new FileReader();
	reader.onload = function (e) {
		if (pictureTag.is( "div" )){
			pictureTag.css('background-image', `url('${e.target.result}')`);
			pictureTag.find('.hidden-message').hide();
		}else if (pictureTag.is( "img" )){
			pictureTag.attr('src', e.target.result);
		}
	}
	reader.readAsDataURL(files[0]);
	return;
}


$().ready(function(){
	$('.on__file__change').on('change', _pictureUploader);
});

$('.product-main-img').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: false,
	fade: true,
	asNavFor: '.product-imgs'
});
$('.product-imgs').slick({
	slidesToShow: 3,
	slidesToScroll: 1,
	asNavFor: '.product-main-img',
	dots: true,
	focusOnSelect: true
});

$('a[data-slide]').click(function (e) {
	e.preventDefault();
	var slideno = $(this).data('slide');
	$('.product-main-img').slick('slickGoTo', slideno - 1);
});

jQuery(document).ready(function(){
	
	//////////////Cart Pluss
	$('.add').click(function () {
		if ($(this).prev().val()) {
			$(this).prev().val(+$(this).prev().val() + 1);
		}
	});
	$('.sub').click(function () {
		if ($(this).next().val() > 1) {
			if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
		}
	});
});


	// Input number
	$('.input-number').each(function() {
		var $this = $(this),
		$input = $this.find('input[type="number"]'),
		up = $this.find('.qty-up'),
		down = $this.find('.qty-down');

		down.on('click', function () {
			var value = parseInt($input.val()) - 1;
			value = value < 1 ? 1 : value;
			$input.val(value);
			$input.change();
			updatePriceSlider($this , value)
		})

		up.on('click', function () {
			var value = parseInt($input.val()) + 1;
			$input.val(value);
			$input.change();
			updatePriceSlider($this , value)
		})
	});

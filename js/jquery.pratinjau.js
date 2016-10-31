$(document).ready(function(){
  $("input[type=radio]").click(function(){
	//mengambil nilai value
	var value=$(this).val();

	//memanggil/menampilkan hasil pratinjau
	$('#pratinjau').load('admin/pratinjau.php',{size:value});
  });
});

$(document).ready(function() {
	$('input[name=preview]').click(function(e) {
		e.preventDefault();

		//mengambil width dan height box popup
		var popW=$('input[name=width]').val();
		var popH=$('input[name=height]').val();
		
		//memasukkan widht dan height box popup
		$('#boxes #popup').css('width',popW);
		$('#boxes #popup').css('height',popH);

		//deklarasi variabel panjang dan lebar pada layar
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();

		//masukkan panjang dan lebar layar pada id mask
		$('#bg_popup').css({'width':maskWidth,'height':maskHeight});

		//cuma effect untuk mempermanis :)
		$('#bg_popup').fadeIn(1000);
		$('#bg_popup').fadeTo("slow",0.8);

		//untuk menampilkan besar window yang ditampilkan
		var winH = $(window).height();
		var winW = $(window).width();

		//posisikan popup pada tengah layar
		$('#popup').css('top',  winH/(-3)-$('#popup').height()/(-3));
		$('#popup').css('left', winW/(-9)-$('#popup').width()/(-9));

		//Tampilkan selama 2 detik (untuk Effect saja)
		$('#popup').fadeIn(2000);
	});

	//Ketika Tombol Close ditekan
	$('.window .close').click(function (e) {
		e.preventDefault();

		$('#bg_popup').hide();
		$('.window').hide();
	});

	//bila pada area bg_popup diklik
	$('#bg_popup').click(function () {
		$(this).hide();
		$('.window').hide();
	});
});



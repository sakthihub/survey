$("#intro").hide();

$(".enter_btn").onClick(function(){
	alert("s");
	$("#index").hide();
});

$(".tam_content h5").each(function () {
      var el = $(this),
            text = el.html(),
            first = text.slice(0, 1),
            rest = text.slice(1);
      el.html("<span class='firstletter'>" + first + "</span>" + rest);
});
jQuery(document).ready(function($){
	$(".button-collapse").sideNav();
	$('.parallax').parallax();
	$('.modal').modal();
	$('select').material_select();
	$('ul.tabs').tabs();
	
	
	$(".other_cat").click(function(e){
		$(".other_pop").show();
		e.stopPropagation();
	});
	
	$(document).click(function(){
		$(".other_pop").hide();
	});
	
	
	$('.location').focus(function() {
	   $('.location_search').hide();
	   $("."+$(this).attr('hint-class')).show();
	});

	$('.location').blur(function() {
	   $('.location_search').hide();
	});
	
	$('.services').focus(function() {
	   $('.services_search').hide();
	   $("."+$(this).attr('hint-class')).show();
	});

	$('.services').blur(function() {
	   $('.services_search').hide();
	});
	
	
	$('.view-more').click(function() {
	   $('.all_service').toggle();
	});
	
	$('.banner_slider').owlCarousel({
		loop:false,
		margin:0,
		nav:false,
		dots: false,
		items:3,
		autoplay:false,
	});
	
	var owl = $('.banner_slider');
	owl.owlCarousel();
	$('.customNextBtn').click(function() {
		owl.trigger('next.owl.carousel');
	});
	$('.customPrevBtn').click(function() {
		owl.trigger('prev.owl.carousel', [300]);
	});
	
	$('.testi-carousel').owlCarousel({
		loop:true,
		margin:10,
		nav:false,
		items:1,
		autoplay:false,
	});
	
	var owl1 = $('#test_slider1');
	owl1.owlCarousel();
	$('.customNextBtn1').click(function() {
		owl1.trigger('next.owl.carousel');
	});
	$('.customPrevBtn1').click(function() {
		owl1.trigger('prev.owl.carousel', [300]);
	});
	
	var owl2 = $('#test_slider2');
	owl2.owlCarousel();
	$('.customNextBtn2').click(function() {
		owl2.trigger('next.owl.carousel');
	});
	$('.customPrevBtn2').click(function() {
		owl2.trigger('prev.owl.carousel', [300]);
	});
	
	
	$('.institute-slider').owlCarousel({
		loop:true,
		margin:10,
		nav:false,
		items:1,
		autoplay:true,
		autoplayTimeout:5000
	});
	
	
	$('.student-slider').owlCarousel({
		loop:true,
		margin:10,
		nav:false,
		items:1,
		autoplay:true,
		autoplayTimeout:6000
	});

	$('#customers-testimonials').owlCarousel({
		loop: true,
		nav:false,
		center: true,
		items: 1,
		margin: 0,
		autoplay: true,
		dots:false,
		autoplayTimeout: 6000,
		smartSpeed: 450,
		responsive: {
		  0: {
			items: 1
		  },
		  768: {
			items: 1
		  },
		  1170: {
			items: 1
		  }
		}
	});
	
	$('#customers-testimonials').owlCarousel({
		loop:true,
		margin:10,
		nav:false,
		items:1,
		autoplay:false,
	});
	
	var owl3 = $('.client_msg');
	owl3.owlCarousel();
	$('.customnextbtn').click(function() {
		owl3.trigger('next.owl.carousel');
	});
	$('.customprevbtn').click(function() {
		owl3.trigger('prev.owl.carousel', [300]);
	});
	
	$(window).on("load",function(){
		$(".scroll1").mCustomScrollbar({
			theme:"minimal-dark"
		});
	});

	/* 1. Visualizing things on Hover - See next part for action on click */
	$('#stars li').on('mouseover', function(){
		var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
		// Now highlight all the stars that's not after the current hovered star
		$(this).parent().children('li.star').each(function(e){
		  if (e < onStar) {
			$(this).addClass('hover');
		  } else {
			$(this).removeClass('hover');
		  }
		});
	}).on('mouseout', function(){
		$(this).parent().children('li.star').each(function(e){
		  $(this).removeClass('hover');
		});
	});
	  
	  
	  /* 2. Action to perform on click */
	  $('#stars li').on('click', function(){
		var onStar = parseInt($(this).data('value'), 10); // The star currently selected
		var stars = $(this).parent().children('li.star');
		
		for (i = 0; i < stars.length; i++) {
		  $(stars[i]).removeClass('selected');
		}
		
		for (i = 0; i < onStar; i++) {
		  $(stars[i]).addClass('selected');
		}
		
		// JUST RESPONSE (Not needed)
		var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
		var msg = "";
		if (ratingValue > 1) {
			msg = "Thanks! You rated this " + ratingValue + " stars.";
		} else {
			msg = "You rated this " + ratingValue + " stars.";
		}
		responseMessage(msg);
	});
});

function responseMessage(msg) {
	$('.success-box').fadeIn(200);  
	$('.success-box div.text-message').html("<span>" + msg + "</span>");
}
  


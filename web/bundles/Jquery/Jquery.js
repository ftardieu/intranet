jQuery(".dropdown-menu li.dropdown").on("mouseenter", function () {
	console.log("jqury");
	
	 jQuery(this).find( ".dropdown-menu").css({ "display": "inline-block" }, "slow" );
	 
	}).on("mouseleave", function () {
	
	jQuery(this).find( ".dropdown-menu").css({ "display": "none" }, "slow" );
	 
});
var ComingSoon = function () {

    return {
        //main function to initiate the module
        init: function () {
            var austDay = new Date();
            austDay = new Date(austDay.getFullYear() , 8, 1);
            //console.log(austDay);
            $('#defaultCountdown').countdown({until: austDay});
            $('#year').text(austDay.getFullYear());

            $.backstretch([
		            "../bundles/mc/themes/pages/media/bg/1.jpg",
		            "../bundles/mc/themes/pages/media/bg/2.jpg",
		            "../bundles/mc/themes/pages/media/bg/3.jpg",
		    		"../bundles/mc/themes/pages/media/bg/4.jpg"
		        ], {
		        fade: 1000,
		        duration: 10000
		   });
        }

    };

}();

jQuery(document).ready(function() {    
   ComingSoon.init(); 
});
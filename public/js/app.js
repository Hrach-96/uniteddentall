$(".js-navigation-slide-open").on("click",function(){$(".navigation-slide-overlay").fadeToggle(),$("body").toggleClass("overflow-hidden"),$(".navigation-slide").toggleClass("active")}),$(".js-navigation-slide-close, .navigation-slide-overlay").on("click",function(){$(".navigation-slide-overlay").fadeOut(),$("body").removeClass("overflow-hidden"),$(".navigation-slide").removeClass("active")}),$(".js-filter-open").on("click",function(){$(".navigation-slide-overlay").fadeToggle(),$("body").toggleClass("overflow-hidden"),$(".filter-sidebar").toggleClass("active")}),$(".js-filter-close, .navigation-slide-overlay").on("click",function(){$(".navigation-slide-overlay").fadeOut(),$("body").removeClass("overflow-hidden"),$(".filter-sidebar").removeClass("active")}),$(".dropdown-toggle").click(function(){if($(".dropdown-toggle").removeClass("active"),$(".dropdown-menu").removeClass("active"),$(this).toggleClass("active"),$(this).find(".dropdown-menu").toggleClass("active"),$(window).width()<=767)return!1}),$(document).on("click",function(o){$(".dropdown-toggle").is(o.target)||$(".dropdown-toggle").has(o.target).length||($(".dropdown-toggle").removeClass("active"),$(".dropdown-menu").removeClass("active"))}),$(window).bind("orientationchange",function(o){location.reload(!0)});
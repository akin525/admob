$(".sidenav-trigger").on("click",function(){$(window).width()<960&&($(".sidenav").sidenav("close"),$(".app-sidebar").sidenav("close"))}),$(document).ready(function(){$(".contact-app-sidebar").sidenav(),$(".contact-sidenav li").click(function(){$("li").removeClass("active"),$(this).addClass("active")}),$(window).width()<992&&$("#contact-sidenav").addClass("sidenav"),$("html[data-textdirection='rtl']").length>0&&$(".contact-app-sidebar").sidenav({edge:"right"})}),$(window).on("resize",function(){$(window).width()>991&&$("#contact-sidenav").removeClass("sidenav"),$(window).width()<992&&$("#contact-sidenav").addClass("sidenav")});
$(function () {
  "use strict";

  // Admin Panel settings

  // Auto select left navbar
  var url = window.location.href;
  var path = url.replace(window.location.protocol + "//" + window.location.host + "/", "");
  var element = $("ul#sidebarnav a").filter(function () {
    return this.href === url || this.href === path;
  });

  element.parentsUntil(".sidebar-nav").each(function (index) {
    if ($(this).is("li") && $(this).children("a").length !== 0) {
      $(this).children("a").addClass("active");
      if ($(this).parent("ul#sidebarnav").length === 0) {
        $(this).addClass("active");
      } else {
        $(this).addClass("selected");
      }
    } else if (!$(this).is("ul") && $(this).children("a").length === 0) {
      $(this).addClass("selected");
    } else if ($(this).is("ul")) {
      $(this).addClass("in");
    }
  });

  element.addClass("active");

  $("#sidebarnav a").on("click", function (e) {
    if (!$(this).hasClass("active")) {
      $("ul", $(this).parents("ul:first")).removeClass("in");
      $("a", $(this).parents("ul:first")).removeClass("active");

      $(this).next("ul").addClass("in");
      $(this).addClass("active");
    } else if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this).parents("ul:first").removeClass("active");
      $(this).next("ul").removeClass("in");
    }
  });

  $("#sidebarnav >li >a.has-arrow").on("click", function (e) {
    e.preventDefault();
  });

  //****************************
  // This is for the mini-sidebar if width is less than 1170
  //****************************
  var setSideBarType = function () {
    var width = window.innerWidth > 0 ? window.innerWidth : this.screen.width;
    if (width < 1199) {
      $("#main-wrapper").attr("data-sidebartype", "mini-sidebar").addClass("mini-sidebar");
    } else {
      $("#main-wrapper").attr("data-sidebartype", "full").removeClass("mini-sidebar");
    }
  };

  $(window).ready(setSideBarType);
  $(window).on("resize", setSideBarType);

  // This is for sidebartoggler
  $(".sidebartoggler").on("click", function () {
    $("#main-wrapper").toggleClass("mini-sidebar");

    if ($("#main-wrapper").hasClass("mini-sidebar")) {
      $(".sidebartoggler").prop("checked", true);
      $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
    } else {
      $(".sidebartoggler").prop("checked", false);
      $("#main-wrapper").attr("data-sidebartype", "full");
    }
  });

  $(".sidebartoggler").on("click", function () {
    $("#main-wrapper").toggleClass("show-sidebar");
  });
});

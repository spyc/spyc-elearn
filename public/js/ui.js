!function(t){"use strict";function a(){var a=t(".tag-label[data-level]");if(a.length){var n=[];0===n.length&&t.getJSON("/api/bug/level",function(t){n=t}),a.each(function(){var a=t(this).attr("data-level");t(this).css("background-color","#"+(n[a]||"000"))})}}a(),t("[autofocus]").focus(),t("html").niceScroll(),t("[data-markdown-translate]").each(function(){t(this).html(markdown.toHTML(t(this).html().trim()))}),t("a.nav-slide").click(function(a){a.preventDefault(),t("html, body").animate({scrollTop:t(t(this).attr("href")).offset().top},500)}),t("[data-countdown]").each(function(){t(this).countdown(new Date(t(this).attr("data-countdown")),function(a){var n="%-D Days(s) %-H hour(s) %-M Minute(s) %-S Second(s)";t(this).html(a.strftime(t(this).attr("data-format")||n))})}),window.UI={label:a}}(window.jQuery);
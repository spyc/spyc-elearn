!function(t){"use strict";function a(){var a=t(".tag-label[data-level]");if(a.length){var l=[];0===l.length&&t.getJSON("/api/bug/level",function(t){l=t}),a.each(function(){var a=t(this).attr("data-level");t(this).css("background-color","#"+(l[a]||"000"))})}}a(),t("[autofocus]").focus(),t("html").niceScroll(),t("[data-markdown-translate]").each(function(){t(this).html(markdown.toHTML(t(this).html().trim()))}),window.UI={label:a}}(window.jQuery);
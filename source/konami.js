(function ($) {
    $.konami = function (callback) {
        var code = "72,65,78,71,77,65,78";
        var k = [];
        $(document).keydown(function (e) {
            k.push(e.keyCode);
            if (k.toString().indexOf(code) >= 0) {
                k = [];
                $(this).unbind('keydown', arguments.callee);
                callback(e);
            }
        });
    };
})(jQuery);
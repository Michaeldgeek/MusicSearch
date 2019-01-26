<?php
ob_start("ob_gzhandler");
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Free Music Downloads</title>
        <meta name="robots" content="index,follow">
        <meta name="keywords" content="free,mp3,download,mp4,video,audio,music,songs">
        <meta name="description" content="Download all your favorite songs.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <?php
        $youtubedlError = filter_input(INPUT_GET, "error", FILTER_SANITIZE_NUMBER_INT);
        if (is_null($youtubedlError) || is_bool($youtubedlError) || empty($youtubedlError) || empty($_SERVER['HTTP_REFERER'])) {

        } else {
            ?>
            <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css"/>

        <?php }
        ?>
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="images/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="images/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="images/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="images/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="images/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="images/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="images/favicon-128.png" sizes="128x128" />
        <meta name="application-name" content="Sound Tima"/>
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="images/mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="images/mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="images/mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="images/mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="images/mstile-310x310.png" />

    </head>

    <body>
        <div id="content" style="position: relative;top: 110px;">
            <a href="">
                <img id="logo" width="221" src="images/logo.jpg" alt="">
            </a>
            <form method="post">
                <input id="query" type="text" name="query" autocomplete="off" autofocus>
                <button id="button" type="submit"><i class="fa fa-search"></i></button>
                <div class="clear"></div>
                <div id="suggestions">
                </div>
            </form>
            <div id="load">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
            <div id="text"></div>
        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <?php
        $youtubedlError = filter_input(INPUT_GET, "error", FILTER_SANITIZE_NUMBER_INT);
        if (is_null($youtubedlError) || is_bool($youtubedlError) || empty($youtubedlError) || empty($_SERVER['HTTP_REFERER'])) {

        } else {
            ?>
            <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script>
                $(document).ready(function () {
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-center",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
                    toastr.error('An unknown error has occured. Please try again.', 'Error!')
                });
            </script>
        <?php }
        ?>
        <script>
            $(document).ready(function () {
                for (var t = "", s = !1, i = "", n = "", a = 0, c = {
                    d: "Dropbox",
                    g: "Google Drive"
                }, l = {
                    d: !1,
                    g: !1
                }, p = '<div id="download_ID" class="fileCLASS"><div class="name">NAME</div><div class="progress">PROGRESS</div><div class="optionsCLASS_BUTTONS"><a href="URL" rel="nofollow" class="url">Download</a><a href="" class="control_cloud CLASS_CLOUD">Save to cloud</a><a href="" rel="nofollow" target="_blank">Share on <i class="fa fa-facebook-official"></i></a></div><div class="cloud"><div class="providers"><a href="" class="d CLASS_CLOUD"><i class="fa fa-dropbox"></i> Dropbox</a><a href="" class="g CLASS_CLOUD"><i class="fa fa-google"></i> Google Drive</a></div><div class="provider_progress"></div><div class="provider_option"><a id="provider_link_CLASS_CLOUD" href="" rel="nofollow" class="CLASS_CLOUD">Save to </a></div></div></div>', d = ["46/101/97/111/101/46/99/99", "97/99/101", "101/99/111", "111/99/97", "97/97/111", "101/111/101", "99/111/111", "101/111/111", "97/101/99", "101/97/111", "97/111/97", "99/101/97", "101/101/101", "97/101/111", "99/99/101", "99/99/111", "99/97/101", "99/111/97", "111/111/111", "101/99/99", "97/99/111", "101/97/97", "99/97/99", "111/101/99", "111/99/101", "111/111/97", "97/111/101", "111/97/97", "99/97/97", "99/111/101", "111/99/111", "97/101/101", "101/101/111", "99/101/111", "97/101/97", "111/101/97", "101/111/97", "111/97/99", "111/111/101", "99/99/99", "99/99/97"], e = 0; e < $("script").length; e++)
                    if (s = /juices\.js\?[a-z]{1}\=[a-zA-Z0-9\-\_]{16,32}/.exec($("script")[e].src)) {
                        s = h(s.toString().slice(12));
                        break
                    }
                var o = document.createElement("link");

                function u(e, r) {
                    if (-1 < e.indexOf("/")) {
                        e = e.split("/");
                        for (var t = 0, s = ""; t < e.length; t++)
                            s += String.fromCharCode(e[t]);
                        return "s" == r ? s : parseInt(s)
                    }
                    return "s" == r ? String.fromCharCode(e) : parseInt(String.fromCharCode(e))
                }

                function h(e) {
                    for (var r = 0, t = 0, s = ""; t < e.length; t++) {
                        if (r = e.charCodeAt(t), u("54/52", "n") < r && r < u("57/49", "n"))
                            r = r == u("54/53", "n") ? u("57/48", "n") : r - 1;
                        else if (u("57/54", "n") < r && r < u("49/50/51", "n"))
                            r = r == u("49/50/50", "n") ? u("57/55", "n") : r + 1;
                        else if (u("52/55", "n") < r && r < u("53/51", "n"))
                            switch (r) {
                                case u("52/56", "n"):
                                    r = u("53/55", "n");
                                    break;
                                case u("52/57", "n"):
                                    r = u("53/54", "n");
                                    break;
                                case u("53/48", "n"):
                                    r = u("53/53", "n");
                                    break;
                                case u("53/49", "n"):
                                    r = u("53/52", "n");
                                    break;
                                case u("53/50", "n"):
                                    r = u("53/51", "n")
                            }
                        else
                            u("53/50", "n") < r && r < u("53/56", "n") ? r = Math.round(u(r.toString()) / 2).toString().charCodeAt(0) : r == u("52/53", "n") && (r = u("57/53", "n"));
                        s += String.fromCharCode(r)
                    }
                    return s
                }

                function f(e) {
                    return $.trim($(e + " .name").html().replace(/[\/@]/g, "").replace(/[\s]{2,}/g, " ")) + ".mp3"
                }

                function v(e) {
                    return $(e + " .url").attr("href")
                }

                function m(e, r) {
                    $(e + " .clouds_progress").html(r)
                }

                function g() {
                    t = "", a = 0, $("#suggestions").html("").hide()
                }

                function _(e, r) {
                    switch (e) {
                        case "select":
                            $("#suggestions #s_" + r).css("background-color", "#f0f0f0").css("font-weight", 600);
                            break;
                        case "deselect":
                            $("#suggestions #s_" + r).css("background-color", "#ffffff").css("font-weight", 400);
                            break;
                        case "input":
                            $("#query").val(r)
                    }
                }

                function b(e, r, t) {
                    $(e + " .progress").html("An error has occurred (code: e" + r + "-" + t + "). Please try to convert a different video.")
                }

                function w(e, r, t, s) {
                    $(e + " .progress").html("The file is ready. Please click the download button to start the download."), -1 < t.indexOf("h") ? $(e + " .options .url").attr("href", "https://" + u(d[0], "s").slice(1) + "/u") : $(e + " .options .url").attr("href", "https://" + u(d[r], "s") + u(d[0], "s") + "/" + t + "/" + s), $(e + " .options").show()
                }

                function y(e, r) {
                    $.ajax({
                        url: "https://a" + u(d[0], "s") + "/check.php",
                        data: {
                            v: r,
                            f: "mp3",
                            k: s
                        },
                        dataType: "jsonp",
                        success: function (t) {
                            if ($.each(t, function (e, r) {
                                r = $.trim(r), t[e] = "hash" == e || "title" == e ? r : parseInt(r)
                            }), 0 < t.error)
                                return b(e, 1, t.error), !1;
                            0 < t.title.length ? $(e + " .name").html(t.title) : $(e + " .name").html("no name"), t.ce ? w(e, t.sid, t.hash, r) : (i[r] = !1, function e(r, s, o) {
                                var a = ["checking", "loading", "converting"];
                                if (void 0 === i[o])
                                    return !1;
                                $.ajax({
                                    url: "https://a" + u(d[0], "s") + "/progress.php",
                                    data: {
                                        id: s
                                    },
                                    dataType: "jsonp",
                                    success: function (t) {
                                        if ($.each(t, function (e, r) {
                                            r = $.trim(r), t[e] = "title" == e ? r : parseInt(r)
                                        }), 0 < t.error)
                                            return delete i[o], b(r, 2, t.error), !1;
                                        switch (t.progress) {
                                            case 0:
                                            case 1:
                                            case 2:
                                                $(r + " .progress span").html(a[t.progress] + " video");
                                                break;
                                            case 3:
                                                i[o] = !0, w(r, t.sid, s, o)
                                        }
                                        i[o] || window.setTimeout(function () {
                                            e(r, s, o)
                                        }, 3e3)
                                    }
                                })
                            }(e, t.hash, r))
                        }
                    })
                }
                o.setAttribute("rel", "stylesheet"), o.setAttribute("href", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"), $("head").append(o), $("#control_sources").click(function () {
                    return "none" == $("#sources").css("display") ? $("#sources").slideDown() : $("#sources").slideUp(), !1
                }), $("#sources a").click(function () {
                    var e = parseInt($("#control_sources span").html());
                    return "disabled" == $(this).attr("class") ? ($(this).attr("class", "enabled"), $("#control_sources span").html(e + 1), $.ajax({
                        url: "sources.php",
                        async: !1,
                        cache: !1,
                        data: {
                            s: $(this).attr("id"),
                            p: 1
                        },
                        type: "POST"
                    })) : "enabled" == $(this).attr("class") && ($(this).attr("class", "disabled"), $("#control_sources span").html(e - 1), $.ajax({
                        url: "sources.php",
                        async: !1,
                        cache: !1,
                        data: {
                            s: $(this).attr("id"),
                            p: 0
                        },
                        type: "POST"
                    })), !1
                }), $(document).on("keyup", "#query", function (e) {
                    var r = e.keyCode || e.which,
                            s = [],
                            o = $.trim($(this).val());
                    return 13 != r && (o.length < 1 || 0 < o.indexOf("youtube.com/") || 0 < o.indexOf("youtu.be/") ? (g(), !1) : (38 != r && 40 != r && $.ajax({
                        url: "https://suggestqueries.google.com/complete/search?client=youtube&ds=yt&q=" + o,
                        dataType: "jsonp",
                        success: function (e) {
                            e = e.toString().split(",");
                            var t = 1;
                            $.each(e, function (e, r) {
                                0 < (r = $.trim(r)).length && r != o && !$.isNumeric(r) && -1 == $.inArray(r, s) && "[object object]" != r.toLowerCase() && (s.push('<span id="s_' + t + '">' + r + "</span>"), t++)
                            }), 0 < s.length ? $("#suggestions").html(s).show() : g()
                        }
                    }), void window.setTimeout(function () {
                        var e = $("#suggestions span").length;
                        40 == r ? (a < 1 ? a = 1 : (_("deselect", a), a < e ? a++ : a = 0), 0 < a ? (_("select", a), _("input", $("#suggestions #s_" + a).html())) : _("input", t)) : 38 == r ? (a < 1 ? a = e : (_("deselect", a), 0 < a && a--), 0 < a ? (_("select", a), _("input", $("#suggestions #s_" + a).html())) : _("input", t)) : t = o
                    }, 100)))
                }), $(document).on("keypress", "#query", function (e) {
                    var r = e.which || e.keyCode;
                    8 != r && 32 != r && 39 != r || (a = 0)
                }), $(document).on("mouseover", "#suggestions span", function () {
                    var e = $(this).attr("id").split("_")[1];
                    0 < a && _("deselect", a), _("select", e), a = parseInt(e)
                }), $(document).on("click", "#suggestions span", function () {
                    _("input", $("#suggestions #s_" + a).html()), $("form").submit()
                }), $(document).on("click", ".url", function () {
                    var parent = $(this).parent().parent();
                    parent.children().remove();
                    parent.prepend('<span>initializing</span> <i class="fa fa-cog fa-spin"></i>');
                    var id = $(this).attr("data-id").trim();
                    window.location.href = "http://178.128.174.90:3000/get-audio/" + id;
                }), $("form").submit(function () {
                    return g(),
                            function () {
                                i = {}, n = "", "none" != $("#sources").css("display") && $("#sources").slideUp(), 0 < $("#results").length && $("#results").remove(), 0 < $("#error").length && $("#error").remove();
                                var e = $.trim($("#query").val().replace(/\s{2,}/g, " "));
                                if (e.length < 1 || "please enter a valid artist name or song name" == e.toLowerCase())
                                    return $("#query").val("Please enter a valid artist name or song name");
                                var t = function (e) {
                                    if (-1 < e.indexOf("youtube.com/"))
                                        var r = !!(r = /v\=[a-zA-Z0-9\-\_]{11}/.exec(e)) && r.toString().substr(2);
                                    else
                                        -1 < e.indexOf("youtu.be/") && (r = !!(r = /\/[a-zA-Z0-9\-\_]{11}/.exec(e)) && r.toString().substr(1));
                                    return r
                                }(e);
                                if (t) {
                                    var s = p.replace(/ID/, 0).replace(/CLASS/, "").replace(/NAME/, "name").replace(/PROGRESS/, '<span>initializing</span> <i class="fa fa-cog fa-spin"></i>').replace(/CLASS_BUTTONS/, "").replace(/URL/, "").replace(/CLASS_CLOUD/g, 0);
                                    $("#text").before('<div id="results">' + s + "</div>"), $("html, body").animate({
                                        scrollTop: $("#results").offset().top
                                    }), y("#download_0", t)
                                } else {
                                    $("#load").show();
                                    var o = "";
                                    $.ajax({
                                        url: "search.php",
                                        data: {
                                            q: e.replace(/\s_/g, "_")
                                        },
                                        dataType: "jsonp",
                                        success: function (e) {
                                            if ($("#load").hide(), 0 < e.count) {
                                                for (r = 0; r < e.count; r++)
                                                    o += '<div id="result_{I}" class="result"><div class="name">{T}</div><div class="properties">Source: {S_N} &bull;</div><div class="options"><a id="1|{S_D}|{T_B}" href="{L_H}" rel="nofollow" target="{L_T}" class="download {I}">Download</a>{P}</div></div>'.replace(/{B}/, e[r].bitrate).replace(/{D}/, e[r].duration).replace(/{I}/g, e[r].id).replace(/{L_H}/, e[r].link.href).replace(/{L_T}/, e[r].link.target).replace(/{P}/, "true" == e[r].player ? '<a href="" rel="nofollow" class="player {I}">Play</a>'.replace(/{I}/, e[r].id) : "").replace(/{S_D}/, e[r].source.data).replace(/{S_I}/, e[r].source.id).replace(/{S_N}/, e[r].source.name).replace(/{T}/, e[r].title.default).replace(/{T_B}/, e[r].title.base64);
                                                $("#text").before('<div id="results"><p></p>{R}</div>'.replace(/{Q}/, e.query).replace(/{C}/, e.count).replace(/{R}/, o))
                                            } else
                                                $("#text").before('<div id="error">' + e.error.text + "</div>");
                                            $("html, body").animate({
                                                scrollTop: $("form").offset().top
                                            })
                                        }
                                    })
                                }
                            }(), !1
                }), $(document).on("click", ".download", function (ev) {
                    ev.preventDefault();
                    var e = parseInt($(this).attr("class").split(" ")[1]),
                            r = "#result_" + e,
                            t = "#download_" + e,
                            s = $(this).attr("id").split("|");
                    var text = $(this).text();
                    if (text.trim() == "Download") {
                        window.closeFuture = $(r);
                        $(this).text("Close");
                        $(r).after('<div id="download_#no" class="file margin"><div class="name">#name</div><div class="progress">Please select an action to perform.</div><div class="options" style="display: block;"><a  data-id="#youtube" rel="nofollow" class="url pointer">Download audio</a><a data-id="#youtube_v" class="control_cloud 1 d_url pointer">Download video</a></div></div>'.replace("#no", e).replace("#name", $(r).children().first().text()).replace("#youtube", s[1]).replace("#youtube_v", s[1]));
                    } else if (text.trim() == "Close") {
                        $(this).text("Download");
                        $(r).next().remove();
                    }


                }), $(document).on("click", ".d_url", function (ev) {
                    ev.preventDefault();
                    var parent = $(this).parent().parent();
                    parent.children().remove();
                    parent.prepend('<span>initializing</span> <i class="fa fa-cog fa-spin"></i>');
                    setTimeout(function () {
                        $(window.closeFuture).next().remove();
                    }, 10000);

                    var id = $(this).attr("data-id").trim();
                    window.location.href = "http://178.128.174.90:3000/get-video/" + id;

                }), $(document).on("click", ".player", function () {
                    var e = parseInt($(this).attr("class").split(" ")[1]),
                            r = "#result_" + e,
                            t = "#download_" + e;
                    if (0 < $(r + " .download").length)
                        var s = $(r + " .download").attr("id").split("|");
                    else
                        s = $(r + " .player").attr("id").split("|");
                    if (n) {
                        if ($("#result_" + n + " .player").text("Play"), $("#player").remove(), n == e)
                            return n = "", !1;
                        n = ""
                    }
                    var o = '<iframe src="load?id=' + s[1] + '" width="100%" height="315" scrolling="no" allow="autoplay"></iframe>';
                    if (0 < $(t).length)
                        var a = t;
                    else
                        a = r;
                    return $(r + " .player").text("Stop"), $(a).after('<div id="player">' + o + "</div>"), n = e, !1
                });

            });</script>
    </body>

</html>
<?php
ob_end_flush();
?>
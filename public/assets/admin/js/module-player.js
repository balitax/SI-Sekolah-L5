/*!
 *  1.0.0
 * Author: mosaicpro
 * Licence: http://themeforest.net/licenses
 * Copyright 2015
 */

(function ($) {

    $(function () {

        var cssSelectorOptions = {
            videoPlay : ".video-play",
            play : ".play",
            pause : ".pause",
            stop : ".stop",
            seekBar : ".seek-bar",
            playBar : ".play-bar",
            mute : ".mute",
            unmute : ".unmute",
            volumeBar : ".volume-bar",
            volumeBarValue : ".volume-bar-value",
            volumeMax : ".volume-max",
            playbackRateBar : ".playback-rate-bar",
            playbackRateBarValue : ".playback-rate-bar-value",
            currentTime : ".current-time",
            duration : ".duration",
            title : ".title",
            fullScreen : ".full-screen",
            restoreScreen : ".restore-screen",
            repeat : ".repeat",
            repeatOff : ".repeat-off",
            gui : ".gui",
            noSolution : ".no-solution"
        },
        stateClassOptions = {
            playing : "state-playing",
            seeking : "state-seeking",
            muted : "state-muted",
            looped : "state-looped",
            fullScreen : "state-full-screen",
            noVolume : "state-no-volume"
        };

        $("#jquery_jplayer_audio_1").jPlayer({
            ready: function () {
                $(this).jPlayer("setMedia", {
                    title: "Miaow - Bubble",
                    m4a: "http://jplayer.org/audio/m4a/Miaow-07-Bubble.m4a",
                    oga: "http://jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
                });
            },
            play: function () {
                $(this).jPlayer("pauseOthers");
            },
            timeFormat: {
                padMin: false
            },
            swfPath: "js/jplayer",
            supplied: "m4a,oga",
            cssSelectorAncestor: "#audio",
            useStateClassSkin: true,
            autoBlur: false,
            smoothPlayBar: true,
            remainingDuration: true,
            keyEnabled: true,
            keyBindings: {
                loop: null,
                muted: null,
                volumeUp: null,
                volumeDown: null
            },
            wmode: "window",
            cssSelector: cssSelectorOptions,
            stateClass: stateClassOptions
        });

        $("#jquery_jplayer_audio_social_cover").jPlayer({
            ready: function () {
                $(this).jPlayer("setMedia", {
                    title: "Miaow - Bubble",
                    m4a: "http://jplayer.org/audio/m4a/Miaow-07-Bubble.m4a",
                    oga: "http://jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
                });
            },
            play: function () {
                $(this).jPlayer("pauseOthers");
            },
            timeFormat: {
                padMin: false
            },
            swfPath: "js/jplayer",
            supplied: "m4a,oga",
            cssSelectorAncestor: "#audio_social_cover",
            useStateClassSkin: true,
            autoBlur: false,
            smoothPlayBar: true,
            remainingDuration: true,
            keyEnabled: true,
            keyBindings: {
                loop: null,
                muted: null,
                volumeUp: null,
                volumeDown: null
            },
            wmode: "window",
            cssSelector: cssSelectorOptions,
            stateClass: stateClassOptions
        });

        $("#jquery_jplayer_video_1").jPlayer({
            ready: function (b) {
                var c = $(this).jPlayer("setMedia", {
                    title: "Big Buck Bunny Trailer",
                    m4v: "http://jplayer.org/video/m4v/Big_Buck_Bunny_Trailer.m4v",
                    ogv: "http://jplayer.org/video/ogv/Big_Buck_Bunny_Trailer.ogv",
                    webmv: "http://jplayer.org/video/webm/Big_Buck_Bunny_Trailer.webm",
                    poster: "http://jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
                });
                if (b.jPlayer.status.noFullWindow) {
                    var d = $(c.jPlayer("option", "wrapper"));
                    d.find(".screen-control").hide();
                    d.find(".bar").css({
                        right: "0"
                    });
                }
                var e = function () {
                    var a = c.data("jPlayer").ancestorJq.width(),
                        b = 9 * a / 16;

                    c.jPlayer("option", "size", {
                        width: a + "px",
                        height: b + "px"
                    });

                };
                var f = $.jPlayer.platform;
                if (f.ipad || (f.iphone || (f.ipod || b.jPlayer.flash.used))) {
                    $(window).on("resize", function() {
                        e();
                    });
                    e();
                }
            },
            timeFormat: {
                padMin: false
            },
            swfPath: "js/jplayer",
            supplied: "webmv, ogv, m4v",
            cssSelectorAncestor: "#video",
            size: {
                width: "100%",
                height: "auto",
                cssClass: "video-responsive"
            },
            sizeFull: {
                cssClass: "video-full"
            },
            autohide: {
                full: false,
                restored: false
            },
            play: function () {
                //$(this).jPlayer("option", "autohide", {
                //    full: true,
                //    restored: true
                //});
                $(this).jPlayer("pauseOthers");
            },
            pause: function () {
                //$(this).jPlayer("option", "autohide", {
                //    full: false,
                //    restored: false
                //});
            },
            click: function (b) {
                $(this).jPlayer(b.jPlayer.status.paused ? "play" : "pause");
            },
            useStateClassSkin: true,
            autoBlur: false,
            smoothPlayBar: !($.jPlayer.browser.msie && $.jPlayer.browser.version < 9),
            remainingDuration: true,
            keyEnabled: true,
            cssSelector: cssSelectorOptions,
            stateClass: stateClassOptions
        });

        new jPlayerPlaylist({
            jPlayer: "#jquery_playlist_1_player",
            cssSelectorAncestor: "#jquery_playlist_1"
        }, [
            {
                title:"Cro Magnon Man",
                artist:"The Stark Palace",
                mp3:"http://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3",
                oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg",
                poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
            },
            {
                title:"Incredibles Teaser",
                artist:"Pixar",
                m4v: "http://www.jplayer.org/video/m4v/Incredibles_Teaser.m4v",
                ogv: "http://www.jplayer.org/video/ogv/Incredibles_Teaser.ogv",
                webmv: "http://www.jplayer.org/video/webm/Incredibles_Teaser.webm",
                poster: "http://www.jplayer.org/video/poster/Incredibles_Teaser_640x272.png"
            },{
                title:"Finding Nemo Teaser",
                artist:"Pixar",
                m4v: "http://www.jplayer.org/video/m4v/Finding_Nemo_Teaser.m4v",
                ogv: "http://www.jplayer.org/video/ogv/Finding_Nemo_Teaser.ogv",
                webmv: "http://www.jplayer.org/video/webm/Finding_Nemo_Teaser.webm",
                poster: "http://www.jplayer.org/video/poster/Finding_Nemo_Teaser_640x352.png"
            }
        ], {
            playlistOptions: {
                enableRemoveControls: false
            },
            swfPath: "js/jplayer",
            supplied: "webmv, ogv, m4v, oga, mp3",
            useStateClassSkin: true,
            autoBlur: false,
            smoothPlayBar: true,
            keyEnabled: true,
            audioFullScreen: true,
            size: {
                width: "100%",
                height: "auto",
                cssClass: "video-responsive"
            },
            sizeFull: {
                cssClass: "video-full"
            },
            cssSelector: cssSelectorOptions,
            stateClass: stateClassOptions
        });

        new jPlayerPlaylist({
            jPlayer: "#jquery_playlist_2_player",
            cssSelectorAncestor: "#jquery_playlist_2"
        }, [
            {
                title:"Cro Magnon Man",
                mp3:"http://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3",
                oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg"
            },
            {
                title:"Your Face",
                mp3:"http://www.jplayer.org/audio/mp3/TSP-05-Your_face.mp3",
                oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg"
            },
            {
                title:"Cyber Sonnet",
                mp3:"http://www.jplayer.org/audio/mp3/TSP-07-Cybersonnet.mp3",
                oga:"http://www.jplayer.org/audio/ogg/TSP-07-Cybersonnet.ogg"
            },
            {
                title:"Tempered Song",
                mp3:"http://www.jplayer.org/audio/mp3/Miaow-01-Tempered-song.mp3",
                oga:"http://www.jplayer.org/audio/ogg/Miaow-01-Tempered-song.ogg"
            },
            {
                title:"Hidden",
                mp3:"http://www.jplayer.org/audio/mp3/Miaow-02-Hidden.mp3",
                oga:"http://www.jplayer.org/audio/ogg/Miaow-02-Hidden.ogg"
            },
            {
                title:"Lentement",
                mp3:"http://www.jplayer.org/audio/mp3/Miaow-03-Lentement.mp3",
                oga:"http://www.jplayer.org/audio/ogg/Miaow-03-Lentement.ogg"
            },
            {
                title:"Lismore",
                mp3:"http://www.jplayer.org/audio/mp3/Miaow-04-Lismore.mp3",
                oga:"http://www.jplayer.org/audio/ogg/Miaow-04-Lismore.ogg"
            },
            {
                title:"The Separation",
                mp3:"http://www.jplayer.org/audio/mp3/Miaow-05-The-separation.mp3",
                oga:"http://www.jplayer.org/audio/ogg/Miaow-05-The-separation.ogg"
            },
            {
                title:"Beside Me",
                mp3:"http://www.jplayer.org/audio/mp3/Miaow-06-Beside-me.mp3",
                oga:"http://www.jplayer.org/audio/ogg/Miaow-06-Beside-me.ogg"
            },
            {
                title:"Bubble",
                mp3:"http://www.jplayer.org/audio/mp3/Miaow-07-Bubble.mp3",
                oga:"http://www.jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
            },
            {
                title:"Stirring of a Fool",
                mp3:"http://www.jplayer.org/audio/mp3/Miaow-08-Stirring-of-a-fool.mp3",
                oga:"http://www.jplayer.org/audio/ogg/Miaow-08-Stirring-of-a-fool.ogg"
            },
            {
                title:"Partir",
                mp3:"http://www.jplayer.org/audio/mp3/Miaow-09-Partir.mp3",
                oga:"http://www.jplayer.org/audio/ogg/Miaow-09-Partir.ogg"
            },
            {
                title:"Thin Ice",
                mp3:"http://www.jplayer.org/audio/mp3/Miaow-10-Thin-ice.mp3",
                oga:"http://www.jplayer.org/audio/ogg/Miaow-10-Thin-ice.ogg"
            }
        ], {
            playlistOptions: {
                enableRemoveControls: false
            },
            swfPath: "js/jplayer",
            supplied: "oga, mp3",
            useStateClassSkin: true,
            autoBlur: false,
            smoothPlayBar: true,
            keyEnabled: true,
            cssSelector: cssSelectorOptions,
            stateClass: stateClassOptions
        });

    });

})(jQuery);
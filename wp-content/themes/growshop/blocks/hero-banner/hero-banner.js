/**
 * Hero Banner — YouTube Video Background
 */
(function () {
    'use strict';

    var el = document.getElementById('banner-video-background');
    if (!el) return;

    var videoId = el.getAttribute('data-video-id') || 'P68V3iH4TeE';
    var player;

    // Load YouTube IFrame API
    var tag = document.createElement('script');
    tag.src = 'https://www.youtube.com/iframe_api';
    var firstScript = document.getElementsByTagName('script')[0];
    firstScript.parentNode.insertBefore(tag, firstScript);

    window.onYouTubeIframeAPIReady = function () {
        player = new YT.Player('banner-video-background', {
            videoId: videoId,
            playerVars: {
                autoplay: 1,
                controls: 0,
                mute: 1,
                loop: 1,
                playlist: videoId,
                showinfo: 0,
                rel: 0,
                enablejsapi: 1,
                disablekb: 1,
                modestbranding: 1,
                iv_load_policy: 3,
                origin: window.location.origin
            },
            events: {
                onReady: function (event) {
                    event.target.playVideo();
                    setYoutubeSize();
                    window.addEventListener('resize', setYoutubeSize);
                },
                onStateChange: function (event) {
                    if (event.data === YT.PlayerState.ENDED) {
                        player.playVideo();
                    }
                }
            }
        });
    };

    function setYoutubeSize() {
        var videoBg = document.getElementById('banner-video-background');
        if (!videoBg) return;
        var container = videoBg.closest('.banner-video-container');
        if (!container) container = document.querySelector('.banner-video-container');
        if (!container) return;

        var containerWidth = container.offsetWidth;
        var containerHeight = container.offsetHeight;
        var aspectRatio = 16 / 9;
        var newWidth, newHeight;

        if (containerWidth / containerHeight > aspectRatio) {
            newWidth = containerWidth;
            newHeight = containerWidth / aspectRatio;
        } else {
            newWidth = containerHeight * aspectRatio;
            newHeight = containerHeight;
        }

        if (player && player.getIframe) {
            var iframe = player.getIframe();
            iframe.style.width = newWidth + 'px';
            iframe.style.height = newHeight + 'px';
        }
    }
})();

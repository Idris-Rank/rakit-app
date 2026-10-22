<script>
    document.addEventListener('DOMContentLoaded', function() {
        var body = document.body;
        var opening = document.getElementById('opening');
        var openButton = document.getElementById('open-invitation');
        var audio = document.getElementById('wedding-audio');
        var musicButton = document.getElementById('music-toggle');
        var musicLabel = document.getElementById('music-label');
        var audioUrl = audio && audio.getAttribute('data-audio-url');
        var hasAudio = Boolean(audioUrl);
        if (hasAudio) audio.setAttribute('src', audioUrl);
        if (hasAudio) musicButton.classList.remove('hidden');
        openButton.addEventListener('click', function() {
            opening.classList.add('is-hidden');
            body.classList.remove('is-locked');
            if (hasAudio) audio.play().then(function() {
                musicButton.classList.add('is-playing');
                musicLabel.textContent = 'Jeda musik';
            }).catch(function() {});
        });
        musicButton.addEventListener('click', function() {
            if (audio.paused) {
                audio.play();
                musicButton.classList.add('is-playing');
                musicLabel.textContent = 'Jeda musik';
            } else {
                audio.pause();
                musicButton.classList.remove('is-playing');
                musicLabel.textContent = 'Putar musik';
            }
        });

        var countdown = document.getElementById('countdown');
        var target = new Date(countdown.getAttribute('data-target')).getTime();
        function updateCountdown() {
            var remaining = Math.max(0, target - Date.now());
            var values = { days: Math.floor(remaining / 86400000), hours: Math.floor(remaining / 3600000) % 24, minutes: Math.floor(remaining / 60000) % 60, seconds: Math.floor(remaining / 1000) % 60 };
            Object.keys(values).forEach(function(unit) {
                countdown.querySelector('[data-unit="' + unit + '"]').textContent = String(values[unit]).padStart(2, '0');
            });
        }
        updateCountdown();
        setInterval(updateCountdown, 1000);

        var revealItems = document.querySelectorAll('.reveal');
        if (!('IntersectionObserver' in window)) {
            revealItems.forEach(function(item) { item.classList.add('is-visible'); });
            return;
        }
        var observer = new IntersectionObserver(function(entries, currentObserver) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    currentObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        revealItems.forEach(function(item) { observer.observe(item); });
    });
</script>


<script>
const counters = document.querySelectorAll('.counter');

counters.forEach(counter => {
    const target = +counter.getAttribute('data-target');
    let count = 0;
    const duration = 2000; // durasi animasi 2 detik
    let start = null;

    const easeOutQuad = t => t * (2 - t); // fungsi easing

    const updateCounter = timestamp => {
        if (!start) start = timestamp;
        const progress = (timestamp - start) / duration;
        if (progress < 1) {
            count = Math.ceil(easeOutQuad(progress) * target);
            counter.innerText = count;
            requestAnimationFrame(updateCounter);
        } else {
            counter.innerText = target; // pastikan tetap ke target
        }
    };

    requestAnimationFrame(updateCounter);
});
</script>

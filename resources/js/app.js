
document.addEventListener('DOMContentLoaded', () => {
    const animatedElements = document.querySelectorAll(
        '.reveal, .stagger-item, .skill-card'
    );

    if (!animatedElements.length) {
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                const element = entry.target;

                element.classList.add('show');

                // Khusus skill card:
                // setelah animasi muncul selesai,
                // lanjut ke animasi melayang terus-menerus
                if (element.classList.contains('skill-card')) {
                    element.addEventListener(
                        'animationend',
                        () => {
                            element.classList.remove('show');
                            element.classList.add('floating');
                        },
                        { once: true }
                    );
                }

                observer.unobserve(element);
            });
        },
        {
            threshold: 0.15,
        }
    );

    animatedElements.forEach((element) => {
        observer.observe(element);
    });
});


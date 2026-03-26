document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.project-card');

    cards.forEach(card => {
        card.addEventListener('click', (e) => {
            if (e.target.tagName === 'A') return;

            const isExpanded = card.classList.contains('is-expanded');

            cards.forEach(c => {
                c.classList.remove('is-expanded');
                c.style.order = "0"; 
                c.style.animation = "neonShift 8s infinite alternate";
            });

            if (!isExpanded) {
                card.classList.add('is-expanded');

                card.style.order = "-1"; 
                
                card.style.animation = "none"; 
                card.style.borderColor = "var(--neon-green)"; 
                card.style.boxShadow = "0 0 30px rgba(0, 255, 170, 0.3)";
                
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    });
});
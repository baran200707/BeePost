const lightbox = document.querySelector('[data-lightbox]');
const lightboxImage = document.querySelector('[data-lightbox-image]');
const lightboxClose = document.querySelector('[data-lightbox-close]');

const closeLightbox = () => {
	lightbox?.classList.remove('is-open');
	lightbox?.setAttribute('aria-hidden', 'true');
	document.body.classList.remove('lightbox-open');
};

document.querySelectorAll('[data-lightbox-open]').forEach((button) => {
	button.addEventListener('click', () => {
		const image = button.querySelector('img');

		if (!image || !lightbox || !lightboxImage) {
			return;
		}

		lightboxImage.src = image.src;
		lightboxImage.alt = image.alt;
		lightbox.classList.add('is-open');
		lightbox.setAttribute('aria-hidden', 'false');
		document.body.classList.add('lightbox-open');
	});
});

lightboxClose?.addEventListener('click', closeLightbox);
lightbox?.addEventListener('click', (event) => {
	if (event.target === lightbox) {
		closeLightbox();
	}
});

document.addEventListener('keydown', (event) => {
	if (event.key === 'Escape') {
		closeLightbox();
	}
});

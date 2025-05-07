const folderIcons = document.querySelectorAll('.folder_icon');
const overlay = document.getElementById('overlay');
const closeOverlay = document.getElementById('closeOverlay');

if (overlay && closeOverlay) {
    folderIcons.forEach(folderIcon => {
        console.log('Adding event listener to:', folderIcon);
        folderIcon.addEventListener('click', () => {
            console.log('Folder icon clicked');
            overlay.classList.remove('overlay-hidden');
            overlay.classList.add('overlay-visible');
        });
    });

    closeOverlay.addEventListener('click', () => {
        overlay.classList.remove('overlay-visible');
        overlay.classList.add('overlay-hidden');
    });
} else {
    console.error('Overlay or close button not found in the DOM.');
}
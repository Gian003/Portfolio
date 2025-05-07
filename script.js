document.addEventListener('DOMContentLoaded', function() {
    const folders = {
        folder1: ['1.png', '2.png', '3.png'],
        folder2: ['4.png', '5.png', '6.png'],
        folder3: ['7.png', '8.png', '9.png'],
        folder4: ['rat 2.png', 'ratatouille 2.png', 'woody 2.png']
    };

    const overlay = document.getElementById('overlay');
    const content = document.querySelector('.overlay-content');
    
    document.querySelectorAll('.folder_icon').forEach(folder => {
        folder.addEventListener('click', () => {
            const folderId = folder.getAttribute('data-folder');
            const images = folders[folderId];
            
            content.innerHTML = '<button id="closeOverlay">Close</button>';

            images.forEach(img => {
                const imgEl = document.createElement('img');
                imgEl.src = img;
                imgEl.alt = "Gallery image";
                content.insertBefore(imgEl, content.firstChild);
            });

            overlay.classList.add('overlay-visible');
            overlay.classList.remove('overlay-hidden');
        });
    });

    document.addEventListener('click', (e) => {
        if (e.target.id === 'closeOverlay') {
            overlay.classList.remove('overlay-visible');
            overlay.classList.add('overlay-hidden');
        }
    });
});
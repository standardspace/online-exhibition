// Go wild...
import Macy from "macy";
import A11yDialog from 'a11y-dialog'

const maGallery = document.querySelector('.ma-gallery');

if (maGallery) {

  // Grid the gallery
  const maGalleryGrid = Macy({
    container: maGallery,
    trueOrder: true,
    waitForImages: false,
    mobileFirst: true,
    margin: 8,
    columns: 1,
    breakAt: {
      520: {
        margin: 16,
        columns: 2
      },
      1024: {
        margin: 32,
        columns: 3
      },
      1440: {
        columns: 4
      }
    }
  });

  // maGalleryGrid.on(maGalleryGrid.constants.EVENT_IMAGE_COMPLETE, function (ctx) {
  //   ctx.instance.container.classList.add('ma-gallery--loaded');
  // });

  // Gallery modal
  const galleryItems = maGallery.querySelectorAll('.ma-gallery__item');
  const galleryItemsArray = [...galleryItems];

  let modalArtworks = '';

  // Create Modal Content
  galleryItems.forEach((item) => {
    const itemTitle = item.querySelector('.ma-gallery__item__title').innerText;
    const imageFullPath = item.dataset.imageFull;
    const itemLink = item.querySelector('.ma-gallery__item__link').getAttribute('href');
    const itemArtist = item.dataset.artist;
    const itemArtistUrl = item.dataset.artistUrl;
    console.log(itemLink)
    // Get a link and add
    modalArtworks += `
    <li class="ma-gallery-scroller__item">
      <figure class="ma-gallery-scroller__item__figure">
        <img class="ma-gallery-scroller__item__image" src="${imageFullPath}" alt="Artwork: ${itemTitle}" />
        <figcaption class="ma-gallery-scroller__item__title">
          <a href="${itemLink}">${itemTitle}</a> 
          by ${itemArtist}
        </figcaption>
      </figure>
    </li>`
  });

  // modal markup
  const modal = document.createElement('div');
  modal.classList.add('dialog');
  modal.id = "my-dialog";
  modal.setAttribute('aria-hidden', true);
  modal.innerHTML = `<div class="dialog-overlay" tabindex="-1" data-a11y-dialog-hide></div>
    <div
      role="dialog"
      class="dialog-content"
      aria-label="Gallery artwork viewer"
    >
      <button
        data-a11y-dialog-hide
        class="dialog-close"
        aria-label="Close this dialog window"
      >
        &times;
      </button>

      <ul class="ma-gallery-scroller">
        ${modalArtworks}
      </ul>
    </div>`;

  document.body.appendChild(modal);

  var dialogEl = document.getElementById('my-dialog')
  var mainEl = document.querySelector('main')
  var dialog = new A11yDialog(dialogEl, mainEl)

  dialog.on('show', function (dialogEl, triggerEl) {
    console.log(dialogEl)
    console.log(triggerEl)
  })


  galleryItems.forEach( (galleryItem) => {

    const imageFullPath = galleryItem.dataset.imageFull;
    const itemHeading = galleryItem.querySelector('.ma-gallery__item__title')
    const link = itemHeading.querySelector('.ma-gallery__item__link')
    const linkInner = link.innerHTML;

    // Swap link for button
    itemHeading.innerHTML = `<button class="ma-gallery__item__button" data-a11y-dialog-show="my-dialog">${linkInner}</button>`

    const itemButton = itemHeading.querySelector('.ma-gallery__item__button')

    itemButton.onclick = () => {
      // Open gallery modal
      console.log('Open gallery modal')
      dialog.show();
    }

  })
} 


